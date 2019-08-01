<html>
<head>
    <title>ISP</title>

	    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/styledov.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
            
<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function goBack() {
    window.history.back();
}
</script>
</head>
<body>
<div id="wrapper">
<header>
<div><img id="logo" src="<?php echo base_url() ?>assets/img/logo.png"/></div>
<h1>ISP</h1> 


</header>
<div class="navbar">
  <a href="<?php echo site_url('KorisnikInv/index');?>">Naslovna</a>
  <a href="<?php echo site_url('KorisnikInv/tipoviDiskusija');?>">Diskusije</a>
  <a href="<?php echo site_url('KorisnikInv/oglasi');?>">Oglasi</a>
  <a href="<?php echo site_url('KorisnikInv/vesti');?>">Vesti</a>
  <div class="dropdown">
      <span><?php  echo "WELCOME ".$this->session->userdata('korisnikinv')->username; ?></span>
      <a href="<?php echo site_url('KorisnikInv/logout');?>">Logout</a>
  </div>
</div>