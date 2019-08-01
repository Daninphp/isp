<div class="wrapper">
    <div class="oglas">
        <?php foreach ($oglasi as $oglas) { ?>
            <div class="card">
                <div class="cardInfo">
                    <h2 id="cardName"><a href="<?php echo site_url("$controller/prikaziOglas/".$oglas['id']); ?>"><?php echo $oglas['naslov']?></a></h2>
                    <p id="cardDate">26.07.2017</p>
                </div>
                <img src="<?php echo base_url($oglas['slika']); ?>" alt="User Picture" id="userPic">
                <span id="cardUsername"><a href="<?php echo site_url("$controller/profil/".$oglas['inv_username']); ?>"><?php echo $oglas['inv_username']?></a></span>

                <?php if($this->session->userdata('admin')) { ?>
                    <a style="margin-left: 10px; color: #000;" href="<?php echo site_url("Admin/obrisiOglas/".$oglas['id']); ?>">Obrisi oglas</a>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if($this->session->userdata('korisnikinv')) { ?>
            <a href="<?php echo site_url("KorisnikInv/napraviOglas"); ?>">Dodaj novi oglas</a>
        <?php } ?>
    </div>
</div>


