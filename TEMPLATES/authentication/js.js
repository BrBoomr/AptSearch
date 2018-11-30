//------------------------------Connections-------------------------

var formState = "#formState"
var formCard = "#formCard"
var formBody = "#formBody"
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
    if(isLogin()) logIn()
    else signUp()
})

function logIn(){
    //check for input error
    var message = checkEmail() + checkIfEmpty(password, "password")

    //depeding on input try to login
    if(message == ""){
        //hide the error
        hideError()

        //try to login (error checks will be done on server)
        $.ajax({
            method: "POST",
            url: baseurl + "/login",
            data: {
                "email" : $(email).val(),
                "password" : $(password).val()
            },
            success: function (response) {
                reactToSuccess(response)
            }
        });
    }
    else{
        showError(message)
    }
}

function signUp(){
    //check for input error
    var message = checkIfEmpty(name, "name") 
        + checkEmail() 
        + checkIfEmpty(password, "password") 
        + checkIfEmpty(confirmPassword, "password confirmation") 
        + checkPasswordMatch()

    //depending on input try to sign up
    if(message == ""){
        hideError()

        //try to signup (error checks will be done on server)
        $.ajax({
            method: "POST",
            url: baseurl + "/signup",
            data: {
                "name" : $(name).val(),
                "email" : $(email).val(),
                "password" : $(password).val(),
                "confirmPassword" : $(confirmPassword).val()
            },
            success: function (response) {
                reactToSuccess(response)
            }
        });
    }
    else{
        showError(message)
    }
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

//------------------------------Error Management

function hideError(){
    $(error).hide()
}

function showError(message){
    $(error).show()
    $(error).html(message)
}

//------------------------------Client Side Error Checking

function checkIfEmpty(elem, elemName){
    if(isEmpty(elem)) return "You forgot your " + elemName + "<br>"
    else return ""
}

function checkEmail(){
    if(isEmpty(email)) return "You forgot your email<br>"
    else if(validateEmail($(email).val()) == false) return "You didn't plug in a valid email<br>"
    else return ""
}

function checkPasswordMatch(){
    if($(password).val() == $(confirmPassword).val()) return ""
    else return "Your passwords don't match<br>"
}

function isEmpty(elem){
    if($(elem).val() == "") return true
    else false
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}