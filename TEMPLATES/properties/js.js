//-------------------------Connections-------------------------

var redirectButton = ".redirectButton"

//-------------------------Logic-------------------------

$(redirectButton).on("click", function(){
    if($(redirectButton).text() == "More Details"){
        $.ajax({
            method: 'GET',
            url : baseurl + "/viewProperty/" + $(redirectButton).id,
            dataType : "text",
        });
    }
    else{
        $.ajax({
            method: 'POST',
            url : baseurl + "/editProperty/",
            data: {
                "id" : $(redirectButton).id,
            },
        });
    }
})

//-------------------------Objects-------------------------
//NOTE: these should not contain anything with an ID since objects are intended for duplication