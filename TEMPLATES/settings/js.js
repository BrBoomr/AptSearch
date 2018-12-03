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


