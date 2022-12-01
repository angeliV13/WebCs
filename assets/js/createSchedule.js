$(document).ready( function () {
    var scheduleCreate = true;
    
    var semester = 1;
    var academicYear = 1;
    var section = 1;

    $.ajax
    ({
        type: "POST",
        url: "controller/createSchedule.php",
        data:
        {
            scheduleCreate  :   scheduleCreate,
            semester        :   semester,
            academicYear    :   academicYear,
            section         :   section,
        },
        async: false,
        success: function(response)
        {
            var acadYearArray = (JSON.parse(response)[0]);
            var semesterArray = (JSON.parse(response)[1]);
            var sectionArray = (JSON.parse(response)[2]);
            
            for (ay in acadYearArray) { 
                $('#academicYear').append('<option value="' + acadYearArray[ay].ayID + '">' + acadYearArray[ay].ayName + '</option>');
            }

            for (sem in semesterArray) { 
                // console.log(semesterArray)
                $('#semester').append('<option value="' + semesterArray[sem].semesterNum + '">' + semesterArray[sem].semesterName + '</option>');
            }

            for (sec in sectionArray) { 
                // console.log(sectionArray)
                $('#section').append('<option value="' + sectionArray[sec].secNum + '">' + sectionArray[sec].secName + '</option>');
            }
            
        },
        error: function(response)
        {
            console.log(response);
        }
    });
});

$('#selectSection').click(function(){
    var selectedSection = $('#section').find(":selected").val();
    if(selectedSection>0){
        $('#createSchedCarousel').removeAttr('d-none');
        // $.ajax({
        //     type: "POST",
        //     url: "controller/createSchedule.php",
        //     data:
        //     {
        //         scheduleCreate  :   scheduleCreate,
        //         semester        :   semester,
        //         academicYear    :   academicYear,
        //         section         :   section,
        //     },
        //     async: false,
        //     success: function(response)
        //     {
        //         var acadYearArray = (JSON.parse(response)[0]);
        //         var semesterArray = (JSON.parse(response)[1]);
        //         var sectionArray = (JSON.parse(response)[2]);
                
        //         for (ay in acadYearArray) { 
        //             $('#academicYear').append('<option value="' + acadYearArray[ay].ayID + '">' + acadYearArray[ay].ayName + '</option>');
        //         }

        //         for (sem in semesterArray) { 
        //             console.log(semesterArray)
        //             $('#semester').append('<option value="' + semesterArray[sem].semesterNum + '">' + semesterArray[sem].semesterName + '</option>');
        //         }

        //         for (sec in sectionArray) { 
        //             console.log(sectionArray)
        //             $('#section').append('<option value="' + sectionArray[sec].secNum + '">' + sectionArray[sec].secName + '</option>');
        //         }
                
        //     },
        //     error: function(response)
        //     {
        //         console.log(response);
        //     }
        // });
    }
    else{
        alert("No Section is Selected");
        $('#createSchedCarousel').removeAttr('d-none');
        $('#createSchedCarousel').attr('d-none');
    }
});


// ADD ROOM BUTTON
// $("#addRoomButton").click(function(){
//     // alert("Success");
//     var addRoomDB = true;

//     var roomName = $("#roomName").val();
//     var roomLoc = $("#roomLoc").val();
//     var roomType = $("input[name='roomType']:checked").val();

//     $.ajax
//     ({
//         type: "POST",
//         url: "controller/room.php",
//         data:
//         {
//             addRoomDB   :   addRoomDB,
//             roomName    :   roomName,
//             roomLoc     :   roomLoc,
//             roomType    :   roomType,
//         },
//         async: false,
//         success: function(response)
//         {
//             alert("Room Added Successfully");
//             location.reload();
//         },
//         error: function(response)
//         {
//             console.log(response);
//         }
//     });

// });


// // SHOW EDIT ROOM
// function showRoomEditForm(roomNum){
//     // alert("Show Edit");
//     var showRoomEditDB = true;
//     // alert(roomNum);

//     // Clearing Edit Forms
//     $('#editRoomNum').val();
//     $('#editRoomName').val();
//     $('#editRoomLoc').val();
//     $("input[name='editRoomType']:radio[value='1']").attr("checked", false);
//     $("input[name='editRoomType']:radio[value='2']").attr("checked", false);
//     $("input[name='editRoomType']:radio[value='3']").attr("checked", false);


//     $.ajax
//     ({
//         type: "POST",
//         url: "controller/room.php",
//         data:
//         {
//             showRoomEditDB  :   showRoomEditDB,
//             roomNum      :   roomNum,
//         },
//         async: false,
//         success: function(response)
//         {

//             var roomData = $.parseJSON(response);
//             $('#editRoomNum').val(roomData.roomNum);
//             $('#editRoomName').val(roomData.roomName);
//             $('#editRoomLoc').val(roomData.roomLocation);
//             // alert(roomData.roomType)
//             if(roomData.roomType==1){
//                 $("input[name='editRoomType']:radio[value='1']").attr("checked", true);
//             }
//             else if(roomData.roomType==2){
//                 $("input[name='editRoomType']:radio[value='2']").attr("checked", true);
//             }
//             else if(roomData.roomType==3){
//                 $("input[name='editRoomType']:radio[value='3']").attr("checked", true);
//             }

//             $('#editRoomModal').modal('toggle');
//         },
//         error: function(response)
//         {
//             console.log(response);
//         }
//     });

// }

// // EDIT ROOM BUTTON
// $("#editRoomButton").click(function(){
//     // alert("Success");
//     var editRoomDB = true;

//     var roomNum = $("#editRoomNum").val();
//     var roomName = $("#editRoomName").val();
//     var roomLoc = $("#editRoomLoc").val();
//     var roomType = $("input[name='editRoomType']:checked").val();

//     // alert(roomType);
//     $.ajax
//     ({
//         type: "POST",
//         url: "controller/room.php",
//         data:
//         {
//             editRoomDB  :   editRoomDB,
//             roomNum     :   roomNum,
//             roomName    :   roomName,
//             roomLoc     :   roomLoc,
//             roomType    :   roomType,
//         },
//         async: false,
//         success: function(response)
//         {
//             alert("Update Successfully");
//             location.reload();
//         },
//         error: function(response)
//         {
//             console.log(response);
//         }
//     });

// });

// // SHOW DELETE ROOM
// function showRoomDeleteForm(roomNum){
//     // alert("Show Edit");
//     var showRoomEditDB = true;
//     // alert(roomNum);
    
//     $.ajax
//     ({
//         type: "POST",
//         url: "controller/room.php",
//         data:
//         {
//             showRoomEditDB  :   showRoomEditDB,
//             roomNum     :   roomNum,
//         },
//         async: false,
//         success: function(response)
//         {

//             var roomData = $.parseJSON(response);
//             console.log(response);
//             var deleteDB = true;

//             if(confirm("Are you sure you want to delete the room " + roomData.roomName +"? This cannot be undone.")){
//                 $.ajax
//                 ({
//                     type: "POST",
//                     url: "controller/room.php",
//                     data:
//                     {
//                         deleteDB    :   deleteDB,
//                         roomNum     :   roomNum,
//                     },
//                     async: false,
//                     success: function(response)
//                     {
//                         alert("Deleted Successfully");
//                         location.reload();
//                     },
//                     error: function(response)
//                     {
//                         console.log(response);
//                     }

//                 });
//             }
//         },
//         error: function(response)
//         {
//             console.log(response);
//         }
//     });
// }