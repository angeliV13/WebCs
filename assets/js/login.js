//Login BUTTON
$("#loginAccount").click(function(){
    // alert("Success");
    var loginAccountDB = true;

    var userName  = $("#userName").val();
    var userPassWord   = $("#userPassword").val();
    
    $.ajax({
        type: "POST",
        url: "controller/login.php",
        data:
        {
            loginAccountDB  :   loginAccountDB,
            userName        :   userName,
            userPassword    :   userPassword
        },
        success: function(response)
        {
            // var item = JSON.parse(response);
            console.log(response);
            // location.reload();
        },
        error: function(e)
        {
            console.log(e);
        }
    });

});