<div class="wrapper">
        <div  id="dodavanjeDis">
                    <form method="post" action="<?php echo site_url("KorisnikInv/dodajOglas");?>">

                        <label>Naslov oglasa:</label><br>

                        <input type="text" name="naslov" required class="novaDisNas"/><br><br>

                        <label>Sadržaj oglasa:</label><br>

                        <textarea name="sadrzaj" required class="widgEditor" style="margin: 0px; width: 465px; height: 350px;"></textarea><br></br>
                        <script>
                            CKEDITOR.replace( 'sadrzaj' );
                        </script>

                        <input type="submit" name="dodaj oglas" value="Dodaj oglas" class="btnDodaj" />
                    </form>
        </div>

</div>


