//-------------------------Connections-------------------------

//-------------------------Logic-------------------------

$( "#slider-range" ).slider({
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

/*
$(document).ready(function() {
        
    $('#mySlider').slider({
        values: [25, 75],
        range: true,
        create: attachSlider,
        slide: attachSlider,
        stop: sliderStopped
    })

    function attachSlider() {
        $('#lowerlimit').val($('#mySlider').slider("values", 0));
        $('#upperlimit').val($('#mySlider').slider("values", 1));
    }
    
    $('input').change(function(e) {
        var setIndex = (this.id == "upperlimit") ? 1 : 0;
        $('#mySlider').slider("values", setIndex, $(this).val())
    })

    function sliderStopped(){
        console.log("slider stopped")
    }


});
*/

/*
$( document ).ready(function() {
    //If we unfocus from the text fiel we want to print the value
    $("#price-max").focusout(function() {
        console.log("max focus lost final value: " + $("#price-max").val())
    })
    
    $("#price-min").focusout(function() {
        console.log("min focus lost final value: " + $("#price-min").val())
    })

    //if we press enter on the text field we want to print the value
    $("#price-min").keypress(function(key) {
        if(key.which == 13) {
            console.log("min focus lost final value: " + $("#price-min").val())
            $('#price-min').blur();
        }
    });

    $("#price-max").keypress(function(key) {
        if(key.which == 13) {
            console.log("min focus lost final value: " + $("#price-max").val())
            $('#price-max').blur();
        }
    });

    //if we let go of either slide we want to print the value
    $( "#price-min" ).slider({
        change: function( event, ui ) {
            console.log("slider changed")
        }
    });

    $( "#price-min" ).on( "slidechange", function( event, ui ) {
        // use ui.value to get the current value
        console.log("slider changed")
    } );
    
});
*/

/*
$("#testButton").on("click",function(){
    console.log("min: " + $("#price-min").val() + " max " + $("#price-max").val())
    
})

$( document ).ready(function() {
    $("#price-max").focusout(function() {
        console.log("max focus lost final value: " + $("#price-max").val())
    })
    
    $("#price-min").focusout(function() {
        console.log("min focus lost final value: " + $("#price-min").val())
    })

    $("#price-min").keypress(function() {
        console.log( "Handler for .keypress() called." );
    });

    $(document).on('input', '#minSlider', function() {
        console("slider changing")
        //$('#slider_value').html( $(this).val() );
    });
});
*/
/*
.addEventListener('keyup',function(e){
    if (e.which == 13) this.blur();
});
*/

/*
$('input[type=range]').on('input', function () {
    $(this).trigger('change');
});
*/

//-------------------------Objects-------------------------