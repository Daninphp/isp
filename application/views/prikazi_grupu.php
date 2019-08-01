<div class="wrapper">
    <div id="groupBody">
        <div id="groupBodyLeft">
            <h2>
                <?php echo $grupa['ime'];
                    $ime = $grupa['ime']; ?>
            </h2>
                <p><?php echo $grupa['opis']?></p>
            <div class="button">
                <?php if($uslov == 0) {
                    echo ""; } else { ?>
                <button><a href="<?php echo site_url("KorisnikSt/obrisiClanove/" . $grupa['id']); ?>">Izadji iz grupe</a></button>
                <?php } ?>
                <button onclick='goBack()'>Povratak nazad</button>
            </div>
        </div>
        <div class="groupBodyCenter">
            <?php if(isset($poruka)) echo "<h2>".$poruka."</h2>"?>
            <?php if($this->session->userdata('korisnikinv')) {
                echo "<h3>Nemate pristup opstim diskusijama ove grupe!</h3>";
            } elseif( $uslov == 0 && $grupa['osnivac'] != $korisnik->username ) { ?>

                <h3>Niste clan grupe, ne mozete ucestvovati u disksijama!</h3>
                <div class="naslov">
                    <button><a href="<?php echo site_url("KorisnikSt/uclaniSe/" . $grupa['id']); ?>">Uclani se!</a></button>
                </div>

            <ul>
                <?php  } else {  foreach($teme as $tema) { ?>
                    <li style="list-style: none">
                        <div class="groupPost">
                            <div class="topAnswer">
                                <div class="groupPostImg">
                                    <img src="<?php echo base_url($tema['slika_st'])?>"/>
                                </div>
                                <div class="topInfo">
                                    <a href="<?php echo site_url("$controller/profil/".$tema['clan_username']); ?>">
                                        <?php echo $tema['clan_username']?>
                                    </a>
                                    <span class="timeStamp">
                                        <?php echo $tema['datum']?>.
                                    </span>
                                </div>
                            </div>
                            <div class="groupAnswer">
                                <p><?php echo $tema['sadrzaj']?></p>

                                <?php if($this->session->userdata('admin')) { ?>
                                    <a href="<?php echo site_url("Admin/obrisiOdgovor/".$grupa['grupe_id'])?>">
                                        Obrisi odgovor
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </li>
                    <?php } ?>

                    <form method="post" action="<?php echo site_url("$controller/dodajTeme/".$grupa['id']);?>">

                            <textarea rows="4" cols="50"  id="textareaOdg" placeholder="Unesite temu" name="sadrzaj" required></textarea>
                            <input type="submit" name="postavi_odgovor" value="Postavite temu" class="btn" />
                    </form>

                <?php } ?>
            </ul>
        </div>
        <div class="groupBodyRight">
            <div id="clanovi">
                <form name="form">
                    <p>Clanovi: </p>
                    <select name="filter" onchange="parent.document.location.href=document.form.filter[document.form.filter.selectedIndex].value">

                        <option value="<?php echo site_url("$controller/prikaziGrupu/" . $grupa['id']); ?>">Svi clanovi</option>

                        <?php foreach($clanovi as $korisnik) { ?>

                            <option value="<?php echo site_url("$controller/profil/".$korisnik['clan'])?>"><?php echo "&nbsp".$korisnik['clan']." &nbsp" ?></option>

                        <?php } ?>
                    </select>
                </form>
            </div>

            <?php if($this->session->userdata('korisnikinv')) { ?>

                <button class="email"><a href="<?php echo site_url("$controller/mailStranica/" . $grupa['id']."?ime= $ime"); ?>">Posaljite email clanovima grupe</a></button>

            <?php } else ""; ?>

        </div>
    </div>
</div>