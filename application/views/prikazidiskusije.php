<div class="wrapper">
    <div class="discHeight" style="margin: 20px 0;">
        <ul class="forumList">
            <li style=" border: 2px solid black;">
                <div class="forumHead">
                    <span><?php  echo $diskusija['datum'];?></span>
                </div>
                <div class="forumComment" style="height: 350px;">
                    <div class="forumProfile" style="height: 350px;">
                        <a href="
                            <?php if($diskusija['korisnikst_username']!= NULL) {
                                echo site_url("$controller/profil/".$diskusija['korisnikst_username']);
                            } elseif($diskusija['korisnikinv_username']!= NULL) {
                                echo site_url("$controller/profil/" . $diskusija['korisnikinv_username']);
                            }?>
                        ">
                            <?php if($diskusija['korisnikst_username']!= NULL)
                                    echo $diskusija['korisnikst_username'];
                                elseif($diskusija['korisnikinv_username']!= NULL)
                                    echo $diskusija['korisnikinv_username']; ?>
                        </a>
                        <img src="
                        <?php if($diskusija['slika_st']!= NULL)
                            echo base_url($diskusija['slika_st']);
                        elseif($diskusija['slika_inv']!= NULL)
                            echo base_url($diskusija['slika_inv']); ?>
                        "/>
                    </div>
                    <div class="forumRight" style="height: 350px;">
                        <h2><?php echo $diskusija['naslov']; ?></h2>
                        <p><?php echo $diskusija['sadrzaj']; ?></p>
                    </div>
                </div>
                <div class="forumBot">

                </div>
            </li>
        </ul>
    </div>
    <!-- Kraj originalne diskusije -->
    <div style="margin-bottom: 20px;">
        <ul class="forumList">
        <?php foreach ($odgovorNaDiskusije as $odgovorNaDiskusiju) {  ?>
            <li>
                <div class="forumHead">
                    <span><?php echo $odgovorNaDiskusiju['datum'] ?></span>
                </div>
                <div class="forumComment">
                    <div class="forumProfile">
                        <a href="
                            <?php if($odgovorNaDiskusiju['korisnikst_username']!= NULL) {
                                echo site_url("$controller/profil/".$odgovorNaDiskusiju['korisnikst_username']);
                            } elseif($odgovorNaDiskusiju['korisnikinv_username']!= NULL) {
                                echo site_url("$controller/profil/" . $odgovorNaDiskusiju['korisnikinv_username']);
                            }?>
                        ">
                            <?php if($odgovorNaDiskusiju['korisnikst_username']== NULL)
                                echo $odgovorNaDiskusiju['korisnikinv_username'];
                            elseif($odgovorNaDiskusiju['korisnikinv_username']== NULL)
                                echo $odgovorNaDiskusiju['korisnikst_username'];
                            ?>
                        </a>
                        <img src="
                             <?php if($odgovorNaDiskusiju['slika_st']!= NULL)
                                echo base_url($odgovorNaDiskusiju['slika_st']);
                            elseif($odgovorNaDiskusiju['slika_inv']!= NULL)
                                echo base_url($odgovorNaDiskusiju['slika_inv']); ?>
                        "/>
                    </div>
                    <div class="forumRight">
                        <p><?php echo $odgovorNaDiskusiju['sadrzaj'] ?></p>
                    </div>
                </div>
                <div class="forumBot">
                </div>
            </li>
        <?php } ?>
        </ul>
        <?php if($diskusija['arhiv'] == 2){
            echo "";
        } elseif ($this->session->userdata('korisnikinv') || $this->session->userdata('korisnikst')) { ?>

            <form method="post" action="<?php echo site_url("$controller/dodajOdgovor/".$diskusija['id']);?>">
                    <textarea rows="7" cols="55"  name="sadrzaj" required></textarea></br>
                    <input type="submit" name="postavi_odgovor" value="Postavi odgovor" class="addAnswer" />
            </form>

        <?php  }  ?>

        <?php if(count($ukupanBrOdgovora) > 2)
                echo '<div id="paginacija">'.$links.' </div>';
            else
                echo '';
        ?>

    </div>




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