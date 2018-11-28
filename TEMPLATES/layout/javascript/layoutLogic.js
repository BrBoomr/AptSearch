//positions the footer in the right place
$( document ).ready(function() {
    screenHeight = $(window).height() //$(document).height();
    navbarHeight = $('#nav').height()
    bodyHeight = (screenHeight - navbarHeight)
    $('#body').css('min-height', bodyHeight + 'px')
    $('#mainDiv').css('vertical-align', 'middle')
});