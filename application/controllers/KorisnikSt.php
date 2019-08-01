<?php
/**
 * Description of Korisnik
 *
 * @author Korisnik
 */
class KorisnikSt extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("ModelSt");
        $this->load->model("ModelInv");
        $this->load->library('session');
        if(($this->session->userdata('korisnikst'))== NULL)
            redirect("Gost");
            
    }
    
    private function loadView($data,$glavniDeo){
        $this->load->view("sablon/header_startup.php", $data);
        $this->load->view($glavniDeo, $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function index(){
        $this->load->library('session');
        $poruka = $this->input->get('poruka');
        $podaci['poruka']="$poruka";
        $podaci['podaciokorisniku']= $this->session->userdata('korisnikst');
        $podaci['controller']="KorisnikSt";
        $this->loadView($podaci, "startup.php");     
    }
    
    public function preuzmi()
    {
        $this->load->helper('download');
        force_download("./portal/Funkcionalnosti portala.pdf", NULL);
    }
    
    public function izmeniProfil($idprofila){
        $profil  = $this->ModelSt->dohvatiProfilSt($idprofila);
        $gradovi = $this->ModelSt->dohvatiGradove();
        $oblasti = $this->ModelSt->dohvatiOblasti();
        $zemlje  = $this->ModelSt->dohvatiZemlje();

        $data['gradovi'] = $gradovi;
        $data['oblasti'] = $oblasti;
        $data['zemlje'] = $zemlje;
        $data['controller'] = "KorisnikSt";
        $data['profil'] = $profil;
        $this->loadView($data, "izmeniprofil.php");
    }
    
    public function menjajProfil($idprofila){
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('pravnoLice', 'Pravno lice', 'required');
    $this->form_validation->set_rules('datumOsn', 'Datum osnivanja', 'required');
    $this->form_validation->set_rules('brReg', 'Broj registracije', 'required');
    $this->form_validation->set_rules('pib', 'PIB', 'required');
    $this->form_validation->set_rules('ime', 'Ime', 'required');
    $this->form_validation->set_rules('prezime', 'Prezime', 'required');
    $this->form_validation->set_rules('srednjeImeZZ', 'ZakonskiZastupnik', 'required');
    $this->form_validation->set_rules('adresa', 'Adresa', 'required');
    $this->form_validation->set_rules('zemlja', 'Zemlja', 'required');
    $this->form_validation->set_rules('grad', 'Grad', 'required');
    $this->form_validation->set_rules('opstina', 'Opstina', 'required');
    $this->form_validation->set_rules('tel', 'Telefon', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('oblPos', 'Oblast', 'required');
    $this->form_validation->set_rules('brZaposlenih', 'Zaposleni', 'required');
    $this->form_validation->set_rules('prihod', 'Prihodi', 'required');
    $this->form_validation->set_rules('profit', 'Profit', 'required');
    $this->form_validation->set_rules('predPro', 'Predlog', 'required');
    $this->form_validation->set_rules('iznos', 'Iznos', 'required');
    $this->form_validation->set_rules('statIntS', 'Stats', 'required');
    $this->form_validation->set_rules('patent', 'Patent', 'required');
    $this->form_validation->set_rules('facebook', 'Facebook');
    $this->form_validation->set_rules('twiter', 'Twiter');
    $this->form_validation->set_rules('linkedin', 'LinkedIn', 'required');
    $this->form_validation->set_rules('website', 'Website');
    $this->form_validation->set_rules('javni', 'Profil javni');
    
    if ($this->form_validation->run() == FALSE){
       $this->izmeniProfil($idprofila);  
	} else {
        $password   = $this->input->post('password');
        $pravnoLice = $this->input->post('pravnoLice');
        $datumOsn	= $this->input->post('datumOsn');
        $brReg 		= $this->input->post('brReg');
        $pib 		= $this->input->post('pib');
        $ime 		= $this->input->post('ime');
        $prezime 	= $this->input->post('prezime');
        $srImeZZ 	= $this->input->post('srednjeImeZZ');
        $adresa     = $this->input->post('adresa');
        $zemlja 	= $this->input->post('zemlja');
        $grad 		= $this->input->post('grad');
        $opstina 	= $this->input->post('opstina');
        $telefon 	= $this->input->post('tel');
        $email 		= $this->input->post('email');
        $oblPos 	= $this->input->post('oblPos');
        $brZap 		= $this->input->post('brZaposlenih');
        $prihodi 	= $this->input->post('prihod');
        $profit 	= $this->input->post('profit');
        $predPro 	= $this->input->post('predPro');
        $iznos 		= $this->input->post('iznos');
        $statIntS 	= $this->input->post('statIntS');
        $patent 	= $this->input->post('patent');
        $facebook 	= $this->input->post('facebook');
        $twiter 	= $this->input->post('twiter');
        $linkedin	= $this->input->post('linkedin');
        $website 	= $this->input->post('website');
        $javni      = $this->input->post('javni');
        
        
        $insertData = array(
                "password"=>$password,
                "nazplica"=>$pravnoLice,
                "datosnivanja"=>mdate("%Y-%m-%d"),
                "brregistracije"=>$brReg,
                "pib"=>$pib,
                "ime"=>$ime,
                "prezime"=>$prezime,
                "srimezakpre"=>$srImeZZ,
                "adresa"=>$adresa,
                "zemlja"=>$zemlja,
                "grad"=>$grad,
                "opstina"=>$opstina,
                "ktelefon"=>$telefon,
                "email"=>$email,
                "oposlovanja"=>$oblPos,
                "brzaposlenih"=>$brZap,
                "prihod"=>$prihodi,
                "profit"=>$profit,
                "posao"=>$predPro,
                "tiznos"=>$iznos,
                "statintsvojine"=>$statIntS,
                "podopatentu"=>$patent,
                "website"=>$website,
                "facebook"=>$facebook,
                "twitter"=>$twiter,
                "linkedin"=>$linkedin,
                "javni"=>$javni
                );
                    

                $insertUser = $this->ModelSt->izmeniProfil($idprofila, $insertData);

                if($insertUser){
                    redirect("KorisnikSt/index");
                    } else {
                $this->izmeniProfil("Korisnicko ime je zauzeto!");
            }
        }
    }
    
    public function oglasi(){
        $oglasi=$this->ModelInv->dohvatiOglase();
        $data['oglasi']=$oglasi;
        $data['controller'] = "KorisnikSt";
        $this->loadView($data, "oglasi.php");     
    }
    
    public function prikaziOglas($idoglasa){
        $oglas=$this->ModelInv->dohvatiOglas($idoglasa);
        $data['oglas']=$oglas;
        $data['controller'] = "KorisnikSt";
        $this->loadView($data, "prikazioglas.php");
    }
    
    public function vesti(){
        if($this->session->userdata('korisnikst')){
            $autorId = $this->session->userdata('korisnikst')->username;
        }else if ($this->session->userdata('korisnikinv')){
            $autorId = $this->session->userdata('korisnikinv')->username;
        }
        $vesti=$this->ModelSt->dohvatiVesti($autorId);
        foreach ($vesti as $value) {
            $threads[$value['id_vesti']] = $this->ModelSt->dohvatiUkupneVesti($value['id_vesti']);
        }
        $data['vesti']=$vesti;
        $data['controller'] = "KorisnikSt";
        $this->loadView($data, "vesti.php");     
    }
    
    public function dodajVesti(){
        $data['controller']= "KorisnikSt";
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
            $autorId=$this->session->userdata("korisnikst")->username;
            
            $user=$this->session->userdata("korisnikst");
            
            $config['upload_path']          = './vesti/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name']            = "vesti_".now();
            $this->load->library('upload', $config);

            if(!($this->upload->do_upload('slika'))){
                $slika= "";

                $id = $this->ModelSt->dodajVest($naslov, $sadrzaj, $autorId, $slika);

                redirect("KorisnikSt/vesti");
            } else
                $this->upload->do_upload('slika');

                $slika = "vesti/vesti_".now() . $this->upload->data()["file_ext"];

                $id = $this->ModelSt->dodajVest($naslov, $sadrzaj, $autorId, $slika);

                redirect("KorisnikSt/vesti");
        }
        
    }
    
    public function prikaziVest($idvesti){
        $vesti = $this->ModelSt->dohvatiVest($idvesti);
        $data['vesti']=$vesti;
        $odgovorNaVesti = $this->ModelSt->odgovorNaVesti($idvesti);
        $data['odgovorNaVesti']=$odgovorNaVesti;
        $data['controller']= "KorisnikSt";
        $data['idvesti'] = $idvesti;
        $this->loadView($data, "prikazivesti.php");
    }
    
    public function odgovorNaVesti($idvesti){
        $this->form_validation->set_rules('sadrzaj','Sadrzaj','required');
        if($this->form_validation->run()==FALSE){
            redirect('KorisnikSt/vesti/'.$idvesti);
        }
        else{
            //ispravno
            $sadrzaj=$this->input->post("sadrzaj");
            $autorId=$this->session->userdata("korisnikst")->username;
            $this->ModelSt->dodajOdgovorNaVesti($idvesti, $sadrzaj, $autorId);
            redirect("KorisnikSt/prikaziVest/".$idvesti);
        }
    }
    
    public function grupe($trazi = NULL, $grad = NULL , $zemlja = NULL, $oblast = NULL){
        
        if ($trazi == NULL && $grad = NULL && $zemlja = NULL && $oblast = NULL) {
            $grupe = $this->ModelSt->dohvatiGrupe();

        } else {
            $grupe = $this->ModelSt->pretraga($trazi, $grad , $zemlja, $oblast);
//            $grupe = $this->ModelSt->pretraga(
//                array(
//                    'trazi' => $trazi,
//                    'grad' => $grad,
//                    'zemlja' => $zemlja,
//                    'oblast' => $oblast
//                )
//            );
        }

        print_r($grad);
        print_r($trazi);
        print_r($zemlja);
        print_r($oblast);


        $gradovi = $this->ModelSt->dohvatiGradove();
        $oblasti = $this->ModelSt->dohvatiOblasti();
        $zemlje  = $this->ModelSt->dohvatiZemlje();

        $data['gradovi'] = $gradovi;
        $data['oblasti'] = $oblasti;
        $data['zemlje'] = $zemlje;
        
        $poruka = $this->input->get('poruka');
        $data['poruka'] = $poruka;
        $data['grupe'] = $grupe;
        $data['controller'] = "KorisnikSt";
        $data['metoda']= "pretraga";
        $this->loadView($data, "grupe.php");     
    }

    public function pretraga() {
        $trazi  = $this->input->get('searchGroup');
        $grad   = $this->input->get('city');
        $zemlja = $this->input->get('country');
        $oblast = $this->input->get('area');
        $this->grupe($trazi, $grad, $zemlja, $oblast);
    }
    
    public function napraviGrupu(){
        $gradovi = $this->ModelSt->dohvatiGradove();
        $oblasti = $this->ModelSt->dohvatiOblasti();
        $zemlje = $this->ModelSt->dohvatiZemlje();

        $data['gradovi'] = $gradovi;
        $data['oblasti'] = $oblasti;
        $data['zemlje'] = $zemlje;
        $data['controller']= "KorisnikSt";
        $this->loadView($data, "napravi_grupu.php");
    }
    
    public function dodavanjeGrupa(){
        $this->form_validation->set_rules('ime','Ime','required');
        $this->form_validation->set_rules('opis','Opis','required');
        $this->form_validation->set_rules('zemlja','Ime','required');
        $this->form_validation->set_rules('oblPos','Oblast poslovanja','required');
        $this->form_validation->set_rules('grad','Grad','required');
        if($this->form_validation->run()==FALSE){
            $this->napraviGrupu();// ne treba redirect jer na refresh treba da proba da opet nesto doda
        }
        else{
            //ispravno
            $ime=$this->input->post("ime");
            $opis=$this->input->post("opis");
            $grad=$this->input->post("grad");
            $zemlja=$this->input->post("zemlja");
            $oblPos=$this->input->post("oblPos");
            $autorId=$this->session->userdata("korisnikst")->username;
            
            
            $id=$this->ModelSt->dodajGrupu($ime, $opis, $autorId, $grad, $zemlja, $oblPos);

            redirect("KorisnikSt/prikaziGrupu/".$id);
        }
        
    }
    
    public function prikaziGrupu($idgrupe){
        $user = $this->session->userdata('korisnikst')->username;
        $teme = $this->ModelSt->dohvatiTeme($idgrupe, $user);
        $grupa = $this->ModelSt->dohvatiGrupu($idgrupe);
        $poruka = $this->input->get('poruka');
        $clanovi = $this->ModelSt->dohvatiClanove($idgrupe);
        $pretragaclanova= $this->ModelSt->pretragaClanova($user, $grupa['id']);

        $korisnik = $this->session->userdata('korisnikst');
        $data['korisnik'] = $korisnik;
        $data['uslov'] = $pretragaclanova;
        $data['teme'] = $teme;
        $data['idgrupe'] = $idgrupe;
        $data['clanovi'] = $clanovi;
        $data['poruka'] = $poruka;
        $data['grupa'] = $grupa;
        $data['controller']= "KorisnikSt";
        $data['idgrupe'] = $idgrupe;
        $this->loadView($data, "prikazi_grupu.php");
    }
    
    public function dodajTeme($idgrupe){
        $autor= $this->session->userdata('korisnikst')->username;
        $slika = $this->session->userdata('korisnikst')->slika;
        $sadrzaj = $this->input->post('sadrzaj');
        $this->ModelSt->dodajTemu($idgrupe, $autor, $sadrzaj, $slika);
        redirect('KorisnikSt/prikaziGrupu/'.$idgrupe);
    }
    
    public function uclaniSe($idgrupe){
        $grupe = $this->ModelSt->dohvatiGrupe($idgrupe);
        foreach($grupe as $vrednost){
            $vrednost['ime'];
        }
        $user=$this->session->userdata("korisnikst")->username;
        $email=$this->session->userdata("korisnikst")->email;
        $grad=$this->session->userdata("korisnikst")->grad;
        $oblast=$this->session->userdata("korisnikst")->oblPos;

        $proveriClana = $this->ModelSt->proveraClana($user, $idgrupe);
        if(!$proveriClana){ //prazan string
            $this->ModelSt->uclaniClana($vrednost['ime'], $idgrupe , $user, $email, $grad, $oblast);
            redirect("KorisnikSt/prikaziGrupu/".$idgrupe."?poruka=Dobro dosli ".$user);
        } else {
            redirect('KorisnikSt/grupe/'."?poruka=Vec ste clan grupe!");
            }
    }
    
    public function obrisiClanove($idgrupe){
        $username= $this->session->userdata('korisnikst')->username;
        $this->ModelSt->obrisiClana($username, $idgrupe);
        redirect('KorisnikSt/grupe');
    }


    
    public function tipoviDiskusija(){
        $tipovidiskusija = $this->ModelSt->dohvatiTipove();
        foreach ($tipovidiskusija as $value) {
            $threads[$value['id']] = $this->ModelSt->dohvatiUkupneDiskusije($value['id']);
        }
        
        $data['threads']=$threads;
        $data['tipovidiskusija'] = $tipovidiskusija;
        $data['controller']= "KorisnikSt";
        $this->loadView($data, "diskusije_tipovi.php");
    }
    
    
    public function diskusije($idtipa){
        if($this->session->userdata('korisnikst')){
            $autorId = $this->session->userdata('korisnikst')->username;
        }else if ($this->session->userdata('korisnikinv')){
            $autorId = $this->session->userdata('korisnikinv')->username;
        }
        if($this->uri->segment(4))
            $pocetni_index=$this->uri->segment(4);
        else
            $pocetni_index=0;

        $limit=LIMIT_PO_STRANICI;

        $diskusije=$this->ModelSt->dohvatiDiskusije($autorId, $idtipa, $limit, $pocetni_index);
        //$iddiskusije = $diskusija['id'];
        if($diskusije == ""){
             $data['threadsgru']=" ";
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
        $config_pagination['base_url']= site_url("KorisnikSt/diskusije/".$idtipa);
        $config_pagination['total_rows']= count($ukupanBrDiskusija);
        $config_pagination['per_page'] = $limit;
        $config_pagination['next_link'] = 'Next';
        $config_pagination['prev_link'] = 'Prev';
        
        $this->pagination->initialize($config_pagination);
        $data['links']=$this->pagination->create_links();
        
        if($this->session->userdata('korisnikst')){
            $data['podaciokorisniku'] = $this->session->userdata('korisnikst');
        }else if ($this->session->userdata('korisnikinv')){
            $data['podaciokorisniku'] = $this->session->userdata('korisnikinv');
        }
        $data['diskusije']=$diskusije;
        $data['tip']=$idtipa;
        $data['controller']= "KorisnikSt";
        $this->loadView($data, "diskusije.php");
    }
    
    public function dodajDiskusiju($idtipa){
        $data['controller']= "KorisnikSt";
        $data['tip']= $idtipa;
        $this->loadView($data, "dodaj_diskusiju.php");
    }
    
    public function dodavanjeDiskusija($idtipa){ // I OVDE DODATI VREDNOST IZ DRUGE METODE!!!!!!!!
        $this->form_validation->set_rules('naslov','Naslov','required');
        $this->form_validation->set_rules('sadrzaj','Sadrzaj','required');
        $this->form_validation->set_rules('vidljivost','Vidljivost','required');
        if($this->form_validation->run()==FALSE){
            $this->dodajDiskusiju();// ne treba redirect jer na refresh treba da proba da opet nesto doda
        }
        else{
            $naslov=$this->input->post("naslov");
            $sadrzaj=$this->input->post("sadrzaj");
            $vidljivost=$this->input->post("vidljivost");
            if($this->session->userdata('korisnikst')){
                $autorId=$this->session->userdata("korisnikst")->username;
            } elseif($this->session->userdata('korisnikinv')) {
                $autorId=$this->session->userdata("korisnikinv")->username;
            }
            $slika = $this->session->userdata('korisnikst')->slika;
            
            $id=$this->ModelSt->dodajDiskusiju($idtipa, $naslov, $sadrzaj, $vidljivost, $autorId, $slika);

            redirect("KorisnikSt/diskusije/".$idtipa);
        }
        
    }
    
    public function prikaziDiskusiju($iddiskusije){
        if($this->session->userdata('korisnikst')){
            $autorId = $this->session->userdata('korisnikst')->username;
        }else if ($this->session->userdata('korisnikinv')){
            $autorId = $this->session->userdata('korisnikinv')->username;
        }
        $diskusija = $this->ModelSt->dohvatiDiskusiju($iddiskusije);


        if($this->uri->segment(4))
            $pocetni_index=$this->uri->segment(4);
        else
            $pocetni_index=0;

        $limit = 3;
        $odgovorNaDiskusije = $this->ModelSt->odgovorNaDiskusije($iddiskusije, $limit, $pocetni_index);

        $this->load->library('pagination');

        $this->config->load('bootstrap_pagination');

        $ukupanBrOdgovora=$this->ModelSt->brojOdgovoraNaDiskusije($iddiskusije);

        $config_pagination=$this->config->item('pagination');
        $config_pagination['base_url']= site_url("KorisnikSt/prikaziDiskusiju/".$iddiskusije);
        $config_pagination['total_rows']= count($ukupanBrOdgovora);
        $config_pagination['per_page'] = $limit;
        $config_pagination['next_link'] = 'Next';
        $config_pagination['prev_link'] = 'Prev';

        $this->pagination->initialize($config_pagination);

        $data['links']=$this->pagination->create_links();
        $data['ukupanBrOdgovora']=$ukupanBrOdgovora;
        $data['diskusija']=$diskusija;
        $data['odgovorNaDiskusije']=$odgovorNaDiskusije;
        $data['controller']= "KorisnikSt";
        $data['iddiskusije'] = $iddiskusije;
        $this->loadView($data, "prikazidiskusije.php");
    }
    
    public function dodajOdgovor($idDiskusije){
        $this->form_validation->set_rules('sadrzaj','Sadrzaj','required');
        if($this->form_validation->run()==FALSE){
            redirect('KorisnikSt/diskusije/'.$idDiskusije);
        }
        else{
            //ispravno
            $sadrzaj=$this->input->post("sadrzaj");
            $autorId=$this->session->userdata("korisnikst")->username;
            $slika = $this->session->userdata('korisnikst')->slika;
            $this->ModelSt->dodajOdgovor($idDiskusije, $sadrzaj, $autorId, $slika);
            redirect("KorisnikSt/prikaziDiskusiju/".$idDiskusije);
        }
    }
    
    public function arhivirajDiskusiju($iddiskusije){
        if($this->session->userdata('korisnikst')){
            $autorId = $this->session->userdata('korisnikst')->username;
        }else if ($this->session->userdata('korisnikinv')){
            $autorId = $this->session->userdata('korisnikinv')->username;
        }
        $arhiviraj = $this->ModelSt->arhivirajDiskusije($iddiskusije, $autorId);
        $tip = $this->input->get('tip');
        $poruka = "Diskusija je uspesno arhivirana!";
        redirect("KorisnikSt/diskusije/".$tip."?poruka=$poruka");
        
    }
    
    public function arhiviraneDiskusije(){
        $autor = $this->session->userdata('korisnikst')->username;
        $arhiviraneporuke = $this->ModelSt->dohvatiArhivirano($autor);
        $podaci['arhiviraneporuke'] = $arhiviraneporuke;
        $podaci['controller'] = "KorisnikSt";
        $this->loadView($podaci, "arhivirane_diskusije.php");
    }
    
    public function dodajSliku(){

            $user=$this->session->userdata("korisnikst");
            
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name']            = "startup_".$user->username;
            $this->load->library('upload', $config);

            if(!($this->upload->do_upload('slika'))){
                redirect("KorisnikSt/index?poruka=Ubacite sliku!");
            } else
                $this->upload->do_upload('slika');


            $slika = "uploads/startup_".$user->username . $this->upload->data()["file_ext"];
            
            $this->ModelSt->upisiSliku($user->username, $slika);
            
            $user->slika = $slika;
            $this->session->set_userdata($user);

            redirect("KorisnikSt/index");
    }
    
    public function profil($username){
        $profil = $this->ModelSt->dohvatiProfil($username);
        $data['controller'] = "KorisnikSt";
        $data['profil'] = $profil;
        $data['podaci'] = $this->session->userdata('korisnikst');
        $this->loadView($data, "profil.php");
               
    }
    
    public function mailStranica($idgrupe){
        $data['controller'] = "KorisnikSt";
        $data['idgrupe'] = $idgrupe;
        $this->loadView($data, "email.php");
    }
    public function email($idgrupe){
        $this->load->library('email');

        //$subject = 'This is a test';
        //$message = '<p>This message has been sent for testing purposes.</p>';

        // Get full html:
        $subject = $this->input->post('cc');
        $message = $this->input->post("sadrzaj");
        $podaci = $this->session->userdata('korisnikst');
        $kosalje = $podaci->username;
        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
            <title>' . html_escape($subject) . '</title>
            <style type="text/css">
                body {
                    font-family: Arial, Verdana, Helvetica, sans-serif;
                    font-size: 16px;
                }
            </style>
        </head>
        <body>
        <h3>Ovo je poruka investitora ' . $kosalje.'.</h3>
            <h5>Clanovima grupe '. $idgrupe .'</h5>
        ' . $message . '
        </body>
        </html>';
        // Also, for getting full html you may use the following internal method:
        //$body = $this->email->full_html($subject, $message);
        
        $primalac = $this->ModelSt->primaocMaila($idgrupe);

        $primalac = array_map(function($mail) {
            return $mail['email'];
        }, $primalac);
        
        $result = $this->email
            ->from('portalisp2018@gmail.com')
            ->reply_to('portalisp2018@gmail.com')    // Optional, an account where a human being reads.
            ->to(implode(', ', $primalac))
            ->subject($subject)
            ->message($body)
            ->send();

        //var_dump($podaci);
        echo '<br />';
        echo $this->email->print_debugger();
        print_r($primalac);
    }
    
    public function logout(){
        $this->session->unset_userdata("korisnikst");
        $this->session->sess_destroy();
        redirect("Gost");
        
       
    }
   
}