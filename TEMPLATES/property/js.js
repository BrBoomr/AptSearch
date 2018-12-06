//console.log("logic js file loaded (hopefully after connection js file)")
//CONNECTIONS

//-Register Form
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
//--Feature Fields
//---Appliances
var formRefrigerator = "#RefrigeratorLabel"
var formOven = "#OvenLabel"
var formStove = "#StoveLabel"
var formDishwasher = "#DishwasherLabel"
//---Utilities
var formElectricity = "#ElectricityLabel"
var formWater = "#WaterLabel"
var formHighSpeedInternet = "#High\\ Speed\\ InternetLabel"
var formRecycle = "#Recycling\\ Pick\\ UpLabel"
var formTrash = "#Trash\\ Pick\\ UpLabel"
var formDish = "#Dish\\ CableLabel"
var formWaterHeating = "#Water\\ HeatinLabel"
//---Perks
var formPetFriendly = "#Pet\\ FriendlyLabel"
var formNonSmoking = "#Non\\ SmokingLabel"
var formOutdoorSpace = "#Outdoor\\ SpaceLabel"
var formNetflix = "#Netflix\\ SubscriptionLabel"
var formBalcony = "#BalconyLabel"
//---Amenities
var formPool = "#PoolLabel"
var formGym = "#GymLabel"
var formLaundromat = "#Game\\ RoomLabel"
var formPlayground = "#PlaygroundLabel"
var formJoggingTrailer = "#Jogging\\ TrailLabel"
//--Response Card (Success/Error)
var formResponse = "#registerError"

//-Edit Form
//--Address Fields
var E_formState = "#editState"
var E_formLocality = "#editLocality"
var E_formZip = "#editZipCode"
var E_formStreet = "#editStreetName"
var E_formBuildNum = "#editBuildingNum"
var E_formAptNum = "#editAptNum"
//--Property Fields
var E_formPostName="#editPostName"
var E_formRent="#editRent"
var E_formSqrFootage="#editSqrFootage"
var E_formBedrooms = "#editBedrooms"
var E_formBathrooms = "#editBathrooms"
var E_formSubmit = "#editSubmit"
var E_propertyID = $("h3[propertyid]").attr("propertyid")
//--Response Card (Success/Error)
var E_formResponse = "#editError"


$(formSubmit).click((e)=>{
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
        url: baseurl + "/verifyProperty",
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

$(E_formSubmit).click((e)=>{
    e.preventDefault()
    fields = {
        state : $(E_formState).val(),
        locality : $(E_formLocality).val(),
        zip : $(E_formZip).val(),
        street : $(E_formStreet).val(),
        buildNum : $(E_formBuildNum).val(),
        aptNum : $(E_formAptNum).val(),
        postName : $(E_formPostName).val(),
        rent : $(E_formRent).val(),
        sqrFootage : $(E_formSqrFootage).val(),
        bedrooms : $(E_formBedrooms).val(),
        bathrooms : $(E_formBathrooms).val(),
        propertyID : E_propertyID,
    }
    //fields = JSON.stringify(fields)
    //console.log(fields)
    $.ajax({
        method: "post",
        url: baseurl + "/verifyProperty/edit",
        data: fields,
        dataType: "json",
        success: function (response) {
            //console.log(response['valid'])
            if(response['valid']=='true'){
                $(E_formResponse).text("Successfuly Edited Property!")
                $(E_formResponse).addClass("alert-success")
                $(E_formResponse).removeClass("d-none")
            }
            else {
                $(E_formResponse).text("Invalid Input!")
                $(E_formResponse).addClass("alert-danger")
                $(E_formResponse).removeClass("d-none")
            }
        },
        fail: function(response){
            console.log("Internal Error")
        },

    })
})