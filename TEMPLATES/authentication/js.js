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
    message = checkEmail() + checkIfEmpty(password, "password")
    if(message == ""){
        hideError()

        //try to login (error checks will be done on server)
        /*
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
        */
    }
    else{
        showError(message)
    }
}

function signUp(){
    message = checkIfEmpty(name, "name") + checkEmail() + checkIfEmpty(password, "password") + checkIfEmpty(confirmPassword, "password confirmation")
    if(message == ""){
        hideError()

        //try to signup (error checks will be done on server)
        /*
        $.ajax({
            method: "post",
            url: baseurl + "/register_verification",
            data: {"name" : registerName,
                    "email" : registerEmail,
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
        */
    }
    else{
        showError(message)
    }
}

function mysterymethod(userID){
    $.ajax({
        method: "post",
        url: baseurl + "/success_login",
        data: {"userID" : userID},
        dataType: "text",
        success: function (r) {
            //$("body").html(r)
            //$("p").attr("userid",userID) //Assigns the tag the current user's ID. Not sure how we can use this yet.
            window.location(baseurl + "/")
        }
    });
}

//------------------------------Error Management

function hideError(){
    $(error).hide()
}

function showError(message){
    $(error).clear()
    $(error).text(message)
}

//------------------------------Client Side Error Checking

function checkIfEmpty(elem, elemName){
    if(isEmpty(elem)) return "You forgot your " + elemName + "\n"
    else return ""
}

function checkEmail(){
    if(isEmpty(email)) return "You forgot your email\n"
    else if(validate($(email).text()) == false) return "You didn't plug in a valid email\n"
    else return ""
}

function checkPasswordMatch(){
    if($(password).text() == $(confirmPassword).text()) return ""
    else return "Your passwords don't match\n"
}

function isEmpty(elem){
    if($(elem).text() == "") return true
    else false
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}