<div class="wrapper">
    <div class="discHeight">
         <ul class="forumList">
             <?php foreach ($diskusije as $diskusija) { ?>
             <li>
                 <div id="forum">
                     <div class="forumImg diskusijaImg">
                         <img src="<?php echo base_url(); ?>assets/img/diskusija.png" alt="forum_img"/>
                     </div>
                     <div class="forumContent diskusijaContent">
                         <a href="<?php echo site_url("$controller/prikaziDiskusiju/".$diskusija['id']); ?>">
                         <?php echo $diskusija['naslov']?></a><br>

                         <?php if($diskusija['korisnikst_username']!= NULL) { ?>
                                 <a href="<?php echo site_url("$controller/profil/".$diskusija['korisnikst_username']); ?>">
                                 <?php echo $diskusija['korisnikst_username']?></a>

                             <?php } elseif($diskusija['korisnikinv_username']!= NULL) { ?>
                                 <a href="<?php echo site_url("$controller/profil/".$diskusija['korisnikinv_username']); ?>">
                                 <?php echo $diskusija['korisnikinv_username']?></a>
                             <?php }  ?>

                         | <span><?php echo $diskusija['datum']; ?></span> |
                         <?php if($diskusija['arhiv'] == 2) { ?>
                            </br><a href="<?php echo site_url("Admin/arhiviraneDiskusije"); ?>">Arhivirana Diskusija!</a>
                        <?php }?>
                     </div>
                     <div class="answer">
                         <span>[ <b> <?php echo $threads[$diskusija['id']] ?> </b>
                             <?php if ($threads[$diskusija['id']] == 1) {
                                 echo ' odgovor';
                             }elseif (($threads[$diskusija['id']] > 1) || ($threads[$diskusija['id']] == 0)) {
                                 echo ' odgovora';
                             }?> ]
                         </span>
                     </div>
                     <div class="answer">
                     <?php if(!$this->session->userdata('korisnikinv') && !$this->session->userdata('korisnikst')) {
                             echo "";
                     } elseif ($podaciokorisniku->username == $diskusija['korisnikst_username'] && $this->session->userdata('korisnikst') || $podaciokorisniku->username == $diskusija['korisnikinv_username'] && $this->session->userdata('korisnikinv')) { ?>

                         <a href="<?php echo site_url("$controller/arhivirajDiskusiju/".$diskusija['id']."?tip=$tip"); ?>">Arhiviraj diskusiju !</a>

                     <?php } ?>
                     <?php if($this->session->userdata('admin')) { ?>
                         <a href="<?php echo site_url("Admin/obrisiDiskusiju/".$diskusija['id']); ?>">Obrisi diskusiju!</a>
                     <?php } ?>
                     </div>
                 </div>
             </li>
             <?php } ?>
         </ul>

        <?php if(count($diskusije) > 3)  { ?>
         <div id="paginacija">
             <?php echo $links; ?>
         </div>
        <?php } else
            echo "";
        ?>
         <div class="addDisc">
             <?php if($this->session->userdata('korisnikinv') || $this->session->userdata('korisnikst')) { ?>
                <a href="<?php echo site_url("$controller/dodajDiskusiju/".$tip)?>">Dodajte novu diskusiju!</a>
             <?php } ?>
         </div>

        <!-- Login pocetak -->

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

    <!-- Login kraj -->
    </div>
</div>