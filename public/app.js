//TODO: Fix bug where JS won't get values of auto-completed password/emails



// When the user clicks 'Login'
// Note: If your ID contains the word 'Button' in it, then JS won't pick it up.
//       Don't be like me and spend 2 hours wondering why the selector $(#'loginButton') wasn't working
$('#loginSubmit').click(function(){
    event.preventDefault(); //prevents page from reloading before authentication is done
    loginEmail = $('#loginEmail').val()
    loginPassword = $('#loginPassword').val()

    // Ajax call to verify the username and password
    $.ajax({
        url : baseurl
        + '/login_verification',
        method: 'POST', // Post request sending both the email and password to the url
        data: {'email':loginEmail, 'password':loginPassword},
        dataType : 'text',
        success: function(data){
            // Parse the returned values from the server into JSON
            data = $.parseJSON(data)
            // shows an error message if server couldn't verify email or password
            if (data['verified'] == 'false'){
                $('#loginError').show()
            }
            // A verbose statement, but used for readablity
            // Sends the user to the homepage once they have logged in
            else if (data['verified'] == 'true') {
                console.log("Success")
                window.location.replace(baseurl);
            }
        },
        fail: function(data){
            console.log("Fail")
        }
    });
});
// When the user clicks the x on the error messages, hides them
$(".close").click(function(){
    $(this).parent().hide()
});