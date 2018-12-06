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

/*-------------------------search bar-------------------------*/

var dbTable = ["pool", "playground", "adult only pool", "gym", "Activity center", "tenis court", "basketball court", "game room"]

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
    
    //test print matching words
    var i;
    for(i=0; i < suggestionIndices.length; i++){
        console.log(dbTable[suggestionIndices[i]])
    }
}

$(".editor > .editorSearchBar > div > input").on("change keyup paste", function(){
    console.log("new value is " + $(this).val())
    getSuggestions($(this).val(), dbTable)
})