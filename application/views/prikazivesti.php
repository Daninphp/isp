<div class="wrapper">
    <div class="discHeight">
        <div id="show-news">
            <h2><?php echo $vesti['naslov']; ?></h2>
            <div class="news-info">
                <span class="author">Invest startup portal</span> | "<?php echo $vesti['datum']; ?>" |
            </div>
            <?php if($vesti['slika']== NULL)
                echo ""; else { ?>
            <img src="<?php echo base_url($vesti['slika'])?>"/>
                <?php } ?>
            <p><?php echo $vesti['sadrzaj']; ?></p>
            <div class="autorInfo">
                <span class="author">
                    <?php if($vesti['autor_startup']!= NULL)
                        echo $vesti['autor_startup'];
                    elseif($vesti['autor_investitor']!= NULL)
                        echo $vesti['autor_investitor'];
                    ?>
                </span>
            </div>
        </div>

        <?php foreach ($odgovorNaVesti as $odgovorNaVest){ ?>
            <div id="comment">
                <div class="comment-info">
                    <a href="
                        <?php if($odgovorNaVest['korisnikst_username']!= NULL) {
                            echo site_url("$controller/profil/".$odgovorNaVest['korisnikst_username']);
                        } elseif($odgovorNaVest['korisnikinv_username']!= NULL) {
                            echo site_url("$controller/profil/" . $odgovorNaVest['korisnikinv_username']);
                        }?>
                    ">
                    <?php if($odgovorNaVest['korisnikst_username']== NULL)
                                echo $odgovorNaVest['korisnikinv_username'];
                            elseif($odgovorNaVest['korisnikinv_username']== NULL)
                                echo $odgovorNaVest['korisnikst_username'];
                        ?>
                    </a>
                    <span><?php echo $odgovorNaVest['datum'] ?></span>
                </div>
                <p><?php echo $odgovorNaVest['sadrzaj'] ?></p>
                 <?php if($this->session->userdata('admin')) { ?>
                    <a href="<?php echo site_url("Admin/obrisiOdgVest/".$odgovorNaVest['id']); ?>">Obrisi odgovor</a>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if($this->session->userdata('korisnikinv') || $this->session->userdata('korisnikst')) { ?>
            <div id="addComment">
                <form method="post" action="<?php echo site_url("$controller/odgovorNaVesti/".$vesti['id_vesti']);?>">
                    <div style="margin-bottom: 5px"><textarea width="300px" placeholder="Unesite odgovor" name="sadrzaj" required></textarea></div>
                    <div><input type="submit" name="postavi_odgovor" value="Postavi odgovor" class="newsBtn" /></div>
                </form>
            </div>
        <?php } ?>

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
    </div>
</div>