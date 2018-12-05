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

//FOR DEBUGGING
/*
var openButtons = $(".sectionOpenButton")
$.each(openButtons, function(index, openButton){
    $("#" + $(openButton).attr("openRowID")).show()
})
*/

//-------------------------Open Buttons

$(".sectionOpenButton").click(function(){
    //grab the name of the section we want to OPEN
    sectionName = $(this).attr("openSectionID") 
    //create the new name of the OPEN button
    buttonName = sectionName + "button"
    //set the id of the OPEN button
    $(this).attr('id', buttonName)
    //show the filter
    $("#" + sectionName).show() 
    //hide the OPEN button
    $(this).hide()

    //if it hasnt been done already
    sectionCloseButton = $("#" + sectionName).find(".sectionRemoveButton")
    buttonAttribute = $(sectionCloseButton).attr("*[closeSectionID]")
    if(buttonAttribute == undefined ){
        //give close buttons a reference to their section
        $(sectionCloseButton).attr("closeSectionID", sectionName)
        //and create a listener so that they can close the filter
        $(sectionCloseButton).click(function(){
            //grab the name of the section
            sectionName = $(this).attr("closeSectionID")
            buttonName = sectionName + "button"
            //hide the filter
            $("#" + sectionName).hide() 
            $("#" + buttonName).show() //show the button
        })
    }
})

//-------------------------Close Buttons



//-------------------------Objects-------------------------