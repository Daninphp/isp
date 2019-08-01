function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}
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
    $('div#slideshow-carousel a img').css({'opacity': '1.0'});
    $('div#slideshow-carousel a img:first').css({'opacity': '1.0'});
    $('div#slideshow-carousel li a:first').append('<span class="arrow"></span>')


    //Combine jCarousel with Image Display
    $('div#slideshow-carousel li a').hover(
        function () {

            if (!$(this).has('span').length) {
                $('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '1.0'});
                $(this).stop(true, true).children('img').css({'opacity': '1.0'});
            }
        },
        function () {

            $('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '1.0'});
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

});
