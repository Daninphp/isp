<?php
class ModelSt extends CI_Model {
    public $username;
    public $ime;
    public $prezime;
    public $id;
    public $pravnoLice;
    public $datumOsn;
    public $pib;
    public $adresa;
    public $zemlja;
    public $grad;
    public $telefon;
    public $email;
    public $oblPos;
    public $predPro;
    public $iznos;
    public $statIntS;
    public $patent;
    public $facebook;
    public $twitter;
    public $linkedin;
    public $website;
    public $slika;
  
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function poslednjeVesti(){
        $query = $this->db->query("SELECT * FROM vesti ORDER BY id_vesti DESC LIMIT 3");
        $result = $query->result_array();
        return $result;
        
    }
    
    public function poslednjeDiskusije(){
        $query = $this->db->query("SELECT * FROM diskusije WHERE vidljivost = 4 ORDER BY id DESC LIMIT 7");
        $result = $query->result_array();
        return $result;
    }
    
    public function postojiUsername(){
        $this->db->where('username',$this->username);
        $result=$this->db->get('korisnikst');
        if($result->result())
            return TRUE;
        else
            return false;
    }
    public function ispravanpassword($password){
        $this->db->where('username',$this->username);
        $this->db->where('password',$password);
        $result = $this->db->get('korisnikst');
        $korisnikst = $result->row_array();
       
        if($korisnikst!=NULL){
            $this->ime=$korisnikst['ime'];
            $this->prezime=$korisnikst['prezime'];
            $this->id=$korisnikst['id'];
            $this->username=$korisnikst['username'];
            $this->pravnoLice=$korisnikst['nazplica'];
            $this->datumOsn=$korisnikst['datosnivanja'];
            $this->pib=$korisnikst['pib'];
            $this->adresa=$korisnikst['adresa'];
            $this->zemlja=$korisnikst['zemlja'];
            $this->grad=$korisnikst['grad'];
            $this->telefon=$korisnikst['ktelefon'];
            $this->email=$korisnikst['email'];
            $this->oblPos=$korisnikst['oposlovanja'];
            $this->predPro=$korisnikst['posao'];
            $this->iznos=$korisnikst['tiznos'];
            $this->statIntS=$korisnikst['statintsvojine'];
            $this->patent=$korisnikst['podopatentu'];
            $this->facebook=$korisnikst['facebook'];
            $this->twitter=$korisnikst['twitter'];
            $this->linkedin=$korisnikst['linkedin'];
            $this->website=$korisnikst['website'];
            $this->slika=$korisnikst['slika'];
            
            return TRUE;
        }
        else
            return false;
        
    }
    
    public function proveriUsernameReg($username) {
        $result=$this->db->query("SELECT username FROM korisnikinv where username like '$username' UNION SELECT username FROM korisnikst where username like '$username'");
        $result = $result->row_array();
        return $result;

    }    
    
    public function proveriEmailReg($email) {
        $result=$this->db->query("SELECT email FROM korisnikinv where email like '$email' UNION SELECT email FROM korisnikst where email like '$email'");
        $result = $result->row_array();
        return $result;
    }

    public function dohvatiGradove(){
        $this->db->order_by('ime', 'asc');
        $query = $this->db->get('gradovi');
        $result = $query->result_array();
        return $result;
    }

    public function dohvatiOblasti(){
        $this->db->order_by('ime', 'asc');
        $query = $this->db->get('oposlovanja');
        $result = $query->result_array();
        return $result;
    }

    public function dohvatiZemlje(){
        $this->db->order_by('ime', 'asc');
        $query = $this->db->get('zemlje');
        $result = $query->result_array();//vraca niz diskusija
        return $result;
    }

    function dodajKorisnika($insertData) {
        if($this->db->insert("korisnikst", $insertData)){
        return true;
        
        }
    }
    
