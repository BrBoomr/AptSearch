//-------------------------Connections-------------------------

//-------------------------Logic-------------------------

//-------------------------Database Objects

$(document).ready(function() {
    $.ajax({
        method: "POST",
        url: baseurl + "/search/sectionsOpen",
        success: function (response) {
            v = JSON.parse(response) //grab data from get request

            var sectionStates = [
                v["rent"], v["squareFootage"], 
                v["bed"], v["bath"],
                v["continentTypeID"], v["countryTypeID"], 
                v["state"], v["locality"], v["zipCode"],
                v["applianceTypeIDs"], v["utilityTypeIDs"], 
                v["perkTypeIDs"], v["amenityTypeIDs"]
            ]

            var sectionIDs = [
                "rentSection", "squareFootageSection", "bedSection", "bathSection",
                "continentSection", "countrySection", "localitySection", "stateSection", "zipCodeSection",
                "appliancesSection", "utilitiesSection", "perksSection", "amenitiesSection"
            ]

            var index;
            for(index = 0; index < sectionIDs.length; index++){
                console.log(sectionIDs[index] + " is in state " + sectionStates[index])
                if(sectionStates[index]) openSearch(sectionIDs[index])
            }
        }
    });
})

//-------------------------Slide Connection

//wait for our document to load so that we can read the min and max of our sliders from the dom
$(document).ready(function() {

    sliderContainers = $(".sliderContainer")
    $(sliderContainers).each(function(index){

        //TODO... replace this for whatever method we use to search
        function setNewValue(value, isMin, isFromSlider){
            if(isFromSlider) console.log("output from slider ")
            else console.log("output from text box")
            console.log("----NEW " + ((isMin) ? "min" : "MAX") + "value " + value)
        }

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
                if(ui.handleIndex == 0) setNewValue(ui.values[0], true, true)
                else setNewValue(ui.values[1], false, true)
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
                if(newVal < low || high < newVal){
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
                setNewValue(newVal, isMin, false)
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
})


//FOR DEBUGGING

/*
var openButtons = $(".sectionOpenButton")
$.each(openButtons, function(index, openButton){
    $("#" + $(openButton).attr("openSectionID")).show()
})
*/

//-------------------------Open/Close Buttons

function openSearchManually(sectionName){
    $("#" + sectionName).show() 
    sectionOpenButton = $("#showButtonSection").find("button[openSectionID=\'" + sectionName + "\']")
    $(sectionOpenButton).hide()
}

function openSearchFromButton(sectionOpenButton){
    sectionName = $(sectionOpenButton).attr("openSectionID") 
    $("#" + sectionName).show() 
    $(sectionOpenButton).hide()
}

function closeSearch(sectionCloseButton){
    sectionName = $(sectionCloseButton).attr("closeSectionID")
    sectionOpenButton = $("#showButtonSection").find("button[openSectionID=\'" + sectionName + "\']")
    $("#" + sectionName).hide()
    $(sectionOpenButton).show()
}

$(".sectionOpenButton").click(function(){
    openSearch(this)  
})

$(".sectionCloseButton").click(function(){
    closeSearch(this)
})

//-------------------------Objects-------------------------