function generateUserListeners(button){

    var name = $(button).parent().parent().parent().find("label").text().toLowerCase()
    var input = $(button).parent().parent().find("input")
    var error = $(button).parent().parent().parent().find(".error")

    //listener that enables the button for editing once you click the edit button
    $(button).on("click", function(){
        event.preventDefault(); //prevent reload on click

        $(input).prop('disabled', false); //enable the input tag
        $(input).select(); //select all the text in the input tag
    })

    //create the listener that unfocuses the field on enter press
    $(input).keypress(function(key) {
        if ( event.which == 13 ) { //Enter key
            $(input).blur()
        }
    });

    //create the listener that submits the value on focus out
    $(input).focusout(function(){
        //disable the input tag again
        $(this).prop('disabled', true); 

        //try to upate the item on the server
        $.ajax({
            method: "POST",
            url: baseurl + "/settings/verify",
            data: {
                "actionName" : name,
                "actionData" : $(input).val()
            },
            success: function (response) {
                //grab data
                response = JSON.parse(response)
                var newValue = response["newValue"]
                var message = response["message"]
                var isName = response["isName"]
                
                //display value
                $(input).val(newValue)
                
                //display message
                if(message == ""){
                    $(error).hide()
                    if(isName){
                        $("#greeting").text(newValue)
                    }
                }
                else{
                    $(error).text(message)
                    $(error).show()
                }
            }
        });
    })

}

var buttons = $(".form-group > .input-group > .input-group-append > button")
$(buttons).each(function(i) { generateUserListeners("", this, "", "")});

/*-----delete phone-----*/

phoneButton = ".phoneRow > .col-auto > button"

$(phoneButton).on("click", function(){
    //grab the phone id
    phone = $(this).parent().parent()
    phoneID = $(phone).attr('id')

    //sent it process by ajax
    $.ajax({
        method :"post",
        url: baseurl + "/settings/deletePhone",
        data: {
            "phoneID" : phoneID
        },
        success: function (response) {
            //delete the UI when done
            $(phone).remove()
        }
    });
})



/*
//Connections
//-USER SETTINGS
var formName = "#editName"
var formEmail = "#editEmail"
var formNewPassword = "#newPassword"
var formConfirmPassword = "#confirmPassword"
var formCurrentPassword = "#currentPassword"
var formEditSubmit = "#editUserSubmit"
//This value was set in TEMPLATES/layout/html where the greeting portion is.
var userID = $("h3").attr("userid")
var userErrorCard = "#editUserError"
//-PHONE SETTINGS
//$(".phoneItem#3").find("option:selected").val()
var areaCode = ".areaCode"
var number = ".number"
var extension = ".extension"
var phoneErrorCard = "#editPhoneError"

$(".phoneItem").change(function(){
    var _phoneID = $(this).attr('id')
    var _description = $(this).find("option:selected").val()
    var _areaCode = $(this).find(areaCode).val()
    var _number = $(this).find(number).val()
    var _extension = $(this).find(extension).val()
    $.ajax({
        method :"post",
        url: baseurl+"/settings/editPhone",
        data: {
            phoneID : _phoneID,
            description : _description,
            areaCode : _areaCode,
            number : _number,
            extension : _extension,
        },
        dataType: "json",
        success: function (response) {
            if(response['valid']=='true'){
                $(phoneErrorCard).text("Successfuly Updated Phone!")
                $(phoneErrorCard).addClass("alert-success")
                $(phoneErrorCard).removeClass("d-none")
            }
            else{
                $(phoneErrorCard).text("Internal Error!")
                $(phoneErrorCard).addClass("alert-danger")
                $(phoneErrorCard).removeClass("d-none")
            }
        }
    });
})

$(formEditSubmit).click((e)=>{
    e.preventDefault()  
    $.ajax({
        method: "post",
        url: baseurl + "/settings/verify",
        data: {
            name : $(formName).val(),
            email : $(formEmail).val(),
            newPassword : $(formNewPassword).val(),
            confirmPassword : $(formConfirmPassword).val(),
            currentPassword : $(formCurrentPassword).val(),
        },
        dataType: "json",
        success: function (response) {
            console.log(response)
            if(response['valid']=='true'){
                $(userErrorCard).text("Successfuly Updated User!")
                $(userErrorCard).addClass("alert-success")
                $(userErrorCard).removeClass("d-none")
            }
            else if(response['mismatch']=='true'){
                $(userErrorCard).text("Mismatching Passwords!")
                $(userErrorCard).addClass("alert-danger")
                $(userErrorCard).removeClass("d-none")
            }
            else if(response['INV_PASS']=='true'){
                $(userErrorCard).text("Invalid Current Password!")
                $(userErrorCard).addClass("alert-danger")
                $(userErrorCard).removeClass("d-none")
            }
            else if(response['invalid']=='true'){
                $(userErrorCard).text("Default fields cannot be empty!")
                $(userErrorCard).addClass("alert-danger")
                $(userErrorCard).removeClass("d-none")
            }
        }
    });
})
*/