    function izmeniProfil($idprofila, $insertData) {
        $this->db->where("id", $idprofila);
        $this->db->set("password", $insertData['password']);
        $this->db->set("nazplica", $insertData['nazplica']);
        $this->db->set("datosnivanja", $insertData['datosnivanja']);
        $this->db->set("brregistracije", $insertData['brregistracije']);
        $this->db->set("pib", $insertData['pib']);
        $this->db->set("ime", $insertData['ime']);
        $this->db->set("prezime", $insertData['prezime']);
        $this->db->set("srimezakpre", $insertData['srimezakpre']);
        $this->db->set("adresa", $insertData['adresa']);
        $this->db->set("zemlja", $insertData['zemlja']);
        $this->db->set("grad", $insertData['grad']);
        $this->db->set("opstina", $insertData['opstina']);
        $this->db->set("ktelefon", $insertData['ktelefon']);
        $this->db->set("email", $insertData['email']);
        $this->db->set("oposlovanja", $insertData['oposlovanja']);
        $this->db->set("brzaposlenih", $insertData['brzaposlenih']);
        $this->db->set("prihod", $insertData['prihod']);
        $this->db->set("profit", $insertData['profit']);
        $this->db->set("posao", $insertData['posao']);
        $this->db->set("tiznos", $insertData['tiznos']);
        $this->db->set("statintsvojine", $insertData['statintsvojine']);
        $this->db->set("podopatentu", $insertData['podopatentu']);
        $this->db->set("website", $insertData['website']);
        $this->db->set("facebook", $insertData['facebook']);
        $this->db->set("twitter", $insertData['twitter']);
        $this->db->set("linkedin", $insertData['linkedin']);
        $this->db->set("javni", $insertData['javni']);


        if($this->db->update("korisnikst")){
        return true;
        
        }
    }
    
    function izmeniProfilInv($idprofila, $insertData) {
        $this->db->where("id", $idprofila);
        $this->db->set("password", $insertData['password']);
        $this->db->set("nazplica", $insertData['nazplica']);
        $this->db->set("brregistracije", $insertData['brregistracije']);
        $this->db->set("pib", $insertData['pib']);
        $this->db->set("ime", $insertData['ime']);
        $this->db->set("prezime", $insertData['prezime']);
        $this->db->set("srimezakpre", $insertData['srimezakpre']);
        $this->db->set("adresa", $insertData['adresa']);
        $this->db->set("zemlja", $insertData['zemlja']);
        $this->db->set("grad", $insertData['grad']);
        $this->db->set("opstina", $insertData['opstina']);
        $this->db->set("ktelefon", $insertData['ktelefon']);
        $this->db->set("email", $insertData['email']);
        $this->db->set("oposlovanja", $insertData['oposlovanja']);
        $this->db->set("brzaposlenih", $insertData['brzaposlenih']);
        $this->db->set("prihod", $insertData['prihod']);
        $this->db->set("testiranje", NULL);
        $this->db->set("profit", $insertData['profit']);
        $this->db->set("posao", $insertData['posao']);
        $this->db->set("vrusluga", $insertData['vrusluga']);
        $this->db->set("inviznos", $insertData['inviznos']);
        $this->db->set("facebook", $insertData['facebook']);
        $this->db->set("twitter", $insertData['twitter']);
        $this->db->set("linkedin", $insertData['linkedin']);
        $this->db->set("website", $insertData['website']);
        $this->db->set("javni", $insertData['javni']);
        
     
        if($this->db->update("korisnikinv")){
            return true;
        }
    }
    
    public function upisiSliku($user, $slika) {
        $this->db->where("username",$user);
        $this->db->set("slika", $slika);
        
        if($this->db->update("korisnikst")){
            $result=$this->db->query("SELECT slika FROM korisnikst where username like '$user'");
            $result = $result->row_array();
            return $result;
        }
    }
    
    public function dohvatiTipove(){
        $query = $this->db->get('diskusijatip');
        $result=$query->result_array();//vraca niz diskusija
        return $result;
    }
    
    public function dodajNoviTip($username, $naslov){
        $this->db->set('autor', $username);
        $this->db->set('naslov', $naslov);
        $this->db->set("datum", mdate("%Y-%m-%d"));
        if($this->db->insert('diskusijatip')){
            return true;
        }
        
    }
    
