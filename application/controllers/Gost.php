<?php
class Gost extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("ModelInv");
        $this->load->model("ModelSt");
        $this->load->library('session');
        if(($this->session->userdata('korisnikst'))!=NULL)
            redirect("KorisnikSt");
        elseif(($this->session->userdata('korisnikinv'))!=NULL)
            redirect("KorisnikInv");
        }
    
        
    private function loadView($data,$glavniDeo){
        $this->load->view("sablon/header_gost.php", $data);
        $this->load->view($glavniDeo, $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function index(){
        $poslednjevesti = $this->ModelSt->poslednjeVesti();
        $poslednjediskusije= $this->ModelSt->poslednjeDiskusije();
        $data["poslednjevesti"] = $poslednjevesti;
        $data['poslednjediskusije'] = $poslednjediskusije;
        $data['controller'] = "Gost";
        $this->loadView($data , "pocetna.php");     
    }
    
    public function administracijaSajta(){
        $this->load->view("admin.php");
    }
    
    public function ulogujAdmin(){
        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_message("required","Polje {field} je ostalo prazno.");
        if($this->form_validation->run())
        {
            $this->ModelSt->email=$this->input->post('email');
            if(!$this->ModelSt->postojiEmailAdmin())
                $this->ulogujAdmin("Neispravan username!");
            else if(!$this->ModelSt->ispravanpasswordAdmin($this->input->post('password')))
                $this->ulogujAdmin("Neispravan password!");
            else {
                $this->load->library('session');
                $this->session->set_userdata('admin', $this->ModelSt);
                redirect("Admin/index");
            }     
        }
        else
            $this->logst();
    }
    
    public function oglasi(){
        $data['controller'] = "Gost";
        $this->loadView(NULL, "oglasi.php");     
    }
    
    public function vesti(){
        $vesti = $this->ModelSt->dohvatiVesti($autorId = NULL);
        foreach ($vesti as $value) {
            $threads[$value['id_vesti']] = $this->ModelSt->dohvatiUkupneVesti($value['id_vesti']);
        }
        $data['vesti']=$vesti;
        $data['controller'] = "Gost";
        $this->loadView($data, "vesti.php");     
    }
    
    public function prikaziVest($idvesti){
        $vesti = $this->ModelSt->dohvatiVest($idvesti);
        $data['vesti']=$vesti;
        $odgovorNaVesti = $this->ModelSt->odgovorNaVesti($idvesti);
        $data['odgovorNaVesti']=$odgovorNaVesti;
        $data['controller']= "Gost";
        $data['idvesti'] = $idvesti;
        $this->loadView($data, "prikazivesti.php");
    }
    
    public function tipoviDiskusija(){
        $tipovidiskusija = $this->ModelSt->dohvatiTipove();
        foreach ($tipovidiskusija as $value) {
            $threads[$value['id']] = $this->ModelSt->dohvatiUkupneDiskusije($value['id']);
        }
        $data['threads']=$threads;
        $tipovidiskusija = $this->ModelSt->dohvatiTipove();
        $data['tipovidiskusija'] = $tipovidiskusija;
        $data['controller']= "Gost";
        $this->loadView($data, "diskusije_tipovi.php");
    }
    
    public function diskusije($idtipa){
        if($this->uri->segment(4))
            $pocetni_index=$this->uri->segment(4);
        else
            $pocetni_index=0;
        $limit=LIMIT_PO_STRANICI;
        $diskusije=$this->ModelSt->dohvatiDiskusije($autorId = NULL, $idtipa, $limit, $pocetni_index);
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
        $config_pagination['base_url']= site_url("Gost/diskusije/".$idtipa);
        $config_pagination['total_rows']= count($ukupanBrDiskusija);
        $config_pagination['per_page'] = $limit;
        $config_pagination['next_link'] = 'Next';
        $config_pagination['prev_link'] = 'Prev';
        
        $this->pagination->initialize($config_pagination);
        $data['links']=$this->pagination->create_links();
        $data['diskusije']=$diskusije;
        $data['controller']= "Gost";
        $this->loadView($data, "diskusije.php");     
    }

    public function prikaziDiskusiju($iddiskusije){

        $diskusija = $this->ModelSt->dohvatiDiskusiju($iddiskusije);

        $limit = 2;
        $pocetni_index = 0;

        $odgovorNaDiskusije = $this->ModelSt->odgovorNaDiskusije($iddiskusije, $limit, $pocetni_index);

        $this->load->library('pagination');

        $this->config->load('bootstrap_pagination');

        $ukupanBrOdgovora=$this->ModelSt->brojOdgovoraNaDiskusije($iddiskusije);

        $config_pagination=$this->config->item('pagination');
        $config_pagination['uri_segment']  = 4;
        $config_pagination['base_url']= site_url("Gost/prikaziDiskusiju/".$iddiskusije);
        $config_pagination['total_rows']= count($ukupanBrOdgovora);
        $config_pagination['per_page'] = $limit;
        $config_pagination['next_link'] = 'Next';
        $config_pagination['prev_link'] = 'Prev';

        $this->pagination->initialize($config_pagination);

        $data['links']=$this->pagination->create_links();
        $data['ukupanBrOdgovora']=$ukupanBrOdgovora;
        $data['diskusija']=$diskusija;
        $data['odgovorNaDiskusije']=$odgovorNaDiskusije;
        $data['controller']= "Gost";
        $data['iddiskusije'] = $iddiskusije;
        $this->loadView($data, "prikazidiskusije.php");
    }
    
    public function reginv($poruka = NULL){
        $gradovi = $this->ModelSt->dohvatiGradove();
        $oblasti = $this->ModelSt->dohvatiOblasti();
        $zemlje = $this->ModelSt->dohvatiZemlje();

        $data['gradovi'] = $gradovi;
        $data['oblasti'] = $oblasti;
        $data['zemlje'] = $zemlje;
        $podaci=array();
        if($poruka)
            $podaci['poruka']=$poruka;
        $data['controller'] = "Gost";
        $this->loadView( $data, 'reg_investitor.php');
    }

    public function regist($poruka = NULL){

        $gradovi = $this->ModelSt->dohvatiGradove();
        $oblasti = $this->ModelSt->dohvatiOblasti();
        $zemlje = $this->ModelSt->dohvatiZemlje();

        $data['gradovi'] = $gradovi;
        $data['oblasti'] = $oblasti;
        $data['zemlje'] = $zemlje;
        $podaci=array();
        if($poruka)
            $podaci['poruka']=$poruka;
        $data['controller'] = "Gost";
        $this->loadView( $data, 'reg_startup.php');
    }
    
    
    
    public function logst($poruka=NULL)
    {   
        
        $podaci=array();
        if($poruka)
            $podaci['poruka']=$poruka;
        $podaci['controller'] = "Gost";
        $this->loadView( $podaci, 'logstart.php');
    }
    
    public function loginv($poruka=NULL)
    {
        $podaci=array();
        if($poruka)
            $podaci['poruka']=$poruka;
        $podaci['controller'] = "Gost";
        $this->loadView( $podaci, 'loginvest.php');
    }
    

    
    public function ulogujst(){
        $this->form_validation->set_rules("username", "Usermane", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_message("required","Polje {field} je ostalo prazno.");
        if($this->form_validation->run())
        {
            $this->ModelSt->username = $this->input->post('username');

            if(!$this->ModelSt->postojiUsername())
                $this->logst("Neispravan username!");
            else if(!$this->ModelSt->ispravanpassword($this->input->post('password')))
                $this->logst("Neispravan password!");
            else {
                $this->load->library('session');
                $this->session->set_userdata('korisnikst', $this->ModelSt);
                redirect("KorisnikSt/index");
            }     
        }
        else
            $this->logst();
        
    }
     public function ulogujin(){
        $this->form_validation->set_rules("username", "Usermane", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_message("required","Polje {field} je ostalo prazno.");
        if($this->form_validation->run())
        {
            $this->ModelInv->username=$this->input->post('username');
            if(!$this->ModelInv->postojiUsername())
                $this->loginv("Neispravan username!");
            else if(!$this->ModelInv->ispravanpassword($this->input->post('password')))
                $this->loginv("Neispravan password!");
            else {
                $this->load->library('session');
                $this->session->set_userdata('korisnikinv', $this->ModelInv);
                redirect("KorisnikInv/index");
            }     
        }
        else
            $this->loginv();
        
    }
    
    public function registerstartup(){
    $this->form_validation->set_rules('username', 'Username', 'required');
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
    $this->form_validation->set_rules('posao', 'Posao', 'required');
    $this->form_validation->set_rules('iznos', 'Iznos', 'required');
    $this->form_validation->set_rules('statIntS', 'Stats', 'required');
    $this->form_validation->set_rules('patent', 'Patent', 'required');
    $this->form_validation->set_rules('facebook', 'Facebook');
    $this->form_validation->set_rules('twitter', 'Twitter');
    $this->form_validation->set_rules('linkedin', 'LinkedIn', 'required');
    $this->form_validation->set_rules('website', 'Website');
    $this->form_validation->set_rules('javni', 'Javni profil');
    
    if ($this->form_validation->run() == FALSE){
       $this->regst();
	} else {
            
	$username 	= $this->input->post('username');
	$password 	= $this->input->post('password');
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
    $posao 	    = $this->input->post('posao');
    $iznos 		= $this->input->post('iznos');
    $statIntS 	= $this->input->post('statIntS');
    $patent 	= $this->input->post('patent');
    $facebook 	= $this->input->post('facebook');
    $twitter 	= $this->input->post('twitter');
    $linkedin	= $this->input->post('linkedin');
    $website 	= $this->input->post('website');
    $javni      = $this->input->post('javni');
        
        
        $insertData = array(
                "username"=> $username,
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
                "posao"=>$posao,
                "tiznos"=>$iznos,
                "statintsvojine"=>$statIntS,
                "podopatentu"=>$patent,
                "website"=>$website,
                "facebook"=>$facebook,
                "twitter"=>$twitter,
                "linkedin"=>$linkedin,
                "javni"=>$javni
                );
                    
            $this->ModelSt->username=$this->input->post('username');
            $this->ModelSt->email=$this->input->post('email');

            $proveriUsernameReg = $this->ModelSt->proveriUsernameReg($username);
            $proveriEmailReg = $this->ModelSt->proveriEmailReg($email);
            
			
	if($proveriUsernameReg == 0){
            $insertUser = $this->ModelSt->dodajKorisnika($insertData);
		if($insertUser){
                    $this->logst();
                    } else {
                        $this->index();
                    }
                    
                    
        } else {
            $this->regst("Korisnicko ime je zauzeto!");
            }
        }
    }

    public function registerinvest(){
    $this->form_validation->set_rules('username', 'Username', 'required');
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
    $this->form_validation->set_rules('prihod', 'Prihod', 'required');
    $this->form_validation->set_rules('profit', 'Profit', 'required');
    $this->form_validation->set_rules('posao', 'TipInvestitora', 'required');
    $this->form_validation->set_rules('vrUsluga', 'VrsteUsluga', 'required');
    $this->form_validation->set_rules('inviznos', 'iznosInvestiranja', 'required');
    $this->form_validation->set_rules('facebook', 'Facebook');
    $this->form_validation->set_rules('twitter', 'Twiter');
    $this->form_validation->set_rules('linkedin', 'LinkedIn', 'required');
    $this->form_validation->set_rules('website', 'Website');
    $this->form_validation->set_rules('javni', 'Javni profil');
    
    if ($this->form_validation->run() == FALSE){
       $this->reginv();  
	} else {
            
        $username 	= $this->input->post('username');
        $password 	= $this->input->post('password');
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
        $prihod 	= $this->input->post('prihod');
        $profit 	= $this->input->post('profit');
        $posao	    = $this->input->post('posao');
        $vrUsluga 	= $this->input->post('vrUsluga');
        $inviznos   = $this->input->post('inviznos');
        $facebook 	= $this->input->post('facebook');
        $twitter 	= $this->input->post('twitter');
        $linkedin	= $this->input->post('linkedin');
        $website 	= $this->input->post('website');
        $javni          = $this->input->post('javni');
        
        
        $insertData = array(
                "username"=> $username,
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
                "prihod"=>$prihod,
                "profit"=>$profit,
                "posao"=>$posao,
                "vrusluga"=>$vrUsluga,
                "inviznos"=>$inviznos,
                "facebook"=>$facebook,
                "twitter"=>$twitter,
                "linkedin"=>$linkedin,
                "website"=>$website,
                "javni"=>$javni
                );
        
            $this->ModelInv->username=$this->input->post('username');
            $this->ModelInv->email=$this->input->post('email');

            $proveriUsernameReg = $this->ModelInv->proveriUsernameReg($username);
            $proveriEmailReg = $this->ModelInv->proveriEmailReg($email);
            
			
            if($proveriUsernameReg == 0){
                $insertUser = $this->ModelInv->dodajKorisnika($insertData);

                    if($insertUser){
                        $this->loginv();
                        } 


            } else {
            $this->index("Korisnicko ime je zauzeto!");
            }
            
        }
    
    }
    
    public function profil($username){
        $profil = $this->ModelSt->dohvatiProfil($username);
        $podaci = NULL;
        $data['controller'] = "Gost";
        $data['profil'] = $profil;
        $data['podaci'] = $podaci;
        $this->loadView($data, "profil.php");
               
    }
    
    public function preuzmi()
    {
        $this->load->helper('download');
        force_download("./portal/Funkcionalnosti portala.pdf", NULL);
    }
} 
