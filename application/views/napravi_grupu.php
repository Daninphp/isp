<div class="wrapper">
    <center>
    <div  id="addGroup">
        <form method="post" action="<?php echo site_url("KorisnikSt/dodavanjeGrupa");?>">

            <h3>Ime grupe</h3><br>
            <input type="text" name="ime" required/><br><br>

            <div class="formWrapper">
                <!--<input id="grad" type="text" name="grad"  class="polje"/>-->
                <select id="grad" name="grad"  class="polje">

                    <option value="">Svi</option>

                    <?php foreach($gradovi as $grad) { ?>

                        <option value="<?php echo $grad['ime']?>"><?php echo $grad['ime']?></option>

                    <?php } ?>

                </select>
                <label for="grad" class="row">Ciljan grad</label>
            </div>

            <div class="formWrapper">
                <!--<input id="zemlja" type="text" name="zemlja"  class="polje"/>-->
                <select id="zemlja" name="zemlja"  class="polje">

                        <option value="">Sve</option>

                    <?php foreach($zemlje as $zemlja) { ?>

                        <option value="<?php echo $zemlja['ime']?>"><?php echo $zemlja['ime']?></option>

                    <?php } ?>

                </select>
                <label for="zemlja" class="row">Ciljana zemlja</label>
            </div>

            <div class="formWrapper">
                <!--<input id="poslo" type="text" name="oblPos"  class="polje"/>-->
                <select id="poslo" name="oblPos"  class="polje">

                    <option value="">Sve</option>

                    <?php foreach($oblasti as $oblast) { ?>

                        <option value="<?php echo $oblast['ime']?>"><?php echo $oblast['ime']?></option>

                    <?php } ?>

                </select>
                <label for="poslo" class="row">Oblasti poslovanja</label>
            </div>
            <h3>Opis grupe:</h3><br>
            <textarea name="opis" required style="margin: 0; width: 507px;
    height: 216px;"></textarea><br></br>

            <input type="submit" name="napravi grupu" value="Napravi grupu" class="btnDodaj" />
        </form>
    </div>
    </center>
</div>