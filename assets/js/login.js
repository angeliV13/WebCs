//Login BUTTON
$("#loginAccount").click(function(){
    // alert("Success");
    var loginAccountDB = true;

    var userName  = $("#userName").val();
    var userPassword   = $("#userPassword").val();
    
    $.ajax({
        type: "POST",
        url: "controller/login.php",
        data:
        {
            loginAccountDB  :   loginAccountDB,
            userName        :   userName,
            userPassword    :   userPassword,
        },
        success: function(response){
            console.log(response);
            if(response==1){
                alert("Login Success");
                window.location = window.location.href.split('?')[0];
            }
            else{
                alert("Username/Password is incorrect");
                window.location.reload();
            }
            
        },
        error: function(e){
            console.log(e);
        }
    });

});
