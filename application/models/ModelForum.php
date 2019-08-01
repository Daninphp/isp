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
class ModelForum extends CI_Model {
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
    /*
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
            $this->username=$korisnikst['username'];
            $this->pravnoLice=$korisnikst['pravnolice'];
            $this->datumOsn=$korisnikst['datumosn'];
            $this->pib=$korisnikst['pib'];
            $this->adresa=$korisnikst['adresa'];
            $this->zemlja=$korisnikst['zemlja'];
            $this->grad=$korisnikst['grad'];
            $this->telefon=$korisnikst['telefon'];
            $this->email=$korisnikst['email'];
            $this->oblPos=$korisnikst['oblspos'];
            $this->predPro=$korisnikst['predpro'];
            $this->iznos=$korisnikst['iznos'];
            $this->statIntS=$korisnikst['statints'];
            $this->patent=$korisnikst['patent'];
            $this->facebook=$korisnikst['facebook'];
            $this->twitter=$korisnikst['twitter'];
            $this->linkedin=$korisnikst['linkedin'];
            $this->website=$korisnikst['website'];
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function dodajDiskusiju($naslov, $sadrzaj, $vidljivost, $autor){
        $this->db->set("korisnik_username", $autor);
        $this->db->set("naslov", $naslov);
        $this->db->set("vidljivost", $vidljivost);
        $this->db->set("sadrzaj",$sadrzaj);
        $this->db->set("datum", mdate("%Y-%m-%d"));
        $this->db->insert("diskusije");
        $id=$this->db->insert_id();
        return $id;
    }
    
    public function dohvatiDiskusije($autor=NULL, $limit=1000,$pocetak=0){
        // if($autor!=NULL)
        //    $this->db->where("autor",$autor);
        $query=$this->db->get('diskusije',$limit,$pocetak);//prikazujem prvih deset vesti
        $result=$query->result_array();//vraca niz vesti
        return $result;
    }
    
    public function dohvatiDiskusiju($iddiskusije){
        $this->db->where("id",$iddiskusije);
        $query=$this->db->get('diskusije');
        $result=$query->row_array();//vraca jednu vest
        return $result;
    }
    
    public function odgovorNaDiskusije($iddiskusije){
        $this->db->where("diskusije_id",$iddiskusije);
        $query=$this->db->get('diskusijeodg');
        $result=$query->result_array();//vraca niz 
        return $result;
    }
    
}
