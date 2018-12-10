var chipSectionID_to_paramName = {
    "appliancesSection" : "applianceTypeIDs", 
    "utilitiesSection" :"utilityTypeIDs",
    "perksSection" :"perkTypeIDs",
    "amenitiesSection" :"amenityTypeIDs" 
};

//make sure the url stay user readable
function toNewURL(newURL){
    newURL = decodeURIComponent(newURL)
    window.location.replace(newURL)
}

function setOrAppendParam(name, value){
    var searchParams = new URLSearchParams(url.search.slice(1))

    //set or add the parameter depending on the result
    if(searchParams.has(name)) searchParams.set(name, value)
    else searchParams.append(name, value)

    //load up new url
    var newUrl = "?" + searchParams.toString()
    toNewURL(newUrl)
}

/*-------------------------show hide password-------------------------*/

$(".passwordShowHide > .input-group > .input-group-append > .showHide").on("click", function(){
    var showEye = $(this).find(".show") 
    var hideEye = $(this).find(".hide") 
    var password = $(this).parent().parent().find("input") 

    if($(showEye).css("display") == "none"){ //user wants to hide
        $(password).attr('type', 'password')
        $(hideEye).css("display","none")
        $(showEye).css("display", "inline-block")
    }
    else { //user wants to show
        $(password).attr('type', 'text')
        $(showEye).css("display","none")
        $(hideEye).css("display", "inline-block")
    }
})

/*--------------------------------------------------SEARCH BAR--------------------------------------------------*/

var listSections = $("#listSections > div")

function resetSearchBar(searchBar, searchBarOptions){
    //reset search bar
    $(searchBar).val("") //clear search bar
    //delete all possible items the search bar could have created
    $(searchBarOptions).empty()
    //the the container that holds drop down options
    $(searchBarOptions).parent().hide()
}

function openSearchBar(openSearchBarButton){
    //locate objects
    var searchBarContainer = $(openSearchBarButton).parent().find(".editor")
    var searchBar = $(searchBarContainer).find(".editorSearchBar > div > input")
    var searchBarOptions = $(searchBarContainer).find(".editorDropdownOuter > .editorDropdownInner")
    //reset search bar
    resetSearchBar(searchBar, searchBarOptions)
    //show and hide objects
    $(searchBarContainer).show() //show the search bar
    $(openSearchBarButton).hide() //hide the open search bar button
    //select the search bar (it should be cleared out from closing it)
    $(searchBar).select()
}

function closeSearchBar(searchBar){
    //locate objects
    var searchBarContainer = $(searchBar).parent().parent().parent()
    var openSearchBarButton = $(searchBarContainer).parent().find(".addChipButton")
    //show and hide objects
    $(searchBarContainer).hide()
    $(openSearchBarButton).show()
}

/*-------------------------show/hide search bar-------------------------*/

//very complicated CLICK listener
//required so that we could still "keep focus" if we clicked the search button
//we are technically losing focus on the search bar
//but we want to retreive the value and THEN close the search bar
$("#allContent").on('click', function(event) {

    //-------------------------plus button clicked ?

    var plusButtonClicked = null;
    $(listSections).each(function(index, listSection){
        var plusButton = $(listSection).find(".addChipButton")
        var thisSection = $(event.target).closest(plusButton).parent()
        var sectionID = $(thisSection).attr('id')
        //if we clicked on a button
        //(we know because we can access the seciton it belongs to)
        //AND its not hidden then we don't want to absorb the click
        if (sectionID != null && $(plusButton).css('display') != 'none'){
            plusButtonClicked = plusButton;
        }
    })

    //-------------------------handle plus button => open search bar

    if(plusButtonClicked != null){
        //close all search bars
        var searchBars = $(listSections).find(".editor >  .editorSearchBar > div > input")
        $(searchBars).each(function(index, searchBar){
            closeSearchBar(searchBar)
        })

        //open this one
        openSearchBar(plusButtonClicked)
    }
    else {
        //-------------------------search bar open ?

        var aSearchBarOpen = false;
        $(listSections).each(function(index, listSection){
            var searchBar = $(listSection).find(".editor")
            if($(searchBar).css('display') != 'none'){
                aSearchBarOpen = true
            } 
        })

        //-------------------------handle click that interact with said open search bar

        if(aSearchBarOpen != null){

            //-------------------------search button clicked ?

            //check if any button absorbs the click
            var searchButtonClicked = null;
            $(listSections).each(function(index, listSection){
                var searchButton = $(listSection).find(".editor > .editorSearchBar > div > button")
                var thisSection = $(event.target).closest(searchButton).parent().parent().parent().parent()
                var sectionID = $(thisSection).attr('id')
                //if we clicked on a button
                //(we know because we can access the seciton it belongs to)
                //the we dont absorb the click
                if (sectionID != null) searchButtonClicked = searchButton;
            })

            //-------------------------handle search button not clicked => close search bar

            //absorb if we didnt click a submit search button
            if(searchButtonClicked == null){  
                //since I don't know what wasn't click
                //close all search bars
                $(listSections).each(function(index, listSection){
                    var searchBar = $(listSection).find(".editor > .editorSearchBar > div > input")
                    closeSearchBar(searchBar)
                })
            }
        }
    }
});

