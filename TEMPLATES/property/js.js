//console.log("logic js file loaded (hopefully after connection js file)")
//CONNECTIONS

//REGISTER FORM
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
var formWaterHeating = "#Water\\ HeatingLabel"
//---Perks
var formPetFriendly = "#Pet\\ FriendlyLabel"
var formNonSmoking = "#Non\\ SmokingLabel"
var formOutdoorSpace = "#Outdoor\\ SpaceLabel"
var formNetflix = "#Netflix\\ SubscriptionLabel"
var formBalcony = "#BalconyLabel"
//---Amenities
var formPool = "#PoolLabel"
var formGym = "#GymLabel"
var formLaundromat = "#LaundromatLabel"
var formGameRoom = "#Game\\ RoomLabel"
var formPlayground = "#PlaygroundLabel"
var formJoggingTrail = "#Jogging\\ TrailLabel"
//--Response Card (Success/Error)
var formResponse = "#registerError"

//EDIT FORM
//--Address Fields
var E_formState = "#editState"
var E_formLocality = "#editLocality"
var E_formZip = "#editZipCode"
var E_formStreet = "#editStreetName"
var E_formBuildNum = "#editBuildingNum"
var E_formAptNum = "#editAptNum"
//--Add Picture
var E_picURL = "#url"
var E_picDescription = "#picturDescription"
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
    //Main Associative Array
    fields = {
        //Address
        state : $(formState).val(),
        locality : $(formLocality).val(),
        zip : $(formZip).val(),
        street : $(formStreet).val(),
        buildNum : $(formBuildNum).val(),
        aptNum : $(formAptNum).val(),
        //Property
        postName : $(formPostName).val(),
        rent : $(formRent).val(),
        sqrFootage : $(formSqrFootage).val(),
        bedrooms : $(formBedrooms).val(),
        bathrooms : $(formBathrooms).val(),
    }
    var appliances={}
    appliances[$(formRefrigerator).val()] = $(formRefrigerator).prop("checked")
    appliances[$(formOven).val()] = $(formOven).prop("checked")
    appliances[$(formStove).val()] = $(formStove).prop("checked")
    appliances[$(formDishwasher).val()] = $(formDishwasher).prop("checked")
    var utilities={}
    utilities[$(formElectricity).val()] = $(formElectricity).prop("checked")
    utilities[$(formWater).val()] = $(formWater).prop("checked")
    utilities[$(formHighSpeedInternet).val()] = $(formHighSpeedInternet).prop("checked")
    utilities[$(formRecycle).val()] = $(formRecycle).prop("checked")
    utilities[$(formTrash).val()] = $(formTrash).prop("checked")
    utilities[$(formDish).val()] = $(formDish).prop("checked")
    utilities[$(formWaterHeating).val()] = $(formWaterHeating).prop("checked")
    var perks={}
    perks[$(formPetFriendly).val()] = $(formPetFriendly).prop("checked")
    perks[$(formNonSmoking).val()] = $(formNonSmoking).prop("checked")
    perks[$(formOutdoorSpace).val()] = $(formOutdoorSpace).prop("checked")
    perks[$(formNetflix).val()] = $(formNetflix).prop("checked")
    perks[$(formBalcony).val()] = $(formBalcony).prop("checked")
    var amenities = {}
    amenities[$(formPool).val()] = $(formPool).prop("checked")
    amenities[$(formGym).val()] = $(formGym).prop("checked")
    amenities[$(formLaundromat).val()] = $(formLaundromat).prop("checked")
    amenities[$(formGameRoom).val()] = $(formGameRoom).prop("checked")
    amenities[$(formPlayground).val()] = $(formPlayground).prop("checked")
    amenities[$(formJoggingTrail).val()] = $(formJoggingTrail).prop("checked")
    
    //fields = JSON.stringify(fields)
    //console.log(fields)
    $.ajax({
        method: "post",
        url: baseurl + "/verifyProperty",
        data: 
        {
        field : fields,
        appliance : appliances,
        utility : utilities,
        perk : perks,
        amenity : amenities,
        },
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
    var appliances={}
    appliances[$(formRefrigerator).val()] = $(formRefrigerator).prop("checked")
    appliances[$(formOven).val()] = $(formOven).prop("checked")
    appliances[$(formStove).val()] = $(formStove).prop("checked")
    appliances[$(formDishwasher).val()] = $(formDishwasher).prop("checked")
    var utilities={}
    utilities[$(formElectricity).val()] = $(formElectricity).prop("checked")
    utilities[$(formWater).val()] = $(formWater).prop("checked")
    utilities[$(formHighSpeedInternet).val()] = $(formHighSpeedInternet).prop("checked")
    utilities[$(formRecycle).val()] = $(formRecycle).prop("checked")
    utilities[$(formTrash).val()] = $(formTrash).prop("checked")
    utilities[$(formDish).val()] = $(formDish).prop("checked")
    utilities[$(formWaterHeating).val()] = $(formWaterHeating).prop("checked")
    var perks={}
    perks[$(formPetFriendly).val()] = $(formPetFriendly).prop("checked")
    perks[$(formNonSmoking).val()] = $(formNonSmoking).prop("checked")
    perks[$(formOutdoorSpace).val()] = $(formOutdoorSpace).prop("checked")
    perks[$(formNetflix).val()] = $(formNetflix).prop("checked")
    perks[$(formBalcony).val()] = $(formBalcony).prop("checked")
    var amenities = {}
    amenities[$(formPool).val()] = $(formPool).prop("checked")
    amenities[$(formGym).val()] = $(formGym).prop("checked")
    amenities[$(formLaundromat).val()] = $(formLaundromat).prop("checked")
    amenities[$(formGameRoom).val()] = $(formGameRoom).prop("checked")
    amenities[$(formPlayground).val()] = $(formPlayground).prop("checked")
    amenities[$(formJoggingTrail).val()] = $(formJoggingTrail).prop("checked")
    //fields = JSON.stringify(fields)
    //console.log(fields)
    $.ajax({
        method: "post",
        url: baseurl + "/verifyProperty/edit",
        data: {
            field : fields,
            appliance : appliances,
            utility : utilities,
            perk : perks,
            amenity : amenities,
        },
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