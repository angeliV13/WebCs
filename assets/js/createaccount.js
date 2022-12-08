$(document).ready( function () {
    var checkDB = true;
    $('#viewCreateAccount').DataTable({
        lengthChange: false,
        searching: false,
        processing: true,
        ordering: false,
        serverSide: true,
        bInfo: false,
        ajax: {
            data: 
            {
                checkDB: checkDB
            },
            url: "controller/createAccount.php", // json datasource
            type: "POST", // method  , by default get
        
        error: function () {
            // error handling
        },
        },
        createdRow    : function( row, data, index ) {
        },
        columnDefs: [],
        fixedColumns: true,
        deferRender: true,
        scroller: {
        loadingIndicator: true,
        },
        stateSave: false,
    });
});

    //Create Account BUTTON
$("#createAccountButton").click(function(){
    // alert("Success");
    var createAccountDB = true;
    
    var accountNum  =  $("#accountNum").val();
    var accountFName  = $("#accountFName").val();
    var accountMName   = $("#accountMName").val();
    var accountLName   = $("#accountLName").val();
    var employeeID   = $("#employeeID").val();
    var emailAddress   = $("#emailAddress").val();
    var createPassword   = $("#createPassword").val();
    
    $.ajax({
        type: "POST",
        url: "controller/createAccount.php",
        data:
        {
            createAccountDB  :   createAccountDB,
            accountNum       :   accountNum,
            accountFName     :   accountFName,
            accountMName     :   accountMName,
            accountLName     :   accountLName,
            employeeID       :   employeeID,
            emailAddress     :   emailAddress,
            createPassword  :   createPassword,
        },
        success: function(response){
            console.log(response);
            if(response==0){
                alert("Create Account Success");
                window.location = window.location.href.split('?')[0];
            }
            else{
                alert("Create Account unsuccess");
                window.location.reload();
            }
            
        },
        error: function(e){
            console.log(e);
        }
    });

});
