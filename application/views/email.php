<div class="wrapper">
        <div  id="email">
            <form method="post" action="<?php echo site_url("$controller/email/".$idgrupe);?>">
                <label>Subject:</label><br>
                
                <input type="hidden" name="ime" value="<?php echo $ime ?>"/>
                
                <input type="text" name="cc" required style="width: 300px;"/><br><br>

                <label>Sadržaj Vaseg email-a:</label><br>

                <textarea name="sadrzaj" required class="widgEditor"></textarea><br></br>
                <script>
                    CKEDITOR.replace( 'sadrzaj' );
                </script>
                <input type="submit" name="posalji email" value="Posaljite email" class="btnDodaj" />
            </form>
        </div>
</div> 