    public function dodajDiskusiju($idtipa, $naslov, $sadrzaj, $vidljivost, $autor, $slika){
        if($this->session->userdata('korisnikst')){
            $this->db->set("korisnikst_username", $autor);
        } elseif($this->session->userdata('korisnikinv')){
            $this->db->set("korisnikinv_username", $autor);
        }
        $this->db->set('id_tipa', $idtipa);
        $this->db->set("naslov", $naslov);
        $this->db->set("vidljivost", $vidljivost);
        $this->db->set("sadrzaj",$sadrzaj);
        $this->db->set("arhiv", 1);
        $this->db->set("datum", mdate("%Y-%m-%d"));
        $this->db->set('slika_st', $slika);
        $this->db->insert("diskusije");
        $id=$this->db->insert_id();
        return $id;
    }
    
    public function dohvatiDiskusije($autorId, $idtipa, $limit, $pocetni_index = 0){
        if($this->session->userdata('korisnikst') ){
            $this->db->where("(vidljivost = 1 OR vidljivost = 3 OR vidljivost = 4 OR korisnikst_username like '$autorId') AND (arhiv = 1 AND id_tipa = $idtipa)");
            $query=$this->db->get('diskusije',$limit,$pocetni_index);
            $result=$query->result_array();
            return $result;
        }elseif($this->session->userdata('korisnikinv')){
            //$result=$this->db->query("SELECT * FROM diskusije WHERE (vidljivost = 2 OR vidljivost = 3 OR vidljivost = 4 OR korisnikinv_username like '$autorId') AND (arhiv = 1 AND id_tipa = $idtipa)");
            $this->db->where("(vidljivost = 1 OR vidljivost = 2 OR vidljivost = 4 OR korisnikst_username like '$autorId') AND (arhiv = 1 AND id_tipa = $idtipa)");
            $query=$this->db->get('diskusije',$limit,$pocetni_index);
            $result=$query->result_array();
            return $result;
        }elseif($this->session->userdata('admin')){
            $this->db->where("id_tipa", $idtipa);
            $result=$this->db->get('diskusije',$limit, $pocetni_index);
            $result=$result->result_array();
            return $result;
        }
         else {
            $this->db->where("vidljivost", "4");
            $this->db->where("id_tipa", $idtipa);
            $query=$this->db->get('diskusije',$limit,$pocetni_index);//prikazujem prvih deset diskusija
            $result=$query->result_array();//vraca niz diskusija
            return $result;
        }    
    }

    public function brojDiskusija($autorId, $idtipa){
        if($this->session->userdata('korisnikst') ){
            $result=$this->db->query("SELECT * FROM diskusije WHERE (vidljivost = 1 OR vidljivost = 3 OR vidljivost = 4 OR korisnikst_username like '$autorId') AND (arhiv = 1 AND id_tipa = $idtipa)");
            $result=$result->result_array();
            return $result;
        }elseif($this->session->userdata('korisnikinv')){
            $result=$this->db->query("SELECT * FROM diskusije WHERE (vidljivost = 2 OR vidljivost = 3 OR vidljivost = 4 OR korisnikinv_username like '$autorId') AND (arhiv = 1 AND id_tipa = $idtipa)");
            $result=$result->result_array();
            return $result;
        }elseif($this->session->userdata('admin')){
            $this->db->where("id_tipa", $idtipa);
            $result=$this->db->get('diskusije');
            $result=$result->result_array();
            return $result;
        }
         else {
            $this->db->where("vidljivost", "4");
            $this->db->where("id_tipa", $idtipa);
            $query=$this->db->get('diskusije');//prikazujem prvih deset diskusija
            $result=$query->result_array();//vraca niz diskusija
            return $result;
        }    
    }
    
    public function dohvatiDiskusiju($iddiskusije){
        $this->db->where("id",$iddiskusije);
        $query=$this->db->get('diskusije');
        $result=$query->row_array();//
        return $result;
    }
    
    public function odgovorNaDiskusije($iddiskusije, $limit, $pocetni_index = 0){
        $this->db->where("diskusije_id", $iddiskusije);
        $query=$this->db->get('diskusijeodg', $limit, $pocetni_index);
        $result=$query->result_array();//vraca niz 
        return $result;
    }
    public function brojOdgovoraNaDiskusije($iddiskusije){
        $this->db->where("diskusije_id", $iddiskusije);
        $query=$this->db->get('diskusijeodg');
        $result=$query->result_array();//vraca niz
        return $result;
    }
    
