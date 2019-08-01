<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Korisnik
 *
 * @author Korisnik
 */
class Admin extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("ModelSt");
        $this->load->model("ModelInv");
        $this->load->library('session');
        if(($this->session->userdata('admin'))==NULL)
            redirect("Gost");
            
    }
    
    private function loadView($data,$glavniDeo){
        $this->load->view("sablon/header_admin.php", $data);
        $this->load->view($glavniDeo, $data);
        $this->load->view("sablon/footeradmin.php");
    }
    
    public function index($trazi=NULL){
        $this->load->library('session');
        $podaci['podaciokorisniku']= $this->session->userdata('admin');
        $this->loadView($podaci, "pocetna.php");     
    }
    
    public function oglasi(){
        $oglasi=$this->ModelInv->dohvatiOglase();
        $data['oglasi']=$oglasi;
        $data['controller'] = "Admin";
        $this->loadView($data, "oglasi.php");     
    }
    
    public function prikaziOglas($idoglasa){
        $oglas=$this->ModelInv->dohvatiOglas($idoglasa);
        $data['oglas']=$oglas;
        $data['controller'] = "Admin";
        $this->loadView($data, "prikazioglas.php");
    }
    
    public function vesti(){
        if($this->session->userdata('admin')){
            $autorId = $this->session->userdata('admin')->username;
        }
        $vesti=$this->ModelSt->dohvatiVesti($autorId);
        foreach ($vesti as $value) {
            $threads[$value['id_vesti']] = $this->ModelSt->dohvatiUkupneVesti($value['id_vesti']);
        }
        $data['vesti']=$vesti;
        $data['controller'] = "Admin";
        $this->loadView($data, "vesti.php");     
    }
    
    public function dodajVesti(){
        $data['controller']= "Admin";
        $this->loadView($data, "dodaj_vesti.php");
        
    }
    
    public function dodavanjeVesti(){
        $this->form_validation->set_rules('naslov','Naslov','required');
        $this->form_validation->set_rules('sadrzaj','Sadrzaj','required');
        if($this->form_validation->run()==FALSE){
            $this->dodavanjeVesti();// ne treba redirect jer na refresh treba da proba da opet nesto doda
        }
        else{
            //ispravno
            $naslov=$this->input->post("naslov");
            $sadrzaj=$this->input->post("sadrzaj");
            if($this->session->userdata('admin')){
                $autorId=$this->session->userdata("admin")->username;
            } 
            
            
            $id=$this->ModelSt->dodajVest($naslov, $sadrzaj, $autorId);

            redirect("Admin/vesti");
        }
        
    }
    
    public function prikaziVest($idvesti){
        $vesti = $this->ModelSt->dohvatiVest($idvesti);
        $data['vesti']=$vesti;
        $odgovorNaVesti = $this->ModelSt->odgovorNaVesti($idvesti);
        $data['odgovorNaVesti']=$odgovorNaVesti;
        $data['controller']= "Admin";
        $data['idvesti'] = $idvesti;
        $this->loadView($data, "prikazivesti.php");
    }
    
    public function odgovorNaVesti($idvesti){
        $this->form_validation->set_rules('sadrzaj','Sadrzaj','required');
        if($this->form_validation->run()==FALSE){
            redirect('Admin/vesti/'.$idvesti);
        }
        else{
            //ispravno
            $sadrzaj=$this->input->post("sadrzaj");
            $autorId=$this->session->userdata("admin")->username;
            $this->ModelSt->dodajOdgovorNaVesti($idvesti, $sadrzaj, $autorId);
            redirect("Admin/prikaziVest/".$idvesti);
        }
    }
    
    
    public function tipoviDiskusija(){
        $tipovidiskusija = $this->ModelSt->dohvatiTipove();
        foreach ($tipovidiskusija as $value) {
            $threads[$value['id']] = $this->ModelSt->dohvatiUkupneDiskusije($value['id']);
        }
        $data['threads']=$threads;
        $tipovidiskusija = $this->ModelSt->dohvatiTipove();
        $data['tipovidiskusija'] = $tipovidiskusija;
        $data['controller']= "Admin";
        $this->loadView($data, "diskusije_tipovi.php");
    }
    
    public function dodajTipDiskusije(){
        $this->form_validation->set_rules('naslov','Naslov','required');
        if($this->form_validation->run()==FALSE){
            redirect('Admin/tipoviDiskusija/');
        }
        else{
            //ispravno
            $username = $this->session->userdata('admin')->username;
            $naslov=$this->input->post("naslov");
            $this->ModelSt->dodajNoviTip($username, $naslov);
            redirect("Admin/tipoviDiskusija/");
        }
    }
    
    public function diskusije($idtipa){
        if($this->session->userdata('admin')){
            $autorId = $this->session->userdata('admin')->username;
        }
        if($this->uri->segment(4))
            $pocetni_index=$this->uri->segment(4);
        else
            $pocetni_index=0;
        $limit=LIMIT_PO_STRANICI;
        $diskusije=$this->ModelSt->dohvatiDiskusije($autorId =NULL, $idtipa, $limit, $pocetni_index);
        //$iddiskusije = $diskusija['id'];
        if($diskusije == ""){
             $data['threads']=" ";
        }elseif($diskusije != ""){
        foreach ($diskusije as $value) {
            $threads[$value['id']] = $this->ModelSt->dohvatiUkupno($value['id']);
                $data['threads']=$threads;
            }
        }
        $ukupanBrDiskusija=$this->ModelSt->brojDiskusija($autorId, $idtipa);   
        
        $this->load->library('pagination');
        
        $this->config->load('bootstrap_pagination');
        
        $config_pagination=$this->config->item('pagination');
        $config_pagination['base_url']= site_url("Admin/diskusije/".$idtipa);
        $config_pagination['total_rows']= count($ukupanBrDiskusija);
        $config_pagination['per_page'] = $limit;
        $config_pagination['next_link'] = 'Next';
        $config_pagination['prev_link'] = 'Prev';
        
        $this->pagination->initialize($config_pagination);
        $data['links']=$this->pagination->create_links();
        if($this->session->userdata('admin')){
            $data['podaciokorisniku'] = $this->session->userdata('admin');
        }
        $data['idtipa'] = $idtipa;
        $data['diskusije']=$diskusije;
        $data['controller']= "Admin";
        $this->loadView($data, "diskusije.php");
    }
    
    public function dodajDiskusiju(){
        $data['controller']= "Admin";
        $this->loadView($data, "dodaj_diskusiju.php");
        
    }
    
    public function dodavanjeDiskusija(){
        $this->form_validation->set_rules('naslov','Naslov','required');
        $this->form_validation->set_rules('sadrzaj','Sadrzaj','required');
        $this->form_validation->set_rules('vidljivost','Vidljivost','required');
        if($this->form_validation->run()==FALSE){
            $this->dodajDiskusiju();// ne treba redirect jer na refresh treba da proba da opet nesto doda
        }
        else{
            //ispravno
            $naslov=$this->input->post("naslov");
            $sadrzaj=$this->input->post("sadrzaj");
            $vidljivost=$this->input->post("vidljivost");
            if($this->session->userdata('admin')){
                $autorId=$this->session->userdata("admin")->username;
            } 
            
            
            $id=$this->ModelSt->dodajDiskusiju($naslov, $sadrzaj, $vidljivost, $autorId);

            redirect("Admin/diskusije");
        }
        
    }
    
    public function prikaziDiskusiju($iddiskusije){
        if($this->session->userdata('korisnikst')){
            $autorId = $this->session->userdata('korisnikst')->username;
        }else if ($this->session->userdata('korisnikinv')){
            $autorId = $this->session->userdata('korisnikinv')->username;
        }
        $diskusija = $this->ModelSt->dohvatiDiskusiju($iddiskusije);
        $data['diskusija']=$diskusija;
        $odgovorNaDiskusije = $this->ModelSt->odgovorNaDiskusije($iddiskusije);
        $data['odgovorNaDiskusije']=$odgovorNaDiskusije;
        $data['controller']= "Admin";
        $data['iddiskusije'] = $iddiskusije;
        $this->loadView($data, "prikazidiskusije.php");
    }
    
    public function obrisiOdgovor($odgovornadiskusiju){
        $this->ModelSt->obrisiOdgovor($odgovornadiskusiju);
        $iddiskusije = $this->input->get('iddiskusije');
        redirect("Admin/prikaziDiskusiju/".$iddiskusije);
    }
    
     public function dodajOdgovor($idDiskusije){
        $this->form_validation->set_rules('sadrzaj','Sadrzaj','required');
        if($this->form_validation->run()==FALSE){
            redirect('Admin/diskusije/'.$idDiskusije);
        }
        else{
            //ispravno
            $sadrzaj=$this->input->post("sadrzaj");
            $autorId=$this->session->userdata("korisnikst")->username;
            $this->ModelSt->dodajOdgovor($idDiskusije, $sadrzaj, $autorId);
            redirect("Admin/prikaziDiskusiju/".$idDiskusije);
        }
    }
    
    public function arhiviraneDiskusije(){
        $arhiviraneporuke = $this->ModelSt->dohvatiArhiviranoAdmin();
        $podaci['arhiviraneporuke'] = $arhiviraneporuke;
        $podaci['controller'] = "Admin";
        $this->loadView($podaci, "arhivirane_diskusije.php");
    }
    
    
    public function dodajSliku(){
            
            $user=$this->session->userdata("admin");
            
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name']            = "startup_".$user->username;
            $this->load->library('upload', $config);
            $this->upload->do_upload('slika');
            
            $slika = base_url("uploads/startup_".$user->username.".jpg");
            
            $this->ModelSt->upisiSliku($user->username, $slika);
            
            $user->slika = $slika;
            $this->session->set_userdata($user);

            redirect("Admin/index");
    }
    
    
    
    public function logout(){
        $this->session->unset_userdata("admin");
        $this->session->sess_destroy();
        redirect("Gost");
    }
    
    public function obrisiDiskusiju($iddiskusije){ // I OVDE DODATI ARGUMENT IZ DRUGE METODE !!! $idtipa
        $this->ModelSt->obrisiDiskusiju($iddiskusije);
        redirect("Admin/diskusije");
    }
    
    
    public function obrisiOglas($idoglasa){
        $this->ModelSt->obrisiOglas($idoglasa);
        redirect("Admin/oglasi/");
    }
    
    public function obrisiVest($idvesti){
        $this->ModelSt->obrisiVest($idvesti);
        redirect("Admin/vesti/");
    }
    
    public function obrisiOdgVest($idgovora){
        $this->ModelSt->obrisiOdgovorVesti($idgovora);
        redirect("Admin/vesti/");
    }
    
    public function profil($username){
        $profil = $this->ModelSt->dohvatiProfil($username);
        $data['controller'] = "Admin";
        $data['profil'] = $profil;
        $this->loadView($data, "profil.php");
               
    }
    
    public function grupe($trazi = NULL){
        if ($trazi == NULL) {
            $grupe = $this->ModelSt->dohvatiGrupe();
        } else {
            $grupe = $this->ModelSt->pretraga($trazi);
        }
        //foreach($grupe as $value){
        //    
        //}
        
        
        $poruka = $this->input->get('poruka');
//      $data['pretraga']=  $pretragaclanova;
        $data['poruka'] = $poruka;
        $data['grupe'] = $grupe;
        $data['controller'] = "Admin";
        $data['metoda']="pretraga";
        $this->loadView($data, "grupe.php");     
    }
    
    public function prikaziGrupu($idgrupe){
        $user = $this->session->userdata('admin')->username;
        $teme = $this->ModelSt->dohvatiTeme($idgrupe, $user);
        $grupa = $this->ModelSt->dohvatiGrupu($idgrupe);
        $poruka = $this->input->get('poruka');
        $clanovi = $this->ModelSt->dohvatiClanove($idgrupe);
        
        $pretragaclanova= $this->ModelSt->pretragaClanova($user, $grupa['id']);
        $data['uslov'] = $pretragaclanova;
        $data['teme'] = $teme;
        $data['idgrupe'] = $idgrupe;
        $data['clanovi'] = $clanovi;
        $data['poruka'] = $poruka;
        $data['grupa'] = $grupa;
        $data['controller']= "Admin";
        $data['idgrupe'] = $idgrupe;
        $this->loadView($data, "prikazi_grupu.php");
    }
    
    public function obrisiGrupe($idgrupe){
        $this->ModelSt->obrisiGrupu($idgrupe);
        redirect('Admin/grupe');
    }
    
}

