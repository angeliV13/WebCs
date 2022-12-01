$(document).ready( function () {
    var viewFacultyDB = true;
    $('#viewFaculty').DataTable({
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
                viewFacultyDB: viewFacultyDB
            },
            url: "controller/faculty.php", // json datasource
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
$("#addFacultyButton").click(function(){
    // alert("Success");
    var addFacultyDB = true;

    var facNum   = $("#addfacNum").val();
    var facID    = $("#addfacID").val();
    var facFName  = $("#addfacFName").val(); 
    var facMName = $("#addfacMName").val();
    var facLName = $("#addfacLName").val();
    var facAvailability = $("addfacAvailability").val();

    $.ajax
    ({
        type: "POST",
        url: "controller/faculty.php",
        data:
        {
            addFacultyDB   :   addFacultyDB,
            facNum   : facNum,
            facID    : facID,
            facFName : facFName,
            facMName : facMName,
            facLName : facLName,
            facAvailability : facAvailability,
        },
        async: false,
        success: function(response)
        {
            // console.log(response);
            alert("Faculty Added Successfully");
            location.reload();
        },
        error: function(response)
        {
            console.log(response);
        }
    });

});


// SHOW EDIT ROOM
function showFacultyEditForm(facNum){
    // alert("Show Edit");
    var showFacultyEditDB = true;
    // alert(roomNum);

    // Clearing Edit Forms
    $('#editfacNum').val(); 
    $('#editfacID').val();
    $('#editfacType').val();
    $('#editfacFName').val();
    $('#editfacMName').val();
    $('#editfacLName').val();
    $('#editfacAvailability').val();
    $("input[name='editfacAvailability']:radio[value='FT']").attr("checked", false);


    $.ajax
    ({
        type: "POST",
        url: "controller/faculty.php",
        data:
        {
            showFacultyEditDB  :   showFacultyEditDB,
            facNum      :   facNum,
        },
        async: false,
        success: function(response)
        {

            var facData = $.parseJSON(response);
            $('#editfacNum').val(facData.facNum);
            $('#editfacID').val(facData.facID);
            $('#editfacFName').val(facData.facFName);
            $('#editfacMName').val(facData.facMName);
            $('#editfacLName').val(facData.facLName);
            $('#editfacAvailability').val(facData.facAvailability);
            $("input[name='editfacAvailability']:radio[value='FT']").attr("checked", true);

            $('#editFacultyModal').modal('toggle');
        },
        error: function(response)
        {
            console.log(response);
        }
    });

}

// EDIT FACULTY BUTTON
$("#editFacultyButton").click(function(){
    // alert("Success");
    var editFacultyDB = true;

    var facNum   = $("#editfacNum").val();
    var facID    = $("#editfacID").val();
    var facFName  = $("#editfacFName").val();
    var facMName = $("#editfacMName").val();
    var facLName = $("#editfacLName").val();
    var facAvailability = $("#editfacAvailability").val();
    // alert(roomType);
    $.ajax
    ({
        type: "POST",
        url: "controller/faculty.php",
        data:
        {
            editFacultyDB   :   editFacultyDB,
            facNum   : facNum,
            facID    : facID,
            facFName : facFName,
            facMName : facMName,
            facLName : facLName,
            facAvailability : facAvailability,
        },
        async: false,
        success: function(response)
        {
            console.log(response);
            // alert("Update Successfully");
            // location.reload();
        },
        error: function(response)
        {
            console.log(response);
        }
    });

});

// SHOW delete ROOM
function showFacultyDeleteForm(facNum){
    // alert("Show Edit");
    var showFacultyEditDB = true;
    // alert(facNum);
    $.ajax
    ({
        type: "POST",
        url: "controller/faculty.php",
        data:
        {
            showFacultyEditDB  :   showFacultyEditDB,
            facNum     :   facNum,
        },
        async: false,
        success: function(response)
        {

            var facultyData = $.parseJSON(response);
            // console.log(response);
            var deleteFacultyDB = true;

            if(confirm("Are you sure you want to delete the faculty " + facultyData.facNum +"? This cannot be undone.")){
                $.ajax
                ({
                    type: "POST",
                    url: "controller/faculty.php",
                    data:
                    {
                        deleteFacultyDB    :   deleteFacultyDB,
                        facNum     :   facNum,
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