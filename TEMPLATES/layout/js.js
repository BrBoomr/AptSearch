/*
---IDs created for DOM manipulation---
#scrollToTop
#nav
#navbarText
#loginSpan
#loginButton
#logoutSpan
#logoutButton
#body
#mainDiv
#footer
*/

$("#logout").on("click", function(){
    event.preventDefault()
    $.ajax({
        method: "POST",
        url: baseurl + "/logout",
        success: function (response) {
            location.reload(true); //TODO... replae this with a javascript function that changes the elements in the page that need it
        }
    });
})

//using the (1) height of the screen and the (2) height of the navbar
//make the min height of the body just large enough to keep the footer out of view


$( document ).ready(function() {
    screenHeight = $(window).height() //$(document).height();
    navbarHeight = $('#nav').outerHeight()
    footerHeight = $("#footer").outerHeight()
    bodyHeight = (screenHeight - navbarHeight - footerHeight)
    $('#body').css('min-height', bodyHeight + 'px')
});


//scroll to top button functionality

$(window).scroll(function() {
    //show scroll to top button after we have scrolled atleast half of the current screen
    if ($(window).scrollTop() > ($(window).height()/2)) {
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