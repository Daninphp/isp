<section class="profile">
    <?php if(isset($poruka))
        echo "<h2>$poruka</h2>";
    ?>
    <div class="info">
        <div class="pic">
            <?php
            if ($podaciokorisniku->slika != "") {
                echo '<img id="profilPic" src=' .base_url($podaciokorisniku->slika) . ' alt="profil_slika">';
            }
            ?>
        </div>

        <div class="textInfo">
            <p class="txt">Username: <?php echo $podaciokorisniku->username; ?></p>
            <p class="txt">PIB: <?php echo $podaciokorisniku->pib; ?></p>
            <p class="txt">Telefon: <?php echo $podaciokorisniku->telefon; ?></p>
            <p class="txt">E-mail: <?php echo $podaciokorisniku->email; ?></p>
            <ul class="profSocial">
                <li><a class="linkoviKaMrezama" href="<?php echo $podaciokorisniku->facebook; ?>" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                <li><a class="linkoviKaMrezama" href="<?php echo $podaciokorisniku->twitter; ?>" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                <li><a class="linkoviKaMrezama" href="<?php echo $podaciokorisniku->linkedin; ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                <li><a class="linkoviKaMrezama" href="<?php echo $podaciokorisniku->website; ?>" target="_blank"><i class="fab fa-chrome"></i></a></li>
            </ul>
        </div>
        <div class="btns">
            <ul class="btnList">
                <?php if ($this->session->userdata('korisnikst')) { ?>
                    <li><a class="btn" href="<?php echo site_url("KorisnikSt/napraviGrupu"); ?>">Napravi grupu</a></li>
                    <?php
                }
                ?>
                <li><a class="btn" href="<?php echo site_url("KorisnikInv/arhiviraneDiskusije"); ?>">Vase arhivirane diskusije</a></li>
                <li><a class="btn" href="<?php echo site_url("KorisnikInv/izmeniProfil/" . $podaciokorisniku->id); ?>">Azuriraj profil</a></li>
            </ul>
        </div>

    </div>

    <div class="project">
        <p class="txtAbout"><?php echo $podaciokorisniku->predPro;?></p>
    </div>
    <?php
    // treba stilizovati ovaj upload deo
    if ($podaciokorisniku->slika == "") {
        echo '<div>
                    <form name="upload_photo" action=' . site_url('KorisnikInv/dodajSliku') . ' method="POST" enctype="multipart/form-data">
                        <input type="file" name="slika"/></br>
                        <input type="submit" value="Dodaj sliku"/>
                    </form>
            </div>';
    }
    ?>
</section>