//close the search bar if the escape key is press
//TODO... ONLY do this when this list item is the same one the search bar originally had
$(listSections).each(function(index, listSection){
    var searchBar = $(listSection).find(".editor > .editorSearchBar > div > input")
    $(searchBar).keyup(function(key) {
        if (event.which == 27 ) { //Esc key
            var options = $(searchBar).parent().parent().parent().find(".editorDropdownOuter >  .editorDropdownInner > option")
            var firstOption = $(options).eq(0)

            if($(firstOption).hasClass("dropdown-item-selected")){
                closeSearchBar(searchBar)
            }
            else{
                //remove the selected class from all the options
                var i
                for(i=0; i<options.length; i++){
                    $(options).eq(i).removeClass("dropdown-item-selected")
                }

                //add the class to the first option
                $(firstOption).addClass("dropdown-item-selected")

                //grab its OLD value from its ID
                var oldVal = $(searchBar).attr('id')
                $(searchBar).attr('id',"")

                //set the new value
                $(searchBar).val(oldVal)
            }

        }
    });
})

/*-------------------------search submission-------------------------*/

function addIDtoParamList(id, paramName){
    var searchParams = new URLSearchParams(url.search.slice(1))
    var paramValue = searchParams.get(paramName)
    var arrayOfIDs = JSON.parse(paramValue)
    if(arrayOfIDs == null) arrayOfIDs = []
    var index = arrayOfIDs.indexOf(id)

    //make sure we are not adding the same id twice
    if(index == -1){
        arrayOfIDs.push(id);

        if(arrayOfIDs.length != 0){
            setOrAppendParam(paramName, JSON.stringify(arrayOfIDs))
        }
        else deleteParam(paramName)
    }
}

function submitSearch(searchBar){
    //grab param list name for id of editor
    var sectionName = $(searchBar).parent().parent().parent().parent().attr('id')
    var paramName = chipSectionID_to_paramName[sectionName]
    var tagName = $(searchBar).val()

    $.ajax({
        method: "POST",
        url: baseurl + "/getID",
        data: {
            "paramName" : paramName,
            "tagName" : tagName,
            "addTag" : true
        },
        success: function (response) {
            response = JSON.parse(response)
            var paramName = response["paramName"]
            var tagID = parseInt(response["tagID"])

            addIDtoParamList(tagID, paramName)
        }
    });
}

$(listSections).each(function(index, listSection){
    //if you press the search icon 
    //the search will execute and the search bar will close
    var searchButton = $(listSection).find(".editor > .editorSearchBar > div > button")
    $(searchButton).on("click", function(event){
        event.preventDefault()
        searchBar = $(this).parent().parent().find("div > input")
        submitSearch(searchBar)
        closeSearchBar(searchBar)
    })

    //if you press enter within the search bar
    //the search will execute and the search bar will close
    var searchBar = $(listSection).find(".editor > .editorSearchBar > div > input")
    $(searchBar).keypress(function(key) {
        if (event.which == 13 ) { //Enter key
            submitSearch(searchBar)
            closeSearchBar(searchBar)
        }
    });
})

/*-------------------------search suggestions-------------------------*/

//NOTE: at the moment this includes only exact matches
function getSuggestions(word, allWords){
    //convert word to lower case for simplicity
    word = word.toLowerCase()

    //We Need to have the ENTIRE word inside of our suggestion for it be a proper suggestion
    var wordIndex
    var suggestionWords = []
    for(wordIndex = 0; wordIndex < allWords.length; wordIndex++){
        var thisWord = allWords[wordIndex].toLowerCase()
        if(thisWord.includes(word)) suggestionWords.push(thisWord)
    }
    
    //return all exact matches
    return suggestionWords
}

