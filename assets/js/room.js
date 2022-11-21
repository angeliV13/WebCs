$(document).ready( function () {
    var viewRoomDB = true;
    $('#viewRoom').DataTable({
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
                viewRoomDB: viewRoomDB
            },
            url: "controller/room.php", // json datasource
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
$("#addRoomButton").click(function(){
    // alert("Success");
    var addRoomDB = true;

    var roomName = $("#roomName").val();
    var roomLoc = $("#roomLoc").val();
    var roomType = $("input[name='roomType']:checked").val();

    $.ajax
    ({
        type: "POST",
        url: "controller/room.php",
        data:
        {
            addRoomDB   :   addRoomDB,
            roomName    :   roomName,
            roomLoc     :   roomLoc,
            roomType    :   roomType,
        },
        async: false,
        success: function(response)
        {
            alert("Room Added Successfully");
            location.reload();
        },
        error: function(response)
        {
            console.log(response);
        }
    });

});


// SHOW EDIT ROOM
function showEditForm(roomNum){
    // alert("Show Edit");
    var showEditDB = true;
    // alert(roomNum);

    // Clearing Edit Forms
    $('#editRoomNum').val();
    $('#editRoomName').val();
    $('#editRoomLoc').val();
    $("input[name='editRoomType']:radio[value='1']").attr("checked", false);
    $("input[name='editRoomType']:radio[value='2']").attr("checked", false);
    $("input[name='editRoomType']:radio[value='3']").attr("checked", false);


    $.ajax
    ({
        type: "POST",
        url: "controller/room.php",
        data:
        {
            showEditDB  :   showEditDB,
            roomNum      :   roomNum,
        },
        async: false,
        success: function(response)
        {

            var roomData = $.parseJSON(response);
            $('#editRoomNum').val(roomData.roomNum);
            $('#editRoomName').val(roomData.roomName);
            $('#editRoomLoc').val(roomData.roomLocation);
            // alert(roomData.roomType)
            if(roomData.roomType==1){
                $("input[name='editRoomType']:radio[value='1']").attr("checked", true);
            }
            else if(roomData.roomType==2){
                $("input[name='editRoomType']:radio[value='2']").attr("checked", true);
            }
            else if(roomData.roomType==3){
                $("input[name='editRoomType']:radio[value='3']").attr("checked", true);
            }

            $('#editRoomModal').modal('toggle');
        },
        error: function(response)
        {
            console.log(response);
        }
    });

}

// EDIT ROOM BUTTON
$("#editRoomButton").click(function(){
    // alert("Success");
    var editRoomDB = true;

    var roomNum = $("#editRoomNum").val()
    var roomName = $("#editRoomName").val();
    var roomLoc = $("#editRoomLoc").val();
    var roomType = $("input[name='editRoomType']:checked").val();

    // alert(roomType);
    $.ajax
    ({
        type: "POST",
        url: "controller/room.php",
        data:
        {
            editRoomDB  :   editRoomDB,
            roomNum     :   roomNum,
            roomName    :   roomName,
            roomLoc     :   roomLoc,
            roomType    :   roomType,
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

// SHOW EDIT ROOM
function showDeleteForm(roomNum){
    // alert("Show Edit");
    var showEditDB = true;
    // alert(roomNum);
    
    $.ajax
    ({
        type: "POST",
        url: "controller/room.php",
        data:
        {
            showEditDB  :   showEditDB,
            roomNum     :   roomNum,
        },
        async: false,
        success: function(response)
        {

            var roomData = $.parseJSON(response);
            var deleteDB = true;

            if(confirm("Are you sure you want to delete the room " + roomData.roomName +"? This cannot be undone.")){
                $.ajax
                ({
                    type: "POST",
                    url: "controller/room.php",
                    data:
                    {
                        deleteDB    :   deleteDB,
                        roomNum     :   roomNum,
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