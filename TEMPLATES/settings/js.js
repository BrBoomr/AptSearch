//Connections
var formName = "#editName"
var formEmail = "#editEmail"
var formNewPassword = "#newPassword"
var formConfirmPassword = "#confirmPassword"
var formCurrentPassword = "#currentPassword"
var formEditSubmit = "#editSubmit"
//This value was set in TEMPLATES/layout/html where the greeting portion is.
var userID = $("h3").attr("userid")

$(formEditSubmit).click((e)=>{
    e.preventDefault()
    
    $.ajax({
        method: "get",
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
                $("#editError").text("Successfuly Updated User!")
                $("#editError").addClass("alert-success")
                $("#editError").removeClass("d-none")
            }
            else if(response['mismatch']=='true'){
                $("#editError").text("Mismatching Passwords!")
                $("#editError").addClass("alert-danger")
                $("#editError").removeClass("d-none")
            }
            else if(response['INV_PASS']=='true'){
                $("#editError").text("Invalid Current Password!")
                $("#editError").addClass("alert-danger")
                $("#editError").removeClass("d-none")
            }
            else if(response['invalid']=='true'){
                $("#editError").text("Default fields cannot be empty!")
                $("#editError").addClass("alert-danger")
                $("#editError").removeClass("d-none")
            }
        }
    });
})