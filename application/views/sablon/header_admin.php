<html>
<head>
    <title>Startup</title>

	    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/styledov.css">
            
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
  <a href="<?php echo site_url('Admin/index');?>">Naslovna</a>
  <a href="<?php echo site_url('Admin/tipoviDiskusija');?>">Diskusije</a>
  <a href="<?php echo site_url('Admin/oglasi');?>">Oglasi</a>
  <a href="<?php echo site_url('Admin/vesti');?>">Vesti</a>
  <a href="<?php echo site_url('Admin/grupe');?>">Grupe</a>
  <div class="dropdown">
      <span><?php  echo "WELCOME ".$this->session->userdata('admin')->email; ?></span>
      <a href="<?php echo site_url('Admin/logout');?>">Logout</a>
  </div>
</div>