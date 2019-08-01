<div style="height: 650px">
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
<div id="modal-wrapper3" class="modal" style="display: block;">

    <form class="modal-content animate" action="<?php echo site_url('Gost/ulogujin');?>" method="POST">

        <div class="imgcontainer">
            <span onclick="document.getElementById('modal-wrapper3').style.display='none'" class="close" title="Close PopUp">&times;</span>
            <img src="<?php echo base_url()?>assets/img/buiss.png" alt="Avatar" class="avatar">
            <h2 style="text-align:center">Login investitor</h2>
        </div>

        <div class="container">
            <?php if(isset($poruka)) echo "<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$poruka</font><br>";?>
            <input type="text" placeholder="Enter Username" name="username" value="<?php echo set_value('username');?>">
            <?php echo form_error("username","<font color='red'>","</font>"); ?>
            <input type="password" placeholder="Enter Password" name="password">
            <?php echo form_error("password","<font color='red'>","</font>"); ?><br>
            <button type="submit">Login</button>
        </div>

    </form>

</div>
