<div class="wrapper">
<form action="<?php echo site_url("Gost/registerstartup");?>" name="forma" method="post" id="formStart">

	<h2 id="formHeading">Start-up registracija</h2>
    <div class="leftForm" style="float: left; width: 50%">
        <div class="formWrapper">
            <input id="pravno"  type="text" name="username"  class="polje"/>
            <label for="pravno" class="row">Username</label>
        </div>
        <div class="formWrapper">
            <input id="password"  type="password" name="password"  class="polje"/>
            <label for="password" class="row">Password</label>
        </div>
        <div class="formWrapper">
            <input id="confirm_password"  type="password" name="password"  class="polje"/>
            <span id='message'></span>
            <label for="confirm_password" class="row">Confirm password</label>
        </div>
        <div class="formWrapper">
            <input id="ime" type="text" name="ime"  class="polje"/>
            <label for="ime" class="row">Ime</label>
        </div>
        <div class="formWrapper">
            <input id="prezime" type="text" name="prezime"  class="polje"/>
            <label for="prezime" class="row">Prezime</label>
        </div>
        <div class="formWrapper">
            <input id="pravno"  type="text" name="pravnoLice"  class="polje"/>
            <label for="pravno" class="row">Naziv pravnog lica</label>
        </div>
        <div class="formWrapper wrap-date">
            <input id="datum" type="date" name="datumOsn"  class="polje"/>
            <label for="datum" class="row">Datum osnivanja</label>
        </div>
        <div class="formWrapper">
            <input id="broj" type="number" name="brReg"  class="polje"/>
            <label for="broj" class="row">Broj registracije</label>
        </div>
        <div class="formWrapper">
            <input id="pib" type="number" name="pib"  class="polje"/>
            <label for="pib" class="row">PIB</label>
        </div>
        <div class="formWrapper">
            <input id="srz" type="text" name="srednjeImeZZ"  class="polje"/>
            <label for="srz" class="row">Srednje ime zakonskog zastupnika</label>
        </div>
        <div class="formWrapper">
            <input id="adresa" type="text" name="adresa"  class="polje"/>
            <label for="adresa" class="row">Adresa</label>
        </div>
        <div class="formWrapper">
            <input id="opstina" type="text" name="opstina"  class="polje"/>
            <label for="opstina" class="row">Opstina</label>
        </div>
        <div class="formWrapper">
            <!--<input id="grad" type="text" name="grad"  class="polje"/>-->
            <select id="grad" name="grad"  class="polje">

                <?php foreach($gradovi as $grad) { ?>

                <option value="<?php echo $grad['ime']?>"><?php echo $grad['ime']?></option>

                <?php } ?>

            </select>
            <label for="grad" class="row">Grad</label>
        </div>
        <div class="formWrapper">
            <!--<input id="zemlja" type="text" name="zemlja"  class="polje"/>-->
            <select id="zemlja" name="zemlja"  class="polje">

                <?php foreach($zemlje as $zemlja) { ?>

                    <option value="<?php echo $zemlja['ime']?>"><?php echo $zemlja['ime']?></option>

                <?php } ?>

            </select>
            <label for="zemlja" class="row">Zemlja</label>
        </div>
        <div class="formWrapper">
            <input id="telefon" type="tel" name="tel"  class="polje"/>
            <label for="telefon" class="row">Kontakt telefon</label>
        </div>
    </div>
    <div class="rightForm" style="float: right; width: 50%">
        <div class="formWrapper">
            <input id="mail" type="text" name="email"  class="polje"/>
            <label for="mail" class="row">Email</label>
        </div>
        <div class="formWrapper">
            <!--<input id="poslo" type="text" name="oblPos"  class="polje"/>-->
            <select id="poslo" name="oblPos"  class="polje">

                <?php foreach($oblasti as $oblast) { ?>

                    <option value="<?php echo $oblast['ime']?>"><?php echo $oblast['ime']?></option>

                <?php } ?>

            </select>
            <label for="poslo" class="row">Oblasti poslovanja</label>
        </div>
        <div class="formWrapper">
            <input id="brzap" type="number" name="brZaposlenih"  class="polje"/>
            <label for="brzap" class="row">Broj zaposlenih</label>
        </div>
        <div class="formWrapper">
            <input id="prihod" type="text" name="prihod"  class="polje"/>
            <label for="prihod" class="row">Prihodi u poslednje tri godine</label>
        </div>
        <div class="formWrapper">
            <input id="profit" type="text" name="profit"  class="polje"/>
            <label for="profit" class="row">Profit u poslednje tri godine</label>
        </div>
        <div class="formWrapper">
            <textarea id="area" name="posao" cols="50" rows="6"  class="textarea"></textarea>
            <label for="area">Predlog projekta</label>
        </div>
        <div class="formWrapper">
            <input id="triznos" type="number" name="iznos"  class="polje"/>
            <label for="triznos" class="row">Trazeni iznos</label>
        </div>
        <div class="formWrapper">
            <input id="svojina" type="text" name="statIntS"  class="polje"/>
            <label for="svojina" class="row">Status intelektualne svojine</label>
        </div>
        <div class="formWrapper">
            <input id="pat" type="text" name="patent"  class="polje"/>
            <label for="pat" class="row">Podaci o patentu</label>
        </div>
        <div class="formWrapper">
            <input id="fb" type="text" name="facebook"  class="polje"/>
            <label for="fb" class="row"><i class="fab fa-facebook-square"></i> Vasa Facebook stranica</label>
        </div>
        <div class="formWrapper">
            <input id="twit" type="text" name="twitter"  class="polje"/>
            <label for="twit" class="row"><i class="fab fa-twitter-square"></i> Vas Twitter nalog</label>
        </div>
        <div class="formWrapper">
            <input id="linked" type="text" name="linkedin"  class="polje"/>
            <label for="linked" class="row"><i class="fab fa-linkedin"></i> Vas Linkedin nalog</label>
        </div>
        <div class="formWrapper">
            <input id="web" type="text" name="website"  class="polje"/>
            <label for="web" class="row"><i class="fab fa-chrome"></i> Vas website</label>
        </div></br>
        <div class="formWrapper">
            <label for="prof" class="row">Da li zelite da Vas profil bude javan?</label></br>
            <input id="prof" type="checkbox" name="javni" value="da" checked/>
        </div>
    </div>
    <div class="btnRegistration">
        <input type="submit" name="promenaProfila" value="Registruj" class="submitForm"/>
    </div>
</form>
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

    <script>
        $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Ista sifra!').css('color', 'green');
            } else
                $('#message').html('Nije ista sifra!').css('color', 'red');
        });
    </script>
</div>