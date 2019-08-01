<div class="wrapper">
    <div class="dodajVest">
        <center>
            <form method="post" action="<?php echo site_url("$controller/dodavanjeVesti");?>" enctype="multipart/form-data">

                <h3>Naslov vesti:</h3>

                <input type="text" name="naslov" required />

                <h3>Sadržaj vesti:</h3>

                <textarea name="sadrzaj" required style="margin: 0px; width: 465px; height: 350px;"></textarea><br></br>

                <script>
                    CKEDITOR.replace( 'sadrzaj' );
                </script>

                <input type="file" name="slika"/>

                <input type="submit" name="dodaj vest" value="Dodaj vest" class="btnDodaj" />
            </form>
        </center>
    </div>
</div>