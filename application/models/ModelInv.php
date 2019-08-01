<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelAutor
 *
 * @author Korisnik
 */
class ModelInv extends CI_Model {
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
    public $tipinv;
    public $brzaposlenih;
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
    
    public function postojiUsername(){
        $this->db->where('username',$this->username);
        $result=$this->db->get('korisnikinv');
        if($result->result())
            return TRUE;
        else
            return false;
    }
    public function ispravanpassword($password){
        $this->db->where('username',$this->username);
        $this->db->where('password',$password);
        $result=$this->db->get('korisnikinv');
        $korisnikinv=$result->row_array();
       
        if($korisnikinv!=NULL){
            $this->ime=$korisnikinv['ime'];
            $this->prezime=$korisnikinv['prezime'];
            $this->id=$korisnikinv['id'];
            $this->username=$korisnikinv['username'];
            $this->pravnoLice=$korisnikinv['nazplica'];
            $this->datumOsn=$korisnikinv['datosnivanja'];
            $this->pib=$korisnikinv['pib'];
            $this->adresa=$korisnikinv['adresa'];
            $this->zemlja=$korisnikinv['zemlja'];
            $this->grad=$korisnikinv['grad'];
            $this->telefon=$korisnikinv['ktelefon'];
            $this->email=$korisnikinv['email'];
            $this->oblPos=$korisnikinv['oposlovanja'];
            $this->predPro=$korisnikinv['posao'];
            $this->tipinv=$korisnikinv['tipinv'];
            $this->brzaposlenih=$korisnikinv['brzaposlenih'];
            $this->iznos=$korisnikinv['tiznos'];
            $this->statIntS=$korisnikinv['statintsvojine'];
            $this->patent=$korisnikinv['podopatentu'];
            $this->facebook=$korisnikinv['facebook'];
            $this->twitter=$korisnikinv['twitter'];
            $this->linkedin=$korisnikinv['linkedin'];
            $this->website=$korisnikinv['website'];
            $this->slika=$korisnikinv['slika'];

            return TRUE;
        }
        else
            return false;
        
    }
    
    public function proveriEmailReg($email) {
        $result=$this->db->query("SELECT email FROM korisnikinv where email like '$email' UNION SELECT email FROM korisnikst where email like '$email'");
        $result = $result->row_array();
        return $result;
    }
    
    public function proveriUsernameReg($username) {
        $result=$this->db->query("SELECT username FROM korisnikinv where username like '$username' UNION SELECT username FROM korisnikst where username like '$username'");
        $result = $result->row_array();
        return $result;
    }
    function dodajKorisnika($insertData) {
        if($this->db->insert("korisnikinv", $insertData)){
        
            return true;
        
        }
        
    }
    public function upisiSliku($user, $slika) {
            $this->db->where("username",$user);
            $this->db->set("slika", $slika);
        
        if($this->db->update("korisnikinv")){
            $result=$this->db->query("SELECT slika FROM korisnikinv where username like '$user'");
            $result = $result->row_array();
            return $result;
            }
        }
        public function dodajOdgovore($iddiskusije, $odgovor, $autorId){
        $this->db->where("diskusije_id", $iddiskusije);
        $this->db->set("sadrzaj", $odgovor);
        $this->db->set("datum", mdate("%Y-%m-%d"));
        $this->db->set("korisnik_username", $autorId);
        $this->db->insert("diskusijeodg");
        $id=$this->db->insert_id();
        return $id;
        
    }
    
    public function dodajOglas($naslov, $sadrzaj, $autorId){
        $this->db->set("naslov", $naslov);
        $this->db->set("sadrzaj", $sadrzaj);
        $this->db->set("inv_username", $autorId);
        $this->db->set("datum", mdate("%Y-%m-%d"));
        $this->db->insert("oglasi");
        $id=$this->db->insert_id();
        return $id;
    }
    
    public function dohvatiOglase($limit = 10, $pocetak = 0){
        $query=$this->db->get('oglasi',$limit,$pocetak);//prikazujem prvih deset diskusija
        $result=$query->result_array();//vraca niz oglasa
        return $result;
    }
    
    public function dohvatiOglas($idoglasa){
        $this->db->where("id",$idoglasa);
        $query=$this->db->get('oglasi');
        $result=$query->row_array();//
        return $result;
    }
    
    public function pretragaGrupa($naziv){
       // $query=$this->db->query("select * from Vest where naslov like '%$naziv%'");
       // $query=$this->db->get_where('vest',"naslov like '%$naziv%' "
         //       . "OR sadrzaj like '%$naziv%'");
        
        $this->db->like("ime", $naziv);
        $this->db->or_like("opis", $naziv);
        $this->db->from("grupe");
        $this->db->select("id, ime, opis");
        
        $query=$this->db->get();

        return $query->result_array();
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
        $this->db->set("slika_inv", $slika);
        $this->db->insert("diskusijeodg");
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
        $this->db->set('slika_inv', $slika);
        $this->db->insert("diskusije");
        $id=$this->db->insert_id();
        return $id;
    }

    public function pretraga($naziv){
        // $query=$this->db->query("select * from Vest where naslov like '%$naziv%'");
        // $query=$this->db->get_where('vest',"naslov like '%$naziv%' "
        //       . "OR sadrzaj like '%$naziv%'");

        $this->db->like("ime", $naziv);
        $this->db->or_like("opis", $naziv);
        $query = $this->db->get("grupe");

        return $query->result_array();
    }

    public function dohvatiGradove(){
        $query = $this->db->get('gradovi');
        $result = $query->result_array();
        return $result;
    }

    public function dohvatiOblasti(){
        $query = $this->db->get('oposlovanja');
        $result = $query->result_array();
        return $result;
    }

    public function dohvatiZemlje(){
        $query = $this->db->get('zemlje');
        $result = $query->result_array();//vraca niz diskusija
        return $result;
    }

}
