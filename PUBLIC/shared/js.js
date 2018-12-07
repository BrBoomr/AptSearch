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

//add buttons open their own respective search bars
$(listSections).each(function(index, listSection){
    var openSectionButton = $(listSection).find(".addChipButton")
    $(openSectionButton).on("click", function(event){
        event.preventDefault();
        openSearchBar(this)
    })
})

//search bars will close after you unfocus them
$(listSections).each(function(index, listSection){
    var searchBar = $(listSection).find(".editorSearchBar > div > input")
    $(searchBar).focusout(function(){
        closeSearchBar(this)
    })
})

/*-------------------------search submission-------------------------*/

$(listSections).each(function(index, listSection){
    //if you press the search icon 
    //the search will execute and the search bar will close
    var searchButton = $(listSection).find(".editor > .editorSearchBar > div > button")
    console.log("run")
    $(searchButton).on("click", function(event){
        event.preventDefault()
        console.log("button pressed nigga")
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