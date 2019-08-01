    <footer>
        <div class="wrapper">
            <div class="firstCol">
                <p id="contact">Kontakt</p>
                <div class="infoFooter">
                    <p><a href="tel:011/134-4498">Kontakt telefon: 011/134-4498</a></p>
                    <a href="mailto:portalisp2018@gmail.com">portalisp2018@gmail.com</a>
                    <p id="adress">Adresa</p>
                    <p><a href="https://www.google.com/maps/place/%D0%91%D1%83%D0%BB%D0%B5%D0%B2%D0%B0%D1%80+%D0%BA%D1%80%D0%B0%D1%99%D0%B0+%D0%90%D0%BB%D0%B5%D0%BA%D1%81%D0%B0%D0%BD%D0%B4%D1%80%D0%B0+22,+%D0%91%D0%B5%D0%BE%D0%B3%D1%80%D0%B0%D0%B4/@44.809843,20.4646673,17z/data=!4m5!3m4!1s0x475a7aa5bdfea2bf:0xb36947424a864cec!8m2!3d44.8098468!4d20.4668023?hl=sr" target="_blank">Bulevar Kralja Aleksandra 22</a></p>
                </div>
            </div>
            <div class="secondCol">
                <p id="social">Socijalne mreze</p>
                <ul class="socialList">
                    <li><a href=""> <i class="icon ion-logo-facebook"></i> </a></li>
                    <li><a href=""> <i class="icon ion-logo-twitter"></i> </a></li>
                    <li><a href=""> <i class="icon ion-logo-linkedin"></i> </a></li>
                    <li><a href=""> <i class="icon ion-logo-youtube"></i> </a></li>
                </ul>
                <a href="<?php echo site_url("$controller/preuzmi"); ?>" download id="downLink">Ovde mozete preuzeti funkcionalnosti.</a>
            </div>
            <div class="thirdCol">
                <p class="abtUs">O nama</p>
                <div class="aboutUs">
                    <p>ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.
                    </p>

                </div>
            </div>
        </div>
    </footer>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/js.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jcaruselfirst.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.jcarousel.pack.js"></script>  
<script>
    // If user clicks anywhere outside of the modal, Modal will close

    var modal = document.getElementById('modal-wrapper');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
