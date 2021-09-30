/*
 ==========================================================================
 Codedume 2020 Website JS Scripts
 Copyright (c)  Erlangga Jedi Programer
 ==========================================================================
*/

jQuery(document).ready(function() {

/* === Wow === */
new WOW().init();
	
/* === Preloader === */
$("#preloader").delay(200).fadeOut("slow");

/* === Change Class === */
$("#searchIcon").click(function() {
    $(this).toggleClass('fas fa-search');
    $(this).toggleClass('fas fa-times');
});

/* === magnificPopup === */
$(document).ready(function() {
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });
});
	
});

var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
