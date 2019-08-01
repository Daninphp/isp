<div class="wrapper">
    <div class="dodajVest">
        <center>
            <form method="post" action="<?php echo site_url("$controller/dodavanjeDiskusija/".$tip);?>">

                <h3>Naslov diskusije:</h3>

                <input type="text" name="naslov" required />

                <h3>Sadržaj diskusije:</h3>
                <textarea name="sadrzaj" required style="margin: 0px; width: 465px; height: 350px;"></textarea><br></br>
                <script>
                    CKEDITOR.replace( 'sadrzaj' );
                </script>
                <select name="vidljivost" required>
                    <option value="1">Startup-ovi</option>
                    <option value="2">Investitori</option>
                    <option value="3">Samo korisnici</option>
                    <option value="4">Svi posetioci</option>
                </select>

                <input type="submit" name="dodaj vest" value="Dodaj diskusiju" class="btnDodaj" />
            </form>
        </center>
    </div>
</div>