function addOption(select, text, isSelected = false){
    var newOption = "<option class=\"dropdown-item"
    + ((isSelected) ? " dropdown-item-selected" : "") + "\">" 
    + text + "</div>"
    $(select).append(newOption);
}

//set the maximum ammount of suggestions displayed
var maxSuggestions = 3

$(".editor > .editorSearchBar > div > input").keyup(function(key) {
    if (event.which != 27 && event.which != 38 && event.which != 40) {
        //make the connections to all the data we will require
        var dropdownContainer = $(this).parent().parent().parent().find(".editorDropdownOuter")
        var dropdownSelect = $(dropdownContainer).find(".editorDropdownInner")

        //wipe all previous suggestions
        $(dropdownSelect).empty()

        if($(this).val() != ""){

            $(dropdownContainer).show()
            var sectionName = $(this).parent().parent().parent().parent().attr('id')

            $.ajax({
                method: "POST",
                url: baseurl + "/getList",
                data: {
                    "sectionName" : sectionName
                },
                success: function (response) {
                    //get params from post
                    response = JSON.parse(response)
                    var sectionName = response["sectionName"]
                    var allWords = response["allWords"]

                    //derive some params from post
                    var inputTag = $("#" + sectionName).find(".editor > .editorSearchBar > div > input")
                    var dropdownSelect = $("#" + sectionName).find(".editor > .editorDropdownOuter > .editorDropdownInner")
                    var word = $(inputTag).val()

                    //use params to make suggestions
                    var suggestions = getSuggestions(word, allWords)

                    //insert the word that we have typed as the first option
                    addOption(dropdownSelect, word, true)

                    //get all the names of the current tags to we dont continue to suggest them
                    var chips = $("#" + sectionName).find(".chip")
                    var index 
                    for(index = 0; index < chips.length; index++){
                        //get the word inside of this chip
                        var chipWord = ($(chips).eq(index).text()).trim()
                        //remove this word from potential suggestions
                        var chipIndex = suggestions.indexOf(chipWord)
                        if(chipIndex != -1) suggestions.splice(chipIndex, 1)
                    }

                    //insert all the other suggestions
                    var suggestionCount = 0
                    var index
                    for(index = 0; index < suggestions.length; index++){
                        if(suggestions[index] != word){
                            addOption(dropdownSelect, suggestions[index], false)
                            suggestionCount++
                            if(suggestionCount >= maxSuggestions) break;
                        }
                    }
                }
            });
        }
        else $(dropdownContainer).hide()
    }
})

/*-------------------------search suggestion navigation-------------------------*/

$(".editor > .editorSearchBar > div > input").keyup(function() {
    if(event.which == 38 || event.which == 40){
        var options = $(this).parent().parent().parent().find(".editorDropdownOuter > .editorDropdownInner > .dropdown-item")

        var i
        var indexOfCurrSelected
        for(i=0; i<options.length; i++){
            if($(options).eq(i).hasClass("dropdown-item-selected")){
                indexOfCurrSelected = i
                break;
            }
        }

        //naively set the index of the next selected item
        var indexOfNextSelected
        if (event.which == 38) indexOfNextSelected = indexOfCurrSelected - 1
        else if(event.which == 40) indexOfNextSelected = indexOfCurrSelected + 1

        //make sure the naively selected item exists
        if(0 <= indexOfNextSelected && indexOfNextSelected <= (options.length - 1)){
            //if we are moving away from the option we typed
            //save its value in id so we can go back to it
            if(indexOfCurrSelected == 0){
                $(this).attr('id', $(this).val())
            }

            //if we are moving towards the option we typed
            //remove its id to not cause any issues where we cant close the search bar by tapping esc
            if(indexOfNextSelected == 0){
                $(this).removeAttr('id')
            }

            //remove the selected class from our curr selected
            $(options).eq(indexOfCurrSelected).removeClass("dropdown-item-selected")

            //add the selected class to our next selected
            $(options).eq(indexOfNextSelected).addClass("dropdown-item-selected")

            //pass the value from this option into the search bar
            $(this).val(($(options).eq(indexOfNextSelected).text()).trim())
        }
    }

    //find the selected class... 
    //shift it (up/down) if possible... 
    //replace whatever is at that option with the text in the input field
})