<div class="wrapper">
    <div class="newsMain">
        <ul>
        <?php foreach ($vesti as $vest) { ?>

            <a href="<?php echo site_url("$controller/prikaziVest/" . $vest['id_vesti']); ?>">
                <li>
                    <div class="newsMainImg">
                        <img src="
                            <?php
                                if($vest['slika']!= NULL){
                                    echo base_url($vest['slika']);
                                } elseif($vest['slika'] == NULL)
                                    echo  base_url("assets/img/news.jpg")
                            ?>
                        "/>
                    </div>
                    <div class="newsMainText">
                        <h2><?php echo $vest['naslov']?></h2>
                        <p><?php echo $vest['sadrzaj']?>...</p>
                    </div>
                </li>
            </a>

    <?php }  ?>
        </ul>
        <?php if($this->session->userdata('korisnikinv') || $this->session->userdata('korisnikst')) { ?>
            <a class="btnVest" href="<?php echo site_url("$controller/dodajVesti");?>">Dodaj novu vest</a>
    <?php } ?>
    </div>
    <!-- Login divs -->

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
    <!-- Login divs -->
</div>










