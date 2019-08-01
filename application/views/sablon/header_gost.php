<html>
<head>
    <title>ISP</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/img/logo-tamni.png">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.jcarousel.css" />
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jcaruselfirst.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.jcarousel.pack.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.jcarousel.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/skin.css" />
    <link href="https://unpkg.com/ionicons@4.2.0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>

<script type="text/javascript">
 function currentSlide(n) {
    showSlides(slideIndex = n);
}
$(document).ready(function()
        {
            $('nav ul li').hover(function(e)
                {
                    $(this).find('ul:first').show('slow');
                },
                function()
                {
                    $(this).find('ul:first').hide('fast');
                });

        });
$(document).ready(function () {

    //jCarousel Plugin
    $('#carousel').jcarousel({
        vertical: true,
        scroll: 1,
        auto: 2,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });

    //Front page Carousel - Initial Setup
    $('div#slideshow-carousel a img').css({'opacity': '0.5'});
    $('div#slideshow-carousel a img:first').css({'opacity': '1.0'});
    $('div#slideshow-carousel li a:first').append('<span class="arrow"></span>')


    //Combine jCarousel with Image Display
    $('div#slideshow-carousel li a').hover(
        function () {

            if (!$(this).has('span').length) {
                $('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
                $(this).stop(true, true).children('img').css({'opacity': '1.0'});
            }
        },
        function () {

            $('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
            $('div#slideshow-carousel li a').each(function () {

                if ($(this).has('span').length) $(this).children('img').css({'opacity': '1.0'});

            });

        }
    ).click(function () {

            $('span.arrow').remove();
            $(this).append('<span class="arrow"></span>');
            $('div#slideshow-main li').removeClass('active');
            $('div#slideshow-main li.' + $(this).attr('rel')).addClass('active');

            return false;
        });


});


//Carousel Tweaking

function mycarousel_initCallback(carousel) {

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
}
$(document).ready(function()
{
    $('nav ul li').hover(function(e)
        {
            $(this).find('ul:first').show('slow');
        },
        function()
        {
            $(this).find('ul:first').hide('fast');
        });

});/**
 * Created by Didi on 18-Jun-18.
 */

function goBack() {
    window.history.back();
}
</script>
</head>
<body>
<nav>
    <div class="wrapper">
        <div class="logo">
            <a href="<?php echo site_url('Gost/index');?>"><img src="<?php echo base_url()?>assets/img/logo-beli.png" alt="ISP" id="logo"/></a>
        </div>
        <ul class="left-menu">
            <li><a href="<?php echo site_url('Gost/index');?>">Naslovna</a></li>
            <li><a href="<?php echo site_url('Gost/tipoviDiskusija');?>">Diskusije</a></li>
            <li><a href="<?php echo site_url('Gost/vesti');?>">Vesti</a></li>
        </ul>
        <ul class="right-menu">

            <li>
                <a href="#">Startup</a>
                <ul class="dropdown">
                    <li><a href="#" onclick="document.getElementById('modal-wrapper').style.display='block'">Log in</a></li>
                    <li><a href="<?php echo site_url('Gost/regist');?>">Registracija</a></li>
                </ul>
            </li>

            <li>
                <a href="#">Investitor</a>
                <ul class="dropdown">
                    <li><a href="#" onclick="document.getElementById('modal-wrapper2').style.display='block'">Log in</a></li>
                    <li><a href="<?php echo site_url('Gost/reginv');?>">Registracija</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>