    public function dohvatiUkupno($iddiskusije){
        $query = $this->db->query("SELECT * FROM diskusijeodg WHERE diskusije_id = $iddiskusije");
        $threads = $query->num_rows();
        return $threads;
    }
    
    public function dohvatiUkupneDiskusije($idtipa) {
        $query = $this->db->query("SELECT * FROM diskusije WHERE id_tipa = $idtipa");
        $threads = $query->num_rows();
        return $threads;
    }
    
    public function dodajOdgovor($idDiskusije, $sadrzaj, $autorId, $slika){
        if($this->session->userdata('korisnikst')){
            $this->db->set("korisnikst_username", $autorId);
        } elseif($this->session->userdata('korisnikinv')){
            $this->db->set("korisnikinv_username", $autorId);
        }
        $this->db->set("diskusije_id",$idDiskusije);
        $this->db->set("sadrzaj",$sadrzaj);
        $this->db->set("datum", mdate("%Y-%m-%d"));
        $this->db->set("slika_st", $slika);
        $this->db->insert("diskusijeodg");
    }
    
    public function dohvatiVesti($autorId, $limit=1000,$pocetak=0){ 
            $query=$this->db->get('vesti',$limit,$pocetak);//prikazujem prvih deset diskusija
            $result=$query->result_array();//vraca niz diskusija
            return $result;
    }
    
    public function prikaziVest($idvesti){
        $this->db->where("id_vesti",$idvesti);
        $query=$this->db->get('vesti');
        $result=$query->row_array();//
        return $result;
    }
    
    public function dodajVest($naslov, $sadrzaj, $autorId, $slika){
        $this->db->set("naslov", $naslov);
        $this->db->set("sadrzaj", $sadrzaj);
        if($this->session->userdata('korisnikst')){
            $this->db->set("autor_startup", $autorId);
        } elseif($this->session->userdata('korisnikinv')){
            $this->db->set("autor_investitor", $autorId);
        }
        $this->db->set("datum", mdate("%Y-%m-%d"));
        $this->db->set("slika", $slika);
        $this->db->insert("vesti");
        $id=$this->db->insert_id();
        return $id;
    }
    
     public function dohvatiVest($idvesti){
        $this->db->where("id_vesti",$idvesti);
        $query=$this->db->get('vesti');
        $result=$query->row_array();//
        return $result;
    }
    
     public function odgovorNaVesti($idvesti){
        $this->db->where("vesti_id",$idvesti);
        $query=$this->db->get('vestiodg');
        $result=$query->result_array();//vraca niz 
        return $result;
    }
    
    public function dodajOdgovorNaVesti($idvesti, $sadrzaj, $autorId){
        if($this->session->userdata('korisnikst')){
            $this->db->set("korisnikst_username", $autorId);
        } elseif($this->session->userdata('korisnikinv')){
            $this->db->set("korisnikinv_username", $autorId);
        }
        $this->db->set("vesti_id",$idvesti);
        $this->db->set("sadrzaj",$sadrzaj);
        $this->db->set("datum", mdate("%Y-%m-%d"));
        $this->db->insert("vestiodg");
    }
    
    public function dohvatiUkupneVesti($idvesti){
        $query = $this->db->query("SELECT * FROM vestiodg WHERE vesti_id = $idvesti");
        $threads = $query->num_rows();
        return $threads;
    }
    
     public function postojiEmailAdmin(){
        $this->db->where('email',$this->email);
        $result=$this->db->get('admin');
        if($result->result())
            return TRUE;
        else
            return false;
    }
    public function ispravanpasswordAdmin($password){
        $this->db->where('email',$this->email);
        $this->db->where('password',$password);
        $result=$this->db->get('admin');
        $admin=$result->row_array();
       
        if($admin!=NULL){
            $this->username=$admin['username'];
            $this->email=$admin['email'];
            $this->username=$admin['username'];
            
            return TRUE;
        }
        else
            return false;
        
    }
    
