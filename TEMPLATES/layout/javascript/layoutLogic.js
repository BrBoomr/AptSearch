//using the (1) height of the screen and the (2) height of the navbar
//make the min height of the body just large enough to keep the footer out of view

$( document ).ready(function() {
    screenHeight = $(window).height() //$(document).height();
    navbarHeight = $('#nav').height()
    bodyHeight = (screenHeight - navbarHeight)
    $('#body').css('min-height', bodyHeight + 'px')
    $('#mainDiv').css('vertical-align', 'middle')
});

//scroll to top button functionality

$(window).scroll(function() {
  if ($(window).scrollTop() > 0) {
    $('#scrollToTop').addClass('show');
  } else {
    $('#scrollToTop').removeClass('show');
  }
});

millisecondsToScrollToTop = 300
$('#scrollToTop').on('click', function(e) {
  e.preventDefault(); //stop the button from causing a page reload
  $('html, body').animate({scrollTop:0}, millisecondsToScrollToTop); //animated scrolling to top
});