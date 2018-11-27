
$('#loginSubmit').click(function(){
    event.preventDefault(); //prevents page from reloading before authentication is done
    loginEmail = $('#loginEmail').val()
    loginPassword = $('#loginPassword').val()

    $.ajax({
        method: "post",
        url: baseurl + "/login_verification",
        data: {"email" : loginEmail, "password" : loginPassword},
        dataType: "json",
        success: function (response) {
            if(response['verified'] == "true"){
                loginPage(response['userID'])
            }
            else{
                $('#loginError').show()
            }
        }
    });
});

$("#registerSubmit").click(function(){
    event.preventDefault()
    //registration = []
    registerFirstName = $("#registerFirstName").val()
    registerLastName = $("#registerLastName").val()
    registerEmail = $("#registerEmail").val()
    //Using attr() here does not work. prop() gets the CURRENT value of a checkbox
    registerType = $("#landlordCheck").prop("checked")
    registerPassword = $("#registerPassword").val()
    confirmPassword = $("#confirmPassword").val()
    //registration.push(registerFirstName,registerLastName,registerEmail,registerPassword,confirmPassword)
    console.log(registerType)
    $.ajax({
        method: "get",
        url: baseurl + "/register_verification",
        data: {"firstName" : registerFirstName,
                "lastName" : registerLastName,
                "email" : registerEmail,
                "type" : registerType,
                "password" : registerPassword,
                "confirm" : confirmPassword},
        dataType: "json",
        success: function (response) {
            if(response['verified']=='true'){
                loginPage(response["userID"])
            }
            else if(response['mismatch'] == 'true'){
                //console.log("Passwords mismatch")
                $("#registerError").removeClass("d-none")
                $("#registerError").text("Passwords Do Not Match!")
            }
            else if(response['invalid'] == 'true'){
                //console.log("Fields Cannot Be Empty!")
                $("#registerError").removeClass("d-none")
                $("#registerError").text("Fields Cannot Be Empty!")
            }
            else if(response['duplicate']== 'true'){
                //console.log("Email already in use!")
                $("#registerError").removeClass("d-none")
                $("#registerError").text("Email Already In Use!")
            }
            else{
                //console.log("All's fucked")
                $("#registerError").removeClass("d-none")
                $("#registerError").text("You Broke Something, Go Away!")
                //Internal Error Handling.
            }
        }
    });
})
// When the user clicks the x on the error messages, hides them
$(".close").click(function(){
    $(this).parent().hide()
});

//Renders index.html with a specific userID in mind. This is done after both logging in and successfully registering an account(which automatically logs them in)
function loginPage(userID){
    $.ajax({
        method: "post",
        url: baseurl + "/success_login",
        data: {"userID" : userID},
        dataType: "text",
        success: function (r) {
            $("body").html(r)
            $("p").attr("userid",userID) //Assigns the tag the current user's ID. Not sure how we can use this yet.
        }
    });
}