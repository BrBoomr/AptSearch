//-------------------------Connections-------------------------

var redirectButton = ".redirectButton"

//-------------------------Logic-------------------------

$(redirectButton).on("click", function(event){
    event.preventDefault();
    var id = $(redirectButton).attr('id')
    if($(this).hasClass("search")){
        window.location.assign(baseurl + "/viewProperty/" + id);
    }
    else{
        $.ajax({
            method: 'POST',
            url : baseurl + "/editProperty",
            data: {
                "id" : $(redirectButton).id,
            },
        });
    }
})

//-------------------------Objects-------------------------
//NOTE: these should not contain anything with an ID since objects are intended for duplication