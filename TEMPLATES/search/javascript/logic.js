//console.log("search's logic file loaded (hopefully after connection)")
$("#logoutButton").click(function(){
    $.ajax({
        method : "post",
        url: baseurl + "/logout",
        dataType: "text",
        success: function (response) {
            window.location.replace(baseurl + "/")
        }
    });
})