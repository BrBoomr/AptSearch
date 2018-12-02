//console.log("logic js file loaded (hopefully after connection js file)")
//CONNECTIONS
//--Address Fields
var formState = "#registerState"
var formLocality = "#registerLocality"
var formZip = "#registerZipCode"
var formStreet = "#registerStreetName"
var formBuildNum = "#registerBuildingNum"
var formAptNum = "#registerAptNum"
//--Property Fields
var formPostName="#registerPostName"
var formRent="#registerRent"
var formSqrFootage="#registerSqrFootage"
var formBedrooms = "#registerBedrooms"
var formBathrooms = "#registerBathrooms"
var formSubmit = "#registerSubmit"
//--Response Card (Success/Error)
var formResponse = "#registerError"


$("#registerSubmit").click((e)=>{
    e.preventDefault()
    fields = {
        state : $(formState).val(),
        locality : $(formLocality).val(),
        zip : $(formZip).val(),
        street : $(formStreet).val(),
        buildNum : $(formBuildNum).val(),
        aptNum : $(formAptNum).val(),
        postName : $(formPostName).val(),
        rent : $(formRent).val(),
        sqrFootage : $(formSqrFootage).val(),
        bedrooms : $(formBedrooms).val(),
        bathrooms : $(formBathrooms).val(),
    }
    
    //fields = JSON.stringify(fields)
    //console.log(fields)
    $.ajax({
        method: "post",
        url: baseurl + "/verify_property",
        data: fields,
        dataType: "json",
        success: function (response) {
            //console.log(response['valid'])

            if(response['valid']=='true'){
                $(formResponse).text("Successfuly Added Property!")
                $(formResponse).addClass("alert-success")
                $(formResponse).removeClass("d-none")
            }
            else {
                $(formResponse).text("Invalid Input!")
                $(formResponse).addClass("alert-danger")
                $(formResponse).removeClass("d-none")
            }
        },
        fail: function(response){
            console.log("Internal Error")
        },

    })
})