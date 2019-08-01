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
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function postojiUsername(){
        $this->db->where('username',$this->username);
        $result=$this->db->query('SELECT username FROM korisnikst UNION SELECT username FROM korisnikinv');

        if($result->result())
            return TRUE;
        else
            return false;
    }
    public function ispravanpassword($password){
        $this->db->where('username',$this->username);
        $this->db->where('password',$password);
        $result=$this->db->get('korisnikinv');
        $autorinv=$result->row_array();
       
        if($autorinv!=NULL){
            $this->ime=$autorinv['ime'];
            $this->prezime=$autorinv['prezime'];
            $this->id=$autorinv['id'];
            return TRUE;
        }
        else
            return false;
        
    }
    
}
