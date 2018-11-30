//console.log("logic js file loaded (hopefully after connection js file)")



$("#registerSubmit").click((e)=>{
    e.preventDefault()
    fields = {
        state : $("#registerState").val(),
        locality : $("#registerLocality").val(),
        zip : $("#registerZipCode").val(),
        street : $("#registerStreetName").val(),
        buildNum : $("#registerBuildingNum").val(),
        aptNum : $("#registerAptNum").val(),
        postName : $("#registerPostName").val(),
        rent : $("#registerRent").val(),
        sqrFootage : $("#registerSqrFootage").val(),
        bedrooms : $("#registerBedrooms").val(),
        bathrooms : $("#registerBathrooms").val(),
    }
    //console.log(fields)
    fields = JSON.stringify(fields)
    
    $.ajax({
        method: "post",
        url: baseurl + "/verifyProperty",
        data: fields,
        dataType: "json",
        success: function (response) {
            //console.log(response)
            if(response['valid']=='true'){
                $("#registerError").text("Successfuly Added Property!")
                $("#registerError").addClass("alert-success")
                $("#registerError").removeClass("d-none")
            }
            else {
                $("#registerError").text("Invalid Input!")
                $("#registerError").addClass("alert-danger")
                $("#registerError").removeClass("d-none")
            }
        },
        fail: function(response){
            console.log("Internal Error")
        },

    })
})

