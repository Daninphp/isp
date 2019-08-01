<div class="wrapper">
    <div style="min-height: 500px;">
        <div class="group">
            <div id="form">
                <form method="get" action="<?php echo site_url("$controller/$metoda");?>" style="display: inline-block;">
                    <div id="search">

                        <div class="formWrapperGroupSearch">

                            <select id="grad" name="city"  class="polje">

                                <option value="">Svi</option>

                                <?php foreach($gradovi as $grad) { ?>

                                    <option value="<?php echo $grad['ime']?>"><?php echo $grad['ime']?></option>

                                <?php } ?>

                            </select>
                            <label for="grad" class="row">Ciljan grad</label>
                        </div>

                        <div class="formWrapperGroupSearch">

                            <select id="zemlja" name="country"  class="polje">

                                <option value="">Sve</option>

                                <?php foreach($zemlje as $zemlja) { ?>

                                    <option value="<?php echo $zemlja['ime']?>"><?php echo $zemlja['ime']?></option>

                                <?php } ?>

                            </select>
                            <label for="zemlja" class="row">Ciljana zemlja</label>
                        </div>

                        <div class="formWrapperGroupSearch">

                            <select id="poslo" name="areaofexpertize"  class="polje">

                                <option value="">Sve</option>

                                <?php foreach($oblasti as $oblast) { ?>

                                    <option value="<?php echo $oblast['ime']?>"><?php echo $oblast['ime']?></option>

                                <?php } ?>

                            </select>
                            <label for="poslo" class="row">Oblasti poslovanja</label>
                        </div>
                    </div>

                    <div class="formWrapperGroupSearchLast">
                        <input class="poljeSearch" type="text" name="searchGroup" placeholder="Pretrazi grupe" />
                    </div>

                    <input type="submit" class="poljeForma" value=" Trazi ">

                </form>
            </div>

        <?php if ($this->session->userdata('korisnikst')) { ?>
            <div class="newGroup">
                <button>
                    <a href="<?php echo site_url("KorisnikSt/napraviGrupu"); ?>">Napravi novu grupu</a>
                </button>
            </div>

            <div class="showMore">
                <button class="advanced" onclick="pretraga()">Napredna pretraga</button>
            </div>

            <?php } ?>

        </div>

    <?php if($grupe == NULL) echo "<h2>Nema nijedne grupe pod tim imenom!</h2>";
    else { foreach ($grupe as $grupa) { ?>

        <div id="group">
            <a href="<?php echo site_url("$controller/prikaziGrupu/" . $grupa['id']); ?>">
                <div class="groupImg">
                    <img id="slika" src="<?php echo base_url("assets/img/groups.jpg") ?>" alt="Group Image">
                </div>
                <div class="groupName">
                    <h3><?php echo $grupa['ime']; ?></h3>
                </div>
            </a>
        </div>

    <?php } } ?>
<?php //echo $links; ?>
    </div>
</div>


<script>
    function pretraga() {
        var x = document.getElementById("search");
        if (x.style.display === "block") {
            x.style.display = "none"
        } else {
            x.style.display = "block";
        }
    }
</script>