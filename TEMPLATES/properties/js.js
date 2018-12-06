//-------------------------Connections-------------------------

//-------------------------Logic-------------------------

//-------------------------Slide Connection

//wait for our document to load so that we can read the min and max of our sliders from the dom
$( document ).ready(function() {

    sliderContainers = $(".sliderContainer")
    $(sliderContainers).each(function(index){

        //conntect to all the require dom elements
        sliderContainer = $(sliderContainers).eq(index)
        minText = $(sliderContainer).find("div > div > .minText")
        maxText = $(sliderContainer).find("div > div > .maxText")
        slider = $(sliderContainer).find("div > .theSlider")

        //get our actual min/max from placeholder attributes
        actualMin = parseInt(minText.attr('placeholder'))
        actualMax = parseInt(maxText.attr('placeholder'))

        //get our user min/max from our value attributes 
        userMin = parseInt(minText.val())
        userMax = parseInt(maxText.val())
        //since we might not have a user min/max make sure that we have some value to take its place
        userMin = (userMin) ? userMin : actualMin
        userMax = (userMax) ? userMax : actualMax

        //create a slider with the proper min, max, start min, and start max
        $(slider).slider({
            range: true,
            max: actualMax,
            min: actualMin,
            values: [ userMin , userMax ],
            //when either slider point is moved update the text boxes [UPDATE]
            slide: function( event, ui ) { 
                minTextBox = $(this).parent().parent().find("div > div > .minText")
                maxTextBox = $(this).parent().parent().find("div > div > .maxText")
                if(ui.handleIndex == 0) minTextBox.val(ui.values[0])
                else maxTextBox.val(ui.values[1])
            },
            //output the new values when you let go of the slider [OUTPUT]
            stop: function(event, ui){
                if(ui.handleIndex == 0) console.log("-----NEW min: " + ui.values[ 0 ]);
                else console.log("-----NEW max: " + ui.values[1]);
            }
        });
        
        function getInRangeVersionOfTexBoxValue(textBox, isMin){
            newVal = $(textBox).val()
            theSlider = $(textBox).parent().parent().parent().find("div > .theSlider")
            if(newVal){ //make sure the new value exists
                //create the range variables for each of the sliders
                low = (isMin) ? $(theSlider).slider("option", "min") : $(theSlider).slider("values", 0)
                high = (isMin) ? $(theSlider).slider("values", 1) : high = $(theSlider).slider("option", "max")
                
                //if we are not within range make ourselves within range
                if(newVal < low && high < newVal){
                    if(newVal < low) newVal = low
                    else newVal = high
                }
            } //set the slider value to its default
            else newVal = $(theSlider).slider("option", (isMin) ? "min" : "max")

            //set the new value of the slider
            $(theSlider).slider("values", (isMin) ? 0 : 1, newVal)

            //return the newValue
            return newVal
        }

        //when the text changes update the slider [UPDATE]
        //DO NOT MESS with what the user is typing
        function textBoxToSlider(textBox, isMin){
            $(textBox).on("change keyup paste", function(){
                getInRangeVersionOfTexBoxValue(this, isMin)
            })
        }

        textBoxToSlider(minText, true)
        textBoxToSlider(maxText, false)

        function textBoxSubmitOnUnFocus(textBox, isMin) {
            $(textBox).focusout(function() {
                newVal = getInRangeVersionOfTexBoxValue(this, isMin)
                //if they instead erased the value dont fill in the value
                //allow the placeholder to be shown instead
                if($(this).val()) $(this).val(newVal) 
                console.log("-----NEW " + (isMin) ? "min" : "max" + " " + newVal)
            })
        }

        textBoxSubmitOnUnFocus(minText, true)
        textBoxSubmitOnUnFocus(maxText, false)

        function textBoxSubmitOnEnter(textBox, isMin) {
            $(textBox).keypress(function(key) {
                if (event.which == 13 ) { //Enter key
                    $(this).blur() //triggers text submission through unfocusing (above)
                }
            });
        }

        textBoxSubmitOnEnter(minText, true)
        textBoxSubmitOnEnter(maxText, false)
    })
});


//FOR DEBUGGING

var openButtons = $(".sectionOpenButton")
$.each(openButtons, function(index, openButton){
    $("#" + $(openButton).attr("openSectionID")).show()
})


//-------------------------Open/Close Buttons

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

//-------------------------Objects-------------------------