<div class="wrapper">
    <div id="mainForumDiv">
        <ul class="forumList">
            <?php foreach ($tipovidiskusija as $tip) { ?>
            <li>
                <div id="forum">
                    <div class="forumImg">
                        <img src="<?php echo base_url(); ?>assets/img/forum.png" alt="forum_img"/>
                    </div>
                    <div class="forumContent">
                        <a href="<?php echo site_url("$controller/diskusije/".$tip['id']); ?>"><?php echo $tip['naslov']?></a></br>
                        <span>Administrator: </span><span style="color: limegreen"><?php echo $tip['autor']?></span>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>

    <?php if($this->session->userdata('admin')) { ?>
        <div id="addComment">
            <form method="post" action="<?php echo site_url("Admin/dodajTipDiskusije/");?>">
                <textarea width="300px" id="textareaOdg" placeholder="Unesite novi tip diskusije" name="naslov" required></textarea></br>
                <input type="submit" name="postavi_diskusiju" value="Postavi novi tip diskusije" class="newsBtn" />
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
