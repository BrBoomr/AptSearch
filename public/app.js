
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
                    url: baseurl + "/success",
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
// When the user clicks the x on the error messages, hides them
$(".close").click(function(){
    $(this).parent().hide()
});