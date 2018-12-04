/*-------------------------show hide password-------------------------*/

$(".passwordShowHide > .input-group > .input-group-append > .showHide").on("click", function(){
    var showEye = $(".passwordShowHide > .input-group > .input-group-append > .showHide > .show")
    var hideEye = $(".passwordShowHide > .input-group > .input-group-append > .showHide > .hide")
    var password = $(".passwordShowHide > .input-group > input")

    console.log("show " + $(showEye).css("display"))
    console.log("hide " + $(hideEye).css("display"))
    if($(showEye).css("display") == "none"){ //user wants to hide
        $(password).attr('type', 'password')
        $(hideEye).css("display","none")
        $(showEye).css("display", "inline-block")
    }
    else { //user wants to show
        $(password).attr('type', 'text')
        $(showEye).css("display","none")
        $(hideEye).css("display", "inline-block")
    }
})