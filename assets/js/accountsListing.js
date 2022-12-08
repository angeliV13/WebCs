$(document).ready( function () {
    // alert("hakdog");
    var viewAccountAccountListingDB = true;
    $('#viewAccountsListing').DataTable({
        lengthChange: true,
        searching: true,
        // ordering: false,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
        bInfo: false,
        ajax: {
            data:
            {
                viewAccountAccountListingDB : viewAccountAccountListingDB
            },
            url: "controller/accountsListing.php", // json datasource
            type: "POST", // method  , by default get

            error: function (e)
            {
                // error handling
                console.log(e)
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


// ADD ROOM BUTTON
$("#addAccountAccountsListingButton").click(function(){
    // alert("Success");
    var addAccountAccountsListingDB = true;
    var accountNum =  $("#addaccountNum").val(); 
    var accountFName  = $("#addaccountFName").val(); 
    var accountMName = $("#addaccountMName").val();
    var accountLName = $("#addaccountLName").val();
    var accountID = $("#addaccountID").val();
    var emailAddress = $("#addemailAddress").val();
    var position = $("#addposition").val();
  
    $.ajax
    ({
        type: "POST",
        url: "controller/accountsListing.php",
        data:
        {
            addAccountAccountsListingDB   :   addAccountAccountsListingDB,

            accountNum   : accountNum,
            accountFName : accountFName,
            accountMName : accountMName,
            accountLName : accountLName,
            accountID  :   accountID,
            emailAddress    :   emailAddress,
            // accountActive:  accountActive,
            position : position,
            
        },
        async: false,
        success: function(response)
        {
            // console.log(response);
            alert("Account Added Successfully");
            location.reload();
        },
        error: function(response)
        {
            console.log(response);
        }
    });

});


// SHOW EDIT ROOM
function showAccountAccountsListingEditForm(accountNum){
    // alert("Show Edit");
    var showAccountAccountsListingEditDB = true;
    // alert(roomNum);

    // Clearing Edit Forms
    $('#editaccountNum').val(); 
    $('#editaccountFName').val();
    $('#editaccountMName').val();
    $('#editaccountLName').val();
    $('#editaccountID').val();
    $('#editemailAddress').val();
    $('#editposition').val();
    
   

    $.ajax
    ({
        type: "POST",
        url: "controller/accountsListing.php",
        data:
        {
            showAccountAccountsListingEditDB  :   showAccountAccountsListingEditDB,
            accountNum      :   accountNum,
        },
        async: false,
        success: function(response)
        {

            var accountData = $.parseJSON(response);
            $('#editaccountNum').val(accountData.accountNum); 
            $('#editaccountFName').val(accountData.accountFName);
            $('#editaccountMName').val(accountData.accountMName);
            $('#editaccountLName').val(accountData.accountLName);
            $('#editaccountID').val(accountData.accountID);
            $('#editemailAddress').val(accountData.emailAddress);
            $('#editposition').val(accountData.position);


            $('#editAccountAccountsListingModal').modal('toggle');
        },
        error: function(response)
        {
            console.log(response);
        }
    });
}
// EDIT FACULTY BUTTON
$("#editAccountAccountsListingButton").click(function(){
    // alert("Success");
    var editAccountAccountsListingDB = true;

    var accountNum   = $("#editaccountNum").val();
    var accountFName  = $("#editaccountFName").val(); 
    var accountMName = $("#editaccountMName").val();
    var accountLName = $("#editaccountLName").val();
    var accountID = $("#editaccountID").val();
    var emailAddress = $("#editemailAddress").val();
    var position = $("#editposition").val();
    // alert(roomType);
    $.ajax
    ({
        type: "POST",
        url: "controller/accountsListing.php",
        data:
        {
            editAccountAccountsListingDB   :   editAccountAccountsListingDB,
            accountNum   : accountNum,
            accountFName : accountFName,
            accountMName : accountMName,
            accountLName : accountLName,
            accountID  :   accountID,
            emailAddress    :   emailAddress,
            position : position,
            
        },
        async: false,
        success: function(response)
        {
            // console.log(response);
            alert("Update Successfully");
            location.reload();
        },
        error: function(response)
        {
            console.log(response);
        }
    });

});

// SHOW delete ROOM
function showAccountAccountsListingDeleteForm(accountNum){
    // alert("Show Edit");
    var showAccountAccountsListingEditDB = true;
    // alert(facNum);
    $.ajax
    ({
        type: "POST",
        url: "controller/accountsListing.php",
        data:
        {
            showAccountAccountsListingEditDB  :   showAccountAccountsListingEditDB,
            accountNum     :   accountNum,
        },
        async: false,
        success: function(response)
        {
            // console.log(response);
            var accountData = $.parseJSON(response);
            var deleteAccountAccountsListingDB = true;

            if(confirm("Are you sure you want to delete the account " + accountData.accountID +"? This cannot be undone.")){
                $.ajax
                ({
                    type: "POST",
                    url: "controller/accountsListing.php",
                    data:
                    {
                        deleteAccountAccountsListingDB    :   deleteAccountAccountsListingDB,
                        accountNum     :   accountNum,
                    },
                    async: false,
                    success: function(response)
                    {
                        // console.log(response);
                        alert("Deleted Successfully");
                        location.reload();
                    },
                    error: function(response)
                    {
                        console.log(response);
                    }

                });
            }
        },
        error: function(response)
        {
            console.log(response);
        }
    });
}