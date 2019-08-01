<div class="wrapper">
    <?php if($this->session->userdata('korisnikinv')->id == $profil['id']) { ?>
    <form action="<?php echo site_url("KorisnikInv/menjajProfil/".$profil['id']);?>" name="forma" method="post" id="formStart">
        <h2 id="formHeading">Popunite formu!</h2>
        <div class="leftForm" style="float: left; width: 50%">
            <div class="formWrapper">
                <input id="pravno"  type="text" name="password" value="<?php echo  $profil['password'] ?>" class="polje"/>
                <label for="pravno" class="row">Password</label>
            </div>
            <div class="formWrapper">
                <input id="pravno"  type="text" name="pravnoLice" value="<?php echo  $profil['nazplica'] ?>" class="polje"/>
                <label for="pravno" class="row">Naziv pravnog lica</label>
            </div>
            <div class="formWrapper">
                <input id="broj" type="number" name="brReg" value="<?php echo  $profil['brregistracije'] ?>" class="polje"/>
                <label for="broj" class="row">Broj registracije</label>
            </div>
            <div class="formWrapper">
                <input id="pib" type="number" name="pib" value="<?php echo  $profil['pib'] ?>" class="polje"/>
                <label for="pib" class="row">PIB</label>
            </div>
            <div class="formWrapper">
                <input id="ime" type="text" name="ime" value="<?php echo  $profil['ime'] ?>" class="polje"/>
                <label for="ime" class="row">Ime</label>
            </div>
            <div class="formWrapper">
                <input id="prezime" type="text" name="prezime" value="<?php echo  $profil['prezime'] ?>" class="polje"/>
                <label for="prezime" class="row">Prezime</label>
            </div>
            <div class="formWrapper">
                <input id="srz" type="text" name="srednjeImeZZ" value="<?php echo  $profil['srimezakpre'] ?>" class="polje"/>
                <label for="srz" class="row">Srednje ime zakonskog zastupnika</label>
            </div>
            <div class="formWrapper">
                <input id="adresa" type="text" name="adresa" value="<?php echo  $profil['adresa'] ?>" class="polje"/>
                <label for="adresa" class="row">Adresa</label>
            </div>
            <div class="formWrapper">
                <!--<input id="grad" type="text" name="grad"  class="polje"/>-->
                <select id="grad" name="grad"  class="polje">

                    <option class="selected" value="<?php echo  $profil['grad'] ?>"><?php echo  $profil['grad'] ?></option>

                    <?php foreach($gradovi as $grad) { ?>

                        <option value="<?php echo $grad['ime']?>"><?php echo $grad['ime']?></option>

                    <?php } ?>

                </select>
                <label for="grad" class="row">Grad</label>
            </div>
            <div class="formWrapper">
                <!--<input id="zemlja" type="text" name="zemlja"  class="polje"/>-->
                <select id="zemlja" name="zemlja"  class="polje">

                    <option class="selected" value="<?php echo  $profil['zemlja'] ?>"><?php echo  $profil['zemlja'] ?></option>

                    <?php foreach($zemlje as $zemlja) { ?>

                        <option value="<?php echo $zemlja['ime']?>"><?php echo $zemlja['ime']?></option>

                    <?php } ?>

                </select>
                <label for="zemlja" class="row">Zemlja</label>
            </div>
            <div class="formWrapper">
                <input id="opstina" type="text" name="opstina" value="<?php echo  $profil['opstina'] ?>" class="polje"/>
                <label for="opstina" class="row">Opstina</label>
            </div>
            <div class="formWrapper">
                <input id="telefon" type="tel" name="tel" value="<?php echo  $profil['ktelefon'] ?>" class="polje"/>
                <label for="telefon" class="row">Kontakt telefon</label>
            </div>
            <div class="formWrapper">
                <input id="mail" type="text" name="email" value="<?php echo  $profil['email'] ?>" class="polje"/>
                <label for="mail" class="row">Email</label>
            </div>
        </div>
        <div class="leftForm" style="float: right; width: 50%">
            <div class="formWrapper">
                <!--<input id="poslo" type="text" name="oblPos"  class="polje"/>-->
                <select id="poslo" name="oblPos"  class="polje">

                    <option class="selected" value="<?php echo  $profil['oposlovanja'] ?>"><?php echo  $profil['oposlovanja'] ?></option>

                    <?php foreach($oblasti as $oblast) { ?>

                        <option value="<?php echo $oblast['ime']?>"><?php echo $oblast['ime']?></option>

                    <?php } ?>

                </select>
                <label for="poslo" class="row">Oblasti poslovanja</label>
            </div>
            <div class="formWrapper">
                <input id="brzap" type="number" name="brZaposlenih" value="<?php echo  $profil['brzaposlenih'] ?>" class="polje"/>
                <label for="brzap" class="row">Broj zaposlenih</label>
            </div>
            <div class="formWrapper">
                <input id="prihod" type="text" name="prihod" value="<?php echo  $profil['prihod'] ?>" class="polje"/>
                <label for="prihod" class="row">Prihodi u poslednje tri godine</label>
            </div>
            <div class="formWrapper">
                <input id="profit" type="text" name="profit" value="<?php echo  $profil['profit'] ?>" class="polje"/>
                <label for="profit" class="row">Profit u poslednje tri godine</label>
            </div>
            <div class="formWrapper">
                <textarea id="area" name="tipInv" cols="50" rows="6" class="textarea"><?php echo  $profil['posao'] ?></textarea>
                <label for="area">Tip investicija</label>
            </div>
            <div class="formWrapper">
                <input id="usluga" type="text" name="vrUsluga" value="<?php echo  $profil['vrusluga'] ?>" class="polje"/>
                <label for="usluga" class="row">Vrste usluge</label>
            </div>
            <div class="formWrapper">
                <input id="opseg" type="number" name="inviznos" value="<?php echo  $profil['inviznos'] ?>" class="polje"/>
                <label for="opseg" class="row">Iznos koji zelite da investirate</label>
            </div>
            <div class="formWrapper">
                <input id="fb" type="text" name="facebook" value="<?php echo  $profil['facebook'] ?>" class="polje"/>
                <label for="fb" class="row"><i class="fab fa-facebook-square"></i> Vasa Facebook stranica</label>
            </div>
            <div class="formWrapper">
                <input id="twit" type="text" name="twitter" value="<?php echo  $profil['twitter'] ?>" class="polje"/>
                <label for="twit" class="row"><i class="fab fa-twitter-square"></i> Vas Twitter nalog</label>
            </div>
            <div class="formWrapper">
                <input id="linked" type="text" name="linkedin" value="<?php echo  $profil['linkedin'] ?>" class="polje"/>
                <label for="linked" class="row"><i class="fab fa-linkedin"></i> Vas Linkedin nalog</label>
            </div>
            <div class="formWrapper">
                <input id="web" type="text" name="website" value="<?php echo  $profil['website'] ?>" class="polje"/>
                <label for="web" class="row"><i class="fab fa-chrome"></i> Vas website</label>
            </div>
            <div class="formWrapper">
                <label for="prof" class="row">Da li zelite da Vas profil bude javan?</label></br>
                <input id="prof" type="checkbox" name="javni" value="da" checked/>
            </div>
        </div>
        <div class="btn">
            <input type="submit" name="promenaProfila" value="Promeni" class="submitForm"/>
        </div>
    </form>
    <?php } else {
        redirect("$controller/izmeniProfil/".$this->session->userdata('korisnikinv')->id);
    } ?>
</div>