    public function dodajGrupu($ime, $opis, $autorId, $grad, $zemlja, $oblPos){
        $this->db->set("ime", $ime);
        $this->db->set("opis",$opis);
        $this->db->set("grad",$grad);
        $this->db->set("zemlja",$zemlja);
        $this->db->set("oblastposlovanja",$oblPos);
        $this->db->set("osnivac", $autorId);
        $this->db->set("datum", mdate("%Y-%m-%d"));
        $this->db->set("status", 1);
        $this->db->insert("grupe");
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function dohvatiGrupe(){
        //public function dohvatiGrupe($limit, $pocetni_index);
        //$query=$this->db->get('grupe',$limit,$pocetni_index);
        $query=$this->db->get('grupe');
        $result=$query->result_array();//vraca niz diskusija
        return $result;
    }
    
    public function prebrojGrupe(){
        $query=$this->db->get('grupe');
        $result=$query->num_rows();
        return $result;
    }
    
    public function dohvatiGrupu($idgrupe){
        $this->db->where("id",$idgrupe);
        $query=$this->db->get('grupe');
        $result=$query->row_array();//
        return $result;
    }
    
    public function proveraClana($user, $idgrupe){
        $this->db->where('clan', $user);
        $this->db->where('id_grupe', $idgrupe);
        $query = $this->db->get('clanovigrupe');
        $result = $query->num_rows();
        return $result;
    }
    
    public function pretragaClanova($username, $idgrupe){
        $this->db->where('clan', $username);
        $this->db->where('id_grupe', $idgrupe);
        $query = $this->db->get('clanovigrupe');
        $result = $query->num_rows();
        return $result;
    }
    
    public function obrisiClana($username, $idgrupe){
        $this->db->where('clan', $username);
        $this->db->where('id_grupe', $idgrupe);
        $this->db->delete("clanovigrupe");
    }
    
    public function uclaniClana($imegrupe, $idgrupe , $user, $email, $grad, $oblast){
        $this->db->set("ime_grupe", $imegrupe);
        $this->db->set("id_grupe", $idgrupe);
        $this->db->set("clan", $user);
        $this->db->set("email", $email);
        $this->db->set("grad", $grad);
        $this->db->set("oposlovanja", $oblast);
        $this->db->insert("clanovigrupe");
        $query=$this->db->get('clanovigrupe');
        $result=$query->result_array();//vraca niz diskusija
        return $result;        
        
    }
    
    public function dohvatiClanove($idgrupe){
        $this->db->where('id_grupe', $idgrupe);
        $query = $this->db->get('clanovigrupe');
        $result= $query->result_array();
        return $result;
    }
    
    public function obrisiGrupu($idgrupe){
        $this->db->where('id', $idgrupe);
        $this->db->delete('grupe');
    }
    
    public function dohvatiTeme($idgrupe, $user){
        $this->db->where('grupe_id', $idgrupe);
        $this->db->where('clan_username', $user);
        $query = $this->db->get('diskusijeodg');
        $result = $query->result_array();
        return $result;
    }
    
    public function dodajTemu($idgrupe, $autor, $sadrzaj, $slika){
        $this->db->set('grupe_id', $idgrupe);
        $this->db->set('clan_username', $autor);
        $this->db->set('sadrzaj', $sadrzaj);
        $this->db->set('slika_st', $slika);
        $this->db->set('datum', mdate("%Y/%m/%d %H:%i:%s"));
        $this->db->insert('diskusijeodg');
    }

    public function pretraga($trazi, $grad, $zemlja, $oblast){

//        $query = "SELECT * FROM `grupe` WHERE `status`='1' ";
//
//        if($trazi && !empty($trazi)){
//            $query .= " AND (`ime` LIKE '%".$trazi."%' OR `opis` LIKE '%".$trazi."%')";
//        }
//        if($grad && !empty($grad)){
//            $query .= " AND (`grad` LIKE '".$grad."')";
//        }
//        if($zemlja && !empty($zemlja)){
//            $query .= " AND (`zemlja` LIKE '".$zemlja."')";
//        }
//        if($oblast && !empty($oblast)) {
//            $query .= " AND (`oblastposlovanja` LIKE '" . $oblast . "')";
//        }
//
//        $result = $this->db->query($query);
//        $result = $result->result_array();
//        return $result;


//        $trazi = isset($post['trazi']) && !is_null($post['trazi']) && !empty($post['trazi']) ? $post['trazi'] : NULL;
//        $grad = isset($post['grad']) && !is_null($post['grad']) && !empty($post['grad']) ? $post['grad'] : NULL;
//        $zemlja = isset($post['zemlja']) && !is_null($post['zemlja']) && !empty($post['zemlja']) ? $post['zemlja'] : NULL;
//        $oblast = isset($post['oblast']) && !is_null($post['oblast']) && !empty($post['oblast']) ? $post['oblast'] : NULL;


        $this->db->select("*");
        $this->db->from('grupe');
        $this->db->where('status', 1);

        /**
         * Question is not null
         */
        if($trazi != NULL)
        {
            $this->db->group_start();
            $this->db->like('ime', $trazi);
            $this->db->or_like('opis', $trazi);
            $this->db->group_end();
        }

        /**
         * City is not null
         */
        if($grad != NULL)
            $this->db->like('grad', $grad);

        /**
         * Country is not null
         */
        if($zemlja != NULL)
            $this->db->like('zemlja', $zemlja);
        /**
         * Area is not null
         */
        if($oblast != NULL)
            $this->db->like('oblastposlovanja', $oblast);

        $this->db->order_by('ime', 'asc');
        $result = $this->db->get();
        $result = $result->result_array();
        return $result;

    }
    
    public function arhivirajDiskusije($iddiskusije, $autorId){
        $this->db->where("id", $iddiskusije);
        if($this->session->userdata('korisnikst')){
            $this->db->where("korisnikst_username", $autorId);
        } elseif($this->session->userdata('korisnikinv')){
            $this->db->where("korisnikinv_username", $autorId);
        }
        $this->db->set("vidljivost", "5");
        $this->db->set("arhiv", "2");
        $this->db->set('datum_arhiv', mdate("%Y/%m/%d %H:%i:%s"));
        $this->db->update("diskusije");
        $result=$this->db->get("diskusije");
        $result = $result->row_array();
        return $result;
    }
    
    public function dohvatiArhivirano($autor){
        if($this->session->userdata('korisnikst')){
            $this->db->where("korisnikst_username", $autor);
        } elseif($this->session->userdata('korisnikinv')){
            $this->db->where("korisnikinv_username", $autor);
        }
        $this->db->where("arhiv", "2");
        $result = $this->db->get("diskusije");
        $result = $result->result_array();
        return $result;
    }
    
    public function dohvatiArhiviranoAdmin(){
        $this->db->where("vidljivost", "5");
        $result = $this->db->get("diskusije");
        $result = $result->result_array();
        return $result;
    }
    
    public function obrisiDiskusiju($iddiskusije){
        $this->db->where('id', $iddiskusije);
        $this->db->delete("diskusije");
    }
    
    public function obrisiOdgovor($odgovornadiskusiju){
        $this->db->where('id', $odgovornadiskusiju);
        $this->db->delete("diskusijeodg");
    }
    
    public function obrisiOglas($idoglasa){
        $this->db->where('id', $idoglasa);
        $this->db->delete("oglasi");
    }
    
    public function obrisiVest($idvesti){
        $this->db->where('id_vesti', $idvesti);
        $this->db->delete("vesti");
    }
    
    public function obrisiOdgovorVesti($idogovora){
        $this->db->where('id', $idogovora);
        $this->db->delete("vestiodg");
    }
    
    public function dohvatiProfilSt($idprofila){
        $this->db->where('id', $idprofila);
        $result = $this->db->get('korisnikst');
        $result = $result->row_array();
        return $result;
    }
    
    public function dohvatiProfilInv($idprofila){
        $this->db->where('id', $idprofila);
        $result = $this->db->get('korisnikinv');
        $result = $result->row_array();
        return $result;
    }
    public function dohvatiProfil($username){
        $query = $this->db->query("SELECT * FROM korisnikinv where username like '$username' UNION SELECT * FROM korisnikst where username like '$username'");
        $result = $query->row_array();
        return $result;
    }
    
    public function primaocMaila($idgrupe){
         $query = $this->db->query("SELECT email FROM clanovigrupe where id_grupe like '$idgrupe'");
         $result = $query->result_array();
         return $result;
    }
    
    
}