<div class="wrapper">
    <div id="arhiv">
        <ul>
            <?php if(empty($arhiviraneporuke)){
                echo "<h3>Nemate arhiviranih diskusija!!</h3>";
            } else { ?>
            <?php foreach ($arhiviraneporuke as $oglas) { ?>
                <li>
                    <div class="arhivDivMain">
                        <div class="arhivDiv">
                            <a href='<?php echo site_url("$controller/prikaziDiskusiju/".$oglas["id"])?>'>
                                <?php echo $oglas['naslov']; ?>
                            </a>
                        </div>
                        <div class="arhivDiv">
                            <span>Datum pravljenja diskusije:</span>
                            <span><?php echo $oglas['datum']; ?></span>
                        </div>
                        <div class="arhivDiv">
                            <span>Datum arhiviranja: </span>
                            <span><?php echo $oglas['datum_arhiv']; ?></span>
                        </div>
                    </div>
                </li>
            <?php } }?>
        </ul>
    </div>
</div>

                