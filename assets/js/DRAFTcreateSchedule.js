$(document).ready( function () {
});


// ADD CREATE SCHEDULE BUTTON
$("#createSchedule").click(function(){
    alert("Success");

    var createScheduleDB = true;

    var itFirst     = $("#itFirst").val();
    var itSecond    = $("#itSecond").val();
    var itBAThird   = $("#itBAThird").val();
    var itNTThird   = $("#itNTThird").val();
    var itSMThird   = $("#itSMThird").val();
    var itBAFourth  = $("#itBAFourth").val();
    var itNTFourth  = $("#itNTFourth").val();
    var itSMFourth  = $("#itSMFourth").val();
    var csFirst     = $("#csFirst").val();
    var csSecond    = $("#csSecond").val();
    var csThird     = $("#csThird").val();
    var csFourth    = $("#csFourth").val();
    
   //select
    var acadYear = $("#acadYear").find('option:selected').val();
    var semester = $("#semester").find('option:selected').val();


    $.ajax
    ({
        type: "POST",
        url: "controller/createSchedule.php",
        data:
        {
            createScheduleDB   :   createScheduleDB,
            itFirst    : itFirst,
            itSecond   : itSecond ,
            itBAThird  : itBAThird,
            itNTThird  : itNTThird,
            itSMThird  : itSMThird,
            itBAFourth : itBAFourth,
            itNTFourth : itNTFourth,
            itSMFourth : itSMFourth,
            csFirst    : csFirst,
            csSecond   : csSecond,
            csThird    : csThird,
            csFourth   : csFourth,
            acadYear   : acadYear,
            semester   : semester,

        },
        async: false,
        success: function(response)
        {
            // console.log(JSON.parse(response));
            console.log(response);
            alert(JSON.parse(response));
        },
        error: function(response)
        {
            console.log(response);
        }
    });

});


// // SHOW EDIT ROOM
// function showEditForm(facNum){
//     // alert("Show Edit");
//     var showEditDB = true;
//     // alert(roomNum);

//     // Clearing Edit Forms
//     $('#editfacNum').val();
//     $('#editfacID').val();
//     $('#editfacType').val();
//     $('#editfacFName').val();
//     $('#editfacMName').val();
//     $('#editfacLName').val();
//     $('#editfacAvailability').val();
//     $("input[name='editRoomType']:radio[value='1']").attr("checked", false);
//     $("input[name='editRoomType']:radio[value='2']").attr("checked", false);
//     $("input[name='editRoomType']:radio[value='3']").attr("checked", false);
//     $("input[name='editRoomType']:radio[value='4']").attr("checked", false);
//     $("input[name='editRoomType']:radio[value='5']").attr("checked", false);
//     $("input[name='editRoomType']:radio[value='6']").attr("checked", false);
//     $("input[name='editRoomType']:radio[value='8']").attr("checked", false);


//     $.ajax
//     ({
//         type: "POST",
//         url: "controller/faculty.php",
//         data:
//         {
//             showEditDB  :   showEditDB,
//             facNum      :   facNum,
//         },
//         async: false,
//         success: function(response)
//         {

//             var facData = $.parseJSON(response);
//             $('#editfacNum').val(facData.facNum);
//             $('#editfacID').val(facData.facID);
//             $('#editfacFName').val(facData.facFName);
//             $('#editfacMName').val(facData.facMName);
//             $('#editfacLName').val(facData.facLName);
//             $('#editfacAvailability').val(facData.facAvailability);
           
//             // alert(roomData.roomType)
//             if(facData.facType==1){
//                 $("input[name='editfacType']:radio[value='1']").attr("checked", true);
//             }
//             else if(facData.facType==2){
//                 $("input[name='editfacType']:radio[value='2']").attr("checked", true);
//             }
//             else if(roomData.roomType==3){
//                 $("input[name='editfacType']:radio[value='3']").attr("checked", true);
//             }

//             $('#editFacultyModal').modal('toggle');
//         },
//         error: function(response)
//         {
//             console.log(response);
//         }
//     });

// }

// // EDIT ROOM BUTTON
// $("#editFacultyButton").click(function(){
//     // alert("Success");
//     var editFacultyDB = true;

//     var addFacultyDB  = $("#addFacultyDB").val();
//     var facNum   = $("#addFacNumDB").val();
//     var facID    = $("#addFacIDDB").val();
//     var facFName  = $("#addFacFNameDB").val();
//     var facMName = $("#addFacMNameDB").val();
//     var facLName = $("#addFacLNameDB").val();
//     var facAvailability = $("#addFacAvailabilityDB").val();

//     // alert(roomType);
//     $.ajax
//     ({
//         type: "POST",
//         url: "controller/room.php",
//         data:
//         {
//             editFacultyDB   :   editFacultyDB,
//             facNum   : facNum,
//             facID    : facID,
//             facFName : facFName,
//             facMName : facMName,
//             facLName : facLName,
//             facAvailability : facLAvailability,
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

// // SHOW EDIT ROOM
// function showDeleteForm(facNum){
//     // alert("Show Edit");
//     var showEditDB = true;
//     // alert(facNum);
//     $.ajax
//     ({
//         type: "POST",
//         url: "controller/faculty.php",
//         data:
//         {
//             showEditDB  :   showEditDB,
//             facNum     :   facNum,
//         },
//         async: false,
//         success: function(response)
//         {

//             var facultyData = $.parseJSON(response);
//             var deleteDB = true;

//             if(confirm("Are you sure you want to delete the faculty " + facultyData.facNum +"? This cannot be undone.")){
//                 $.ajax
//                 ({
//                     type: "POST",
//                     url: "controller/faculty.php",
//                     data:
//                     {
//                         deleteDB    :   deleteDB,
//                         facNum     :   facNum,
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