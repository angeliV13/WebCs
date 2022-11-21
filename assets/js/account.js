$(document).ready( function () {
    var checkDB = true;
    $('#viewAccount').DataTable({
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
            url: "controller/account.php", // json datasource
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
        
    
    // $.ajax({
    //     type: "POST",
        
    //     url: "controller/schedule.php",
    //     data: 
    //     {
    //         checkDB: checkDB
    //     },
    //     async: false,
    //     success: function(text) {
    //         response = text;
    //         // alert(response);
    //     }
    // });
}); 