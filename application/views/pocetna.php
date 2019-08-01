<section class="hero">
    <div class="wrapper">
        <div class="welcomeText">

            <h1>Wellcome - Dobrodosli u ISP</h1>

            <p>Ovo je portal namenjen spajanju investitora i startup-ova. Ovde ce ici jos neki tekst o ovom sajtu. Donirajte i spasite mlade naucnike. Zastitomo prirodu.</p>
        </div>
        <div class="rightText">
            <img src="<?php echo base_url() ?>assets/img/gif.gif" alt="Gif"/>
        </div>
    </div>
</section>
<section class="content">
    <div class="wrapper">
        <div id="news">
            <div class="slideshow-container">
            <?php foreach($poslednjevesti as $poslednjavest) { ?>
                <div class="mySlides fade">
                    <img src="
                            <?php if (($poslednjavest['slika'] == ""))
                                    echo  base_url("assets/img/news.jpg");
                                 else
                                     echo base_url($poslednjavest['slika']) ?>
                             " style="width:100%">
                    <div class="text"><a href="<?php echo site_url("Gost/prikaziVest/".$poslednjavest['id_vesti']) ?>"><?php echo $poslednjavest['naslov']?></a></div>
                </div>
                
            <?php } ?>
                
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
        </div>
         <div id="discussions">
                <div id="slideshow-main">
                    <ul>
                        <a href="#">
                            <li class="1 active">
                                <a href="<?php echo site_url('Gost/tipoviDiskusija') ?>">
                                    <p>Internet startup portal je mesto na kome se mogu pronaci svi investitori i startap-ovi iz svih polja i zanimanja.</br></br> Na stranici "Diskusije"
                                        mozete pronaci sve diskusije koje su otvorene javnosti! </br></br> Za ostale diskusije molimo Vas registrujte se!</p>
                                        <span class="opacity"></span>
                                        <!--<a href="<?php site_url("Gost/prikaziDiskusiju/".$poslednjadiskusija['id'])?>"><?php echo $poslednjadiskusija['naslov'] ?></a> -->
                                        <span class="content">
                                            <h3>Dobro dosli!</h3>
                                        </span><span class="contentRight"><p>Vise informacija na stranici "Diskusije".</p></span>
                                </a>
                            </li>
                        </a>
                    <?php foreach ($poslednjediskusije as $poslednjadiskusija) { ?>
                        <a href="<?php echo site_url('Gost/prikaziDiskusiju/'.$poslednjadiskusija['id']) ?>">
                            <li class="<?php echo $poslednjadiskusija['id'] ?>">
                                    <div class="slideShowContent">
                                        <p><?php echo $poslednjadiskusija['sadrzaj'] ?></p>
                                    </div>
                            </li>
                                    <span class="opacity"></span>
                                    <!--<a href="<?php site_url("Gost/prikaziDiskusiju/".$poslednjadiskusija['id'])?>"><?php echo $poslednjadiskusija['naslov'] ?></a> -->
                                    <span class="content">
                                        <h3><?php if($poslednjadiskusija['korisnikst_username']== NULL)
                                                echo $poslednjadiskusija['korisnikinv_username']; 
                                            elseif($poslednjadiskusija['korisnikinv_username']== NULL)
                                                echo $poslednjadiskusija['korisnikst_username'];
                                                 ?>
                                        </h3><p><?php echo $poslednjadiskusija['naslov'] ?></p>
                                    </span><span class="contentRight"><p>Vise informacija na stranici "Diskusije".</p></span>
                            </li>
                        </a>
                    <?php } ?>
                    </ul>
                </div>

                <div id="slideshow-carousel">
                    <ul id="carousel" class="jcarousel jcarousel-skin-tango">
                        <li><a href="#" rel="1">WELCOME</a></li>
                    <?php foreach ($poslednjediskusije as $poslednjadiskusija) { ?>
                        <li><a href="#" rel="<?php echo $poslednjadiskusija['id'] ?>"><?php echo $poslednjadiskusija['naslov'] ?></a></li>
                    <?php } ?>
                    </ul>
                </div>

                <div class="clear"></div>
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
                    <input type="hidden" name="hidden" value="12345">
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
</section>
