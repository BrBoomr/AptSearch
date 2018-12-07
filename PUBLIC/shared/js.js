/*-------------------------show hide password-------------------------*/

$(".passwordShowHide > .input-group > .input-group-append > .showHide").on("click", function(){
    var showEye = $(this).find(".show") 
    var hideEye = $(this).find(".hide") 
    var password = $(this).parent().parent().find("input") 

    console.log("show " + $(showEye).css("display"))
    console.log("hide " + $(hideEye).css("display"))
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

var dbTable = ["pool", "playground", "adult only pool", "gym", "Activity center", "tenis court", "basketball court", "game room"]
var listSections = $("#listSections > div")

function resetSearchBar(searchBar, searchBarOptions){
    //reset search bar
    $(searchBar).val("") //clear search bar
    //delete all possible items the search bar could have created
    $(searchBarOptions).each(function(searchBarOption, index){
        $(searchBarOption).remove()
    })
}

function openSearchBar(openSearchBarButton){
    //locate objects
    var searchBarContainer = $(openSearchBarButton).parent().find(".editor")
    var searchBar = $(searchBarContainer).find(".editorSearchBar > div > input")
    var searchBarOptions = $(searchBarContainer).find(".editorDropdownOuter > .editorDropdownInner")
    //reset search bar
    resetSearchBar(searchBar)
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

function submitSearch(searchBar){
    console.log("add tag: " + $(searchBar).val())
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

    if(plusButtonClicked != null) openSearchBar(plusButtonClicked)
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
    $(searchBar).keypress(function(key) {
        if (event.which == 27 ) { //Esc key
            closeSearchBar(searchBar)
        }
    });
})

/*-------------------------search submission-------------------------*/

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

/*
//NOTE: at the moment this includes only exact matches
function getSuggestions(word, allWords){
    //convert word to lower case for simplicity
    word = word.toLowerCase()

    //We Need to have the ENTIRE word inside of our suggestion for it be a proper suggestion
    var wordIndex
    var suggestionIndices = []
    for(wordIndex = 0; wordIndex < allWords.length; wordIndex++){
        var thisWord = allWords[wordIndex].toLowerCase()
        if(thisWord.includes(word)) suggestionIndices.push(wordIndex)
    }
    
    //return all exact matches
    return suggestionIndices
}

$(".editor > .editorSearchBar > div > input").on("change keyup paste", function(){
    console.log("new value is " + $(this).val())

    //return all indices of matches
    getSuggestions($(this).val(), dbTable)

    //<div class="dropdown-item">text1</div>
})
*/

/*
$(listSections).each(function(listSection, index){
    searchbar = $(listSection).find(".editor > .editorSearchBar > div > input")

    //when we change the content on a search bar stuff should happen
    $(textBox).on("change keyup paste", function(){
        console.log("stuff should be happeing")
    })

    //when we unfocus the search bar search bar
    //1. hide and reset search bar
    //2. show the open search bar button

    //when we press enter while on the search bar
})
*/