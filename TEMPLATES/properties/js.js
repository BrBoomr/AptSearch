//-------------------------Connections-------------------------

//-------------------------Logic-------------------------

//wait for our document to load so that we can read the min and max of our sliders from the dom
$(document).ready(function() {

    //-------------------------Database Objects

    var url = new URL(window.location.href);

    //Variables from property
    var rentMin
    var rentMax
    var squareFootageMin
    var squareFootageMax
    var bedMin
    var bedMax
    var bathMin
    var bathMax
    //Variables from address
    var continentTypeID
    var countryTypeID
    var state
    var locality
    var zipCode
    //variables form type lists
    var applianceTypeIDs
    var utilityTypeIDs
    var perkTypeIDs
    var amenityTypeIDs

    function getBool(variable){
        return (variable) ? true : false
    }

    //-------------------------Read URL and extract parameters

    //Variables from property
    rentMin = url.searchParams.get("rentMin")
    rentMax = url.searchParams.get("rentMax")
    squareFootageMin = url.searchParams.get("squareFootageMin")
    squareFootageMax = url.searchParams.get("squareFootageMax")
    bedMin = url.searchParams.get("bedMin")
    bedMax = url.searchParams.get("bedMax")
    bathMin = url.searchParams.get("bathMin")
    bathMax = url.searchParams.get("bathMax")
    //Variables from address
    continentTypeID = url.searchParams.get("continentTypeID")
    countryTypeID = url.searchParams.get("countryTypeID")
    state = url.searchParams.get("state")
    locality = url.searchParams.get("locality")
    zipCode = url.searchParams.get("zipCode")
    //variables form type lists
    applianceTypeIDs = url.searchParams.get("applianceTypeIDs")
    utilityTypeIDs = url.searchParams.get("utilityTypeIDs")
    perkTypeIDs = url.searchParams.get("perkTypeIDs")
    amenityTypeIDs = url.searchParams.get("amenityTypeIDs")

    //-------------------------Make sure parameters meet the spec
    //NOTE this happens with the html

    //-------------------------Open sections with set parameters

    var sectionStates = [
        (getBool(rentMin) || getBool(rentMax)), 
        (getBool(squareFootageMin) || getBool(squareFootageMax)), 
        (getBool(bedMin) || getBool(bedMax)), (getBool(bathMin) || getBool(bathMax)),
        getBool(continentTypeID), getBool(countryTypeID),
        getBool(state), getBool(locality), getBool(zipCode), 
        getBool(applianceTypeIDs), getBool(utilityTypeIDs),
        getBool(perkTypeIDs), getBool(amenityTypeIDs)
    ]

    var sectionIDs = [
        "rentSection", "squareFootageSection", "bedSection", "bathSection",
        "continentSection", "countrySection", "stateSection", "localitySection", "zipCodeSection",
        "appliancesSection", "utilitiesSection", "perksSection", "amenitiesSection"
    ]

    var index;
    for(index = 0; index < sectionIDs.length; index++){
        if(sectionStates[index]) openSectionManually(sectionIDs[index])
    };

    //-------------------------Open/Close Buttons

    //used if a paremeter of a particular section is set
    function openSectionManually(sectionName){
        $("#" + sectionName).show() 
        sectionOpenButton = $("#showButtonSection").find("button[openSectionID=\'" + sectionName + "\']")
        $(sectionOpenButton).hide()
    }

    function openSectionFromButton(sectionOpenButton){
        sectionName = $(sectionOpenButton).attr("openSectionID") 
        $("#" + sectionName).show() 
        $(sectionOpenButton).hide()
    }

    function closeSection(sectionCloseButton){
        sectionName = $(sectionCloseButton).attr("closeSectionID")
        sectionOpenButton = $("#showButtonSection").find("button[openSectionID=\'" + sectionName + "\']")
        $("#" + sectionName).hide()
        $(sectionOpenButton).show()

        /*
        //the non sloppy version that would not work for some reason
        slider = $("#" + sectionName + " > .sliderClass")
        if(slider.length != 0) //we are adding a slider
        */
        if(sectionName == "rentSection"
        || sectionName == "squareFootageSection"
        || sectionName == "bedSection"
        || sectionName == "bathSection"){
            //find the text boxes that hold the values
            minText = $("#" + sectionName).find("div > div > .minText")
            maxText = $("#" + sectionName).find("div > div > .maxText")

            //reset the text boxes
            $(minText).val("")
            $(maxText).val("")

            //have the slider found out values are reset
            passCorrectedValuesToSliderAndGetThem(minText, true)
            passCorrectedValuesToSliderAndGetThem(maxText, false)

            //-----remove the params from the url

            //remove "section" from the name
            sectionName = sectionName.substring(0, (sectionName.length - 7))
            
            deleteParam(sectionName + "Min")
            deleteParam(sectionName + "Max")
        }
        else{
            if(sectionName == "continentSection" || sectionName == "countrySection"){
                //find the param name by using the sectionName
                sectionName = sectionName.substring(0, (sectionName.length - 7))
                
                deleteParam(sectionName + "TypeID")
            }
            else{
                if(sectionName == "stateSection"
                || sectionName == "localitySection"
                || sectionName == "zipCodeSection"){
                    paramName = sectionName.substring(0, (sectionName.length - 7))

                    deleteParam(paramName)
                }
                else{
                    console.log("list section closed")
                }
            }
        }
    }

    $(".sectionOpenButton").click(function(){
        openSectionFromButton(this)  
    })

    $(".sectionCloseButton").click(function(){
        closeSection(this)
    })

    //-------------------------Slide Connection

    //ONLY WORKS TO CORRECT ONE OF TWO SLIDERS PEGS
    function passCorrectedValuesToSliderAndGetThem(textBox, isMin){
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

        //set the value for the textbox
        return newVal
    }

    //when the text changes update the slider [UPDATE]
    //DO NOT MESS with what the user is typing
    function textBoxToSlider(textBox, isMin){
        $(textBox).on("change keyup paste", function(){
            passCorrectedValuesToSliderAndGetThem(this, isMin)
        })
    }

    function textBoxSubmitOnUnFocus(textBox, isMin) {
        $(textBox).focusout(function() {
            newVal = passCorrectedValuesToSliderAndGetThem(this, isMin)
            //if they instead erased the value dont fill in the value
            //allow the placeholder to be shown instead
            if($(this).val()) $(this).val(newVal) 
            sectionID = $(this).parent().parent().parent().attr('id')
            addOrSetNewSliderValue(sectionID, newVal, isMin)
        })
    }

    function textBoxSubmitOnEnter(textBox, isMin) {
        $(textBox).keypress(function(key) {
            if (event.which == 13 ) { //Enter key
                $(this).blur() //triggers text submission through unfocusing (above)
            }
        });
    }

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
            //when either slider point is moved update the text boxes [UPDATE]
            slide: function( event, ui ) { 
                minTextBox = $(this).parent().parent().find("div > div > .minText")
                maxTextBox = $(this).parent().parent().find("div > div > .maxText")
                if(ui.handleIndex == 0) minTextBox.val(ui.values[0])
                else maxTextBox.val(ui.values[1])
            },
            //output the new values when you let go of the slider [OUTPUT]
            stop: function(event, ui){
                sectionID = $(ui.handle).parent().parent().parent().attr('id')
                if(ui.handleIndex == 0) addOrSetNewSliderValue(sectionID, ui.values[0], true)
                else addOrSetNewSliderValue(sectionID, ui.values[1], false)
            }
        });

        textBoxToSlider(minText, true)
        textBoxToSlider(maxText, false)

        textBoxSubmitOnUnFocus(minText, true)
        textBoxSubmitOnUnFocus(maxText, false)

        textBoxSubmitOnEnter(minText, true)
        textBoxSubmitOnEnter(maxText, false)

        //place the incorrect values in the text boxes
        $(minText).val(userMin)
        $(maxText).val(userMax)
        //min is corrected without knowing MAX
        //so all we know is that its within range actualMin and actualMax
        userMin = passCorrectedValuesToSliderAndGetThem(minText, true)
        //max is corrrected knowing correct MIN
        userMax = passCorrectedValuesToSliderAndGetThem(maxText, false)
        //min is corrected knowing correct MAX
        userMin = passCorrectedValuesToSliderAndGetThem(minText, true)
        //place the corrected values in the text boxes
        $(minText).val(userMin)
        $(maxText).val(userMax)

        //DONT correct the params... they MIGHT be valid in the future
    })

    //-------------------------Continent and Country Dropdowns

    var locationDropdowns = $("#locationSections > div > div > select")
    addOrSetNewDropdownValue($(locationDropdowns).eq(0))
    addOrSetNewDropdownValue($(locationDropdowns).eq(1))

    //-------------------------State, Locality, and ZipCode TextBoxes

    var locationTextboxes = $("#locationSections > div > div > input")
    addOrSetNewTextBoxValue($(locationTextboxes).eq(0))
    addOrSetNewTextBoxValue($(locationTextboxes).eq(1))
    addOrSetNewTextBoxValue($(locationTextboxes).eq(2))

    //-------------------------Parameters Setting Or Appending

    function setOrAppendParam(name, value){
        var searchParams = new URLSearchParams(url.search.slice(1))

        //set or add the parameter depending on the result
        if(searchParams.has(name)) searchParams.set(name, value)
        else searchParams.append(name, value)

        //load up new url
        var newUrl = "?" + searchParams.toString()
        window.location.replace(newUrl)
    }

    function addOrSetNewSliderValue(sectionName, value, isMin){
        //remove "section" from the name
        sectionName = sectionName.substring(0, (sectionName.length - 7))
        var paramName = sectionName + ((isMin) ? "Min" : "Max")

        setOrAppendParam(paramName, value)
    }

    function addOrSetNewDropdownValue(dropDown){
        $(dropDown).change(function() {
            var sectionName = $(this).parent().parent().attr('id')
            //remove "section" from the name
            sectionName = sectionName.substring(0, (sectionName.length - 7))
            var paramName = sectionName + "TypeID"
            var value = $(this).find("option:selected").attr('id')

            setOrAppendParam(paramName, value)
        })
    }

    function addOrSetNewTextBoxValue(textBox){

        function addOrSet(textBox){
            sectionName = $(textBox).parent().parent().attr('id')//remove "section" from the name
            paramName = sectionName.substring(0, (sectionName.length - 7))
            value = $(textBox).val()

            setOrAppendParam(paramName, value)
        }

        $(textBox).keypress(function(key) {
            if (event.which == 13 ) { //Enter key
                addOrSet(this)
            }
        });

        $(textBox).focusout(function() {
            addOrSet(this)
        })
    }

    //-------------------------Parameters Removal

    function deleteParam(paramName){
        var searchParams = new URLSearchParams(url.search.slice(1))

        //delete the param
        searchParams.delete(paramName)

        //load up new url
        var newUrl = "?" + searchParams.toString()
        window.location.replace(newUrl)
    }
})

//-------------------------Objects-------------------------