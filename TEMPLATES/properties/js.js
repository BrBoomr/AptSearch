//-------------------------Connections-------------------------

var rentSlider = "#rentSlider > div > .theSlider"
var sqrft = "#sqrftSlider > div > .theSlider"
var bedSlider = "#bedSlider > div > .theSlider"
var bathSlider = "#bathSlider > div > .theSlider"

//-------------------------Logic-------------------------

$( document ).ready(function() {

    $(rentSlider).slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 0, 500 ],
        slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        },
        stop: function(event, ui){
            console.log("slide finshed at " + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });

    $(sqrft).slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 0, 500 ],
        slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        },
        stop: function(event, ui){
            console.log("slide finshed at " + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });

    $(bedSlider).slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 0, 500 ],
        slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        },
        stop: function(event, ui){
            console.log("slide finshed at " + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });

    $(bathSlider).slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 0, 500 ],
        slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        },
        stop: function(event, ui){
            console.log("slide finshed at " + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });

});

//-------------------------Objects-------------------------