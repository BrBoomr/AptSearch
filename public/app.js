
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
                $.ajax({
                    method: "post",
                    url: baseurl + "/success_login",
                    data: {"userID" : response['userID']},
                    dataType: "text",
                    success: function (r) {
                        $("body").html(r)
                    }
                });
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
    registerPassword = $("#registerPassword").val()
    confirmPassword = $("#confirmPassword").val()
    //registration.push(registerFirstName,registerLastName,registerEmail,registerPassword,confirmPassword)

    $.ajax({
        method: "get",
        url: baseurl + "/register_verification",
        data: {"firstName" : registerFirstName,
                "lastName" : registerLastName,
                "email" : registerEmail,
                "password" : registerPassword,
                "confirm" : confirmPassword},
        dataType: "json",
        success: function (response) {
            if(response['verified']=='true'){
                $.ajax({
                    method: "get",
                    url: baseurl + "/success_register",
                    dataType: "text",
                    success: function (r) {
                        console.log("Successfuly Registered!")
                        $("body").html(r)
                    }
                });
            }
            else if(response['mismatch'] == 'true'){
                console.log("Passwords mismatch")
            }
            else if(response['invalid'] == 'true'){
                console.log("Fields Cannot Be Empty!")
            }
            else if(response['duplicate']== 'true'){
                console.log("Email already in use!")
            }
            else{
                console.log("All's fucked")
                //Internal Error Handling.
            }
        }
    });
})
// When the user clicks the x on the error messages, hides them
$(".close").click(function(){
    $(this).parent().hide()
});