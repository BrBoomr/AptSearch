//-------------------------make body atleast big enough to place footer on bottom-------------------------

function changeBodyMinSize(){
    screenHeight = $(window).height() //$(document).height();
    navbarHeight = $('#nav').outerHeight()
    footerHeight = $("#footer").outerHeight()
    bodyHeight = (screenHeight - navbarHeight - footerHeight)
    bodyHeight = (bodyHeight > 0) ? bodyHeight : 0
    $('#body').css('min-height', bodyHeight + 'px')
}

$( window ).resize(function() {
    changeBodyMinSize()
});

$(document).ready(function() {
    changeBodyMinSize()
});

//-------------------------logout button-------------------------

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

//-------------------------scroll to top button functionality-------------------------

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