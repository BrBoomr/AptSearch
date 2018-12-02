//------------------------------Connections-------------------------

var formState = "#formState"
var formTitle = "#formTitle"
var name = "#name"
var email = "#email"
var password = "#password"
var confirmPassword = "#confirmPassword"
var error = "#error"
var switcher = "#switcher"
var submitButton = "#submitButton"


//------------------------------Logic-------------------------

//------------------------------Shared Functions

function isLogin(){
    return $(formState).text() == "login"
}

//------------------------------Form Switching

$(switcher).on( "click", function() {
    event.preventDefault();
    setForm(isLogin())
})

function setForm(login){
    hideError() //hide the error because you might have different fields than before
    $(formState).text((login) ? "signup" : "login") //change form state
    $(formTitle).text((login) ? "Create An Account!" : "Welcome Back!")
    $(name).parent().css('display', (login) ? 'block' : 'none')
    $(confirmPassword).parent().css('display', (login) ? 'block' : 'none')
    $(switcher).text((login) ? "Already Have an Account?" : "Don't have an Account?")
    $(submitButton).text((login) ? "Sign Up" : "Log In")
}

//------------------------------Form Submission

$(submitButton).on("click", function(){
    event.preventDefault();
    if(isLogin()) reRoute("login")
    else reRoute("signup")
})

function reRoute(route){
    hideError()
    $.ajax({
        method: "POST",
        url: baseurl + "/" + route,
        data: {
            "name" : $(name).val(), //not needed for login but wont affect anything
            "email" : $(email).val(),
            "password" : $(password).val(),
            "confirmPassword" : $(confirmPassword).val() //not needed for login but wont affect anything
        },
        success: function (response) {
            reactToSuccess(response)
        }
    });
}

function reactToSuccess(response){
    //save user data
    response = JSON.parse(response)
    var userID = response["userID"]
    var message = response["message"]

    //try to reroute to our login page
    if(message == ""){
        //ajax request to save our user using SESSION
        $.ajax({
            method: "post",
            url: baseurl + "/success", 
            data: {"userID" : userID},
            success: function(response){
                if(response == "") window.location.assign(baseurl + "/manage")
                else showError(response)
            }
        });
    }
    else showError(message)
}

//------------------------------Error Display

function hideError(){
    $(error).hide()
}

function showError(message){
    $(error).show()
    $(error).html(message)
}