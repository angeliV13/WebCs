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

    var addFacultyDB  = $("#addFacultyDB").val();
    var facNum   = $("#addFacNumDB").val();
    var facID    = $("#addFacIDDB").val();
    var facFName  = $("#addFacFNameDB").val();
    var facMName = $("#addFacMNameDB").val();
    var facLName = $("#addFacLNameDB").val();
    var facAvailability = $("#addFacAvailabilityDB").val();

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
            facAvailability : facLAvailability,
        },
        async: false,
        success: function(response)
        {
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
    $("input[name='editRoomType']:radio[value='1']").attr("checked", false);
    $("input[name='editRoomType']:radio[value='2']").attr("checked", false);
    $("input[name='editRoomType']:radio[value='3']").attr("checked", false);
    $("input[name='editRoomType']:radio[value='4']").attr("checked", false);
    $("input[name='editRoomType']:radio[value='5']").attr("checked", false);
    $("input[name='editRoomType']:radio[value='6']").attr("checked", false);
    $("input[name='editRoomType']:radio[value='8']").attr("checked", false);


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
           
            // alert(roomData.roomType)
            if(facData.facType==1){
                $("input[name='editfacType']:radio[value='1']").attr("checked", true);
            }
            else if(facData.facType==2){
                $("input[name='editfacType']:radio[value='2']").attr("checked", true);
            }
            else if(roomData.roomType==3){
                $("input[name='editfacType']:radio[value='3']").attr("checked", true);
            }

            $('#editFacultyModal').modal('toggle');
        },
        error: function(response)
        {
            console.log(response);
        }
    });

}

// EDIT ROOM BUTTON
$("#editFacultyButton").click(function(){
    // alert("Success");
    var editFacultyDB = true;

    var editFacultyDB  = $("#addFacultyDB").val();
    var facNum   = $("#addFacNumDB").val();
    var facID    = $("#addFacIDDB").val();
    var facFName  = $("#addFacFNameDB").val();
    var facMName = $("#addFacMNameDB").val();
    var facLName = $("#addFacLNameDB").val();
    var facAvailability = $("#addFacAvailabilityDB").val();

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
            var deleteDB = true;

            if(confirm("Are you sure you want to delete the faculty " + facultyData.facNum +"? This cannot be undone.")){
                $.ajax
                ({
                    type: "POST",
                    url: "controller/faculty.php",
                    data:
                    {
                        deleteDB    :   deleteDB,
                        facNum     :   facNum,
                    },
                    async: false,
                    success: function(response)
                    {
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