<section class="profile">
    <?php if(isset($poruka))
        echo "<h2>$poruka</h2>";
    ?>

    <?php if ($this->session->userdata('korisnikst')== NULL && $this->session->userdata('korisnikinv') == NULL)
            echo "Morate se ulogovati da bi videli profil!";

    else if($profil['javni']== "da" || $podaci->username == $profil['username']){?>
    <div class="info">
        <div class="pic">
            <img id="profilPic" src="<?php echo base_url($profil['slika']); ?>" alt="profilna slika"/>
        </div>

        <div class="textInfo">
            <p class="txt">Username: <?php echo $profil['username']; ?></p>
            <p class="txt">PIB: <?php echo $profil['pib']; ?></p>
            <p class="txt">Telefon: <?php echo $profil['ktelefon']; ?></p>
            <p class="txt">E-mail: <?php echo $profil['email']; ?></p>
            <ul class="profSocial">
                <li><a class="linkoviKaMrezama" href="<?php echo $profil['facebook']; ?>" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                <li><a class="linkoviKaMrezama" href="<?php echo $profil['twitter']; ?>" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                <li><a class="linkoviKaMrezama" href="<?php echo $profil['linkedin']; ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                <li><a class="linkoviKaMrezama" href="<?php echo $profil['website']; ?>" target="_blank"><i class="fab fa-chrome"></i></a></li>
            </ul>
        </div>
        </div>

    </div>

    <div class="project">
        <p class="txtAbout"><?php echo $profil['posao']; ?></p>
    </div>
    <?php } else {
        echo "</br></br><b>Privatan profil!</b></br></br>";
        echo "<button onclick='goBack()'>Povratak nazad</button>";
    }?>
</section>
<div id="modal-wrapper" class="modal">

    <form class="modal-content animate" action="<?php echo site_url('Gost/ulogujst');?>" method="POST">

        <div class="imgcontainer">
            <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
            <img src="<?php echo base_url()?>assets/img/buiss.png" alt="Avatar" class="avatar">
            <h2 style="text-align:center">Login startup</h2>
        </div>

        <div class="container">
            <?php if(isset($poruka)) echo "<font color='red'>$poruka</font><br>";?>
            <input type="text" placeholder="Enter Username" name="username" value="<?php echo set_value('username');?>">
            <?php echo form_error("username","<font color='red'>","</font>"); ?>
            <input type="password" placeholder="Enter Password" name="password">
            <?php echo form_error("password","<font color='red'>","</font>"); ?><br>
            <button type="submit">Login</button>
        </div>

    </form>

</div>
<div id="modal-wrapper2" class="modal">

    <form class="modal-content animate" action="<?php echo site_url('Gost/ulogujin');?>" method="POST">

        <div class="imgcontainer">
            <span onclick="document.getElementById('modal-wrapper2').style.display='none'" class="close" title="Close PopUp">&times;</span>
            <img src="<?php echo base_url()?>assets/img/buiss.png" alt="Avatar" class="avatar">
            <h2 style="text-align:center">Login investitor</h2>
        </div>

        <div class="container">
            <?php if(isset($poruka)) echo "<font color='red'>$poruka</font><br>";?>
            <input type="text" placeholder="Enter Username" name="username" value="<?php echo set_value('username');?>">
            <?php echo form_error("username","<font color='red'>","</font>"); ?>
            <input type="password" placeholder="Enter Password" name="password">
            <?php echo form_error("password","<font color='red'>","</font>"); ?><br>
            <button type="submit">Login</button>
        </div>

    </form>

</div>