$(document).ready( function () {
    
    var scheduleCreateSelection = true;
    
    var semester = 1;
    var academicYear = 1;
    var section = 1;
    var ins = 1;
    var room = 1;

    $.ajax
    ({
        type: "POST",
        url: "controller/createSchedule.php",
        data:
        {
            scheduleCreateSelection  :   scheduleCreateSelection,
            semester        :   semester,
            academicYear    :   academicYear,
            section         :   section,
            ins             :   ins,
            room            :   room
        },
        async: false,
        success: function(response)
        {
            var acadYearArray = (JSON.parse(response)[0]);
            var semesterArray = (JSON.parse(response)[1]);
            var sectionArray = (JSON.parse(response)[2]);
            var insArray = (JSON.parse(response)[3]);
            var rmArray = (JSON.parse(response)[4]);

            console.log("Create");
            console.log(JSON.parse(response));
            
            for (ay in acadYearArray) { 
                $('#academicYear').append('<option value="' + acadYearArray[ay].ayID + '">' + acadYearArray[ay].ayName + '</option>');
            }

            for (sem in semesterArray) { 
                // console.log(semesterArray)
                $('#semester').append('<option value="' + semesterArray[sem].semesterNum + '">' + semesterArray[sem].semesterName + '</option>');
            }

            if($('#section').length){
                for (sec in sectionArray) { 
                    // console.log(sectionArray)
                    $('#section').append('<option value="' + sectionArray[sec].secNum + '">' + sectionArray[sec].secName + '</option>');
                }
            }else if($('#ins').length){
                for (inst in insArray) { 
                    // console.log(sectionArray)
                    $('#ins').append('<option value="' + insArray[inst].facNum + '">' + insArray[inst].facLName +', ' + insArray[inst].facFName + '</option>');
                }
            }else if($('#rooming').length){
                for (rm in rmArray) { 
                    // console.log(sectionArray)
                    $('#rooming').append('<option value="' + rmArray[rm].roomNum + '">' + rmArray[rm].roomName + '</option>');
                }
            }
            
        },
        error: function(response)
        {
            console.log(response);
        }
    });
});

$('#selectSection').click(function(){
    var getSection = $('#section').find(":selected").val();
    var getSemester = $('#semester').find(":selected").val();
    var getAcadYear = $('#academicYear').find(":selected").val();
    // console.log(getSemester);

    if(getSection>0){
        $('#showToolbar').removeClass('d-none');

        var getSubjectDB = true;
        var getRoomsDB = true;
        var getInstructorDB = true;
        var getDataDB = true;


        $.ajax({
            type: "POST",
            url: "controller/createSchedule.php",
            data:
            {   
                getDataDB       :   getDataDB,
                // getSubjectDB    :   getSubjectDB,
                // getRoomsDB      :   getRoomsDB,
                // getInstructorDB :   getInstructorDB,
                getSection      :   getSection,
                getSemester     :   getSemester,
                getAcadYear     :   getAcadYear,
            },
            async: false,
            success: function(response)
            {
                try{
                    var dataArray = JSON.parse(response);
                    console.log(dataArray);
                    
                    $('#subject').empty();
                    $('#room').empty();
                    $('#instructor').empty();

                    $('#selectSection').addClass('d-none');
                    $('#selectSectionUpdate').removeClass('d-none');

                    for (subj in dataArray[2]) { 
                        $('#subject').append('<option value="' + dataArray[2][subj].subNum + '">' + dataArray[2][subj].courseCode + '</option>');
                    }
                    for (room in dataArray[0]) { 
                        $('#room').append('<option value="' + dataArray[0][room][0] + '">' + dataArray[0][room][3] + '</option>');
                    }
                    for (fac in dataArray[1]) { 
                        $('#instructor').append('<option value="' + dataArray[1][fac][0] + '">' + dataArray[1][fac][2] + '</option>');
                    }

                    $('#section').prop('disabled', true);
                    $('#semester').prop('disabled', true);
                    $('#academicYear').prop('disabled', true);
                    

                }
                catch(e){
                    console.log(response);
                    console.log(e);
                }
                
            },
            error: function(e)
            {
                console.log(e);
            }
        });
    }
    else{
        alert("No Section is Selected");
        // $('#createSchedCarousel').removeClass('d-none');
        // $('#createSchedCarousel').addClass('d-none');
    }
});

$('#selectSectionUpdate').click(function(){
    $('#subject').empty();
    $('#room').empty();
    $('#instructor').empty();

    $('#selectSection').removeClass('d-none');
    $('#selectSectionUpdate').addClass('d-none');

    $('#section').prop('disabled', false);
    $('#semester').prop('disabled', false);
    $('#academicYear').prop('disabled', false);
});

// function dropSub(courseCode, courseDelivery, hours, subType){
//     var checkAvailRoom = true;
//     var getSemester = $('#semester').find(":selected").val();
//     var getAcadYear = $('#academicYear').find(":selected").val();

//     $.ajax({
//         type: "POST",
//         url: "controller/createSchedule.php",
//         data:
//         {
//             checkAvailRoom  :   checkAvailRoom,
//             getSemester     :   getSemester,
//             getAcadYear     :   getAcadYear,
//             courseCode      :   courseCode,
//             courseDelivery  :   courseDelivery,
//             hours           :   hours,
//         },
//         async: false,
//         success: function(response)
//         {   
//             try{
//                 schedDataArray = JSON.parse(response);
//                 console.log(schedDataArray);

//                 $('#rooms').empty();
//                 for(count in schedDataArray){
//                     $('#rooms').append('<a href="#createSchedCarousel" role="button" data-slide="next" id="room'+schedDataArray[count][0][0]+'"\
//                     onclick="getCheck(\''+courseCode+ '\','+ hours +',\''+schedDataArray[count][0][0]+ '\', \''+subType+'\', \''+getSemester+'\', \''+getAcadYear+'\', \''+courseDelivery+'\')"\
//                         <div class="col-xl-12 col-md-12 mb-4">\
//                             <div class="card border-left-success shadow h-100 py-1">\
//                                 <div class="card-body">\
//                                     <div class="row no-gutters align-items-center">\
//                                         <div class="col mr-2">\
//                                             <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">\
//                                                 '+ schedDataArray[count][0][3] +'</div>\
//                                             <div class="text-xs font-weight-light text-secondary text-uppercase mb-1">\
//                                                 '+ schedDataArray[count][0][4] +'</div>\
//                                         </div>\
//                                     </div>\
//                                 </div>\
//                             </div>\
//                         </div>\
//                     </a>');
//                 }

//                 // dropRoom(schedDataArray, courseCode, courseDelivery, hours, getSemester, getAcadYear);
//             }
//             catch(e){
//                 console.log(response);
//                 console.log(e);
//             }
            
//         }
//     });
// }

// function getCheck(courseCode, hours, roomNum, subType, getSemester, getAcadYear, courseDelivery){
//     var checkAvailFac = true;

//     $.ajax({
//         type: "POST",
//         url: "controller/createSchedule.php",
//         data:
//         {
//             checkAvailFac   :   checkAvailFac,
//             getSemester     :   getSemester,
//             getAcadYear     :   getAcadYear,
//             courseCode      :   courseCode,
//             hours           :   hours,
//             courseDelivery  :   courseDelivery,
//             roomNum         :   roomNum
//         },
//         async: false,
//         success: function(response)
//         {   
//             try{
//                 schedDataArray = JSON.parse(response);
//                 console.log(schedDataArray);

//                 $('#faculty').empty();
//                 for(count in schedDataArray){
//                     $('#faculty').append('<a href="#createSchedCarousel" role="button" id="fac'+schedDataArray[count][2][0]+'"\
//                     onclick="showCheck(\''+courseCode+ '\','+ hours +',\''+schedDataArray[count][2][0]+ '\' ,\''+subType+'\', \''+getSemester+'\', \''+getAcadYear+'\', \''+courseDelivery+'\',\''+roomNum+ '\')"\
//                         <div class="col-xl-12 col-md-12 mb-4">\
//                             <div class="card border-left-success shadow h-100 py-1">\
//                                 <div class="card-body">\
//                                     <div class="row no-gutters align-items-center">\
//                                         <div class="col mr-2">\
//                                             <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">\
//                                                 '+ schedDataArray[count][2][2] +'</div>\
//                                             <div class="text-xs font-weight-light text-secondary text-uppercase mb-1">\
//                                                 '+ schedDataArray[count][2][3] +'</div>\
//                                         </div>\
//                                     </div>\
//                                 </div>\
//                             </div>\
//                         </div>\
//                     </a>');
//                 }
//                 // dropRoom(schedDataArray, courseCode, courseDelivery, hours, getSemester, getAcadYear);
//             }
//             catch(e){
//                 console.log(response);
//                 console.log(e);
//             }
            
//         }
//     });
// }

// function showCheck(courseCode, hours, facNum, subType, getSemester, getAcadYear, courseDelivery, roomNum){
//     var checkAvailFac = true;
//     var numItems = $('.myHour:checkbox:checked').map(function() {
//         return this.value;
//     }).get(); 


//     $.ajax({
//         type: "POST",
//         url: "controller/createSchedule.php",
//         data:
//         {
//             checkAvailFac   :   checkAvailFac,
//             getSemester     :   getSemester,
//             getAcadYear     :   getAcadYear,
//             courseCode      :   courseCode,
//             hours           :   hours,
//             courseDelivery  :   courseDelivery,
//             roomNum         :   roomNum,
//             facNum          :   facNum,
//             numItems        :   numItems,
//         },
//         async: false,
//         success: function(response)
//         {   
            


//             // try{
//             //     var checkDataArray = JSON.parse(response);
//             //     var dayAdd = 0;
//             //     var dayString = "";
//             //     var timeAdd = 0;
//             //     var timeString = "";
//             //     console.log(checkDataArray);

//             //     console.log("START");
//             //     for(days in checkDataArray[0][1]){
//             //         console.log(checkDataArray[0][1][days]);
//             //         dayAdd = (parseInt(days) + 1);
//             //         dayString = dayAdd.toString();
//             //         for(times in checkDataArray[0][1][days]){
//             //             timeAdd = (parseInt(times) - 1);
//             //             timeString = timeAdd.toString();

//             //             $('#d'+dayString+'-'+timeString+'').append('<div class="form-check">\
//             //             <input class="form-check-input" type="checkbox" value="#d'+dayString+'-'+timeString+'" id="flexCheckDefault">\
//             //           </div>');
//             //         //   console.log('#d'+dayString+'-'+timeString+'');
//             //         }
//             //     }
//             //     // dropRoom(schedDataArray, courseCode, courseDelivery, hours, getSemester, getAcadYear);
//             // }
//             // catch(e){
//             //     console.log(response);
//             //     console.log(e);
//             // }
            
//         }
//     });
// }


$('.myHour').click(function(){
    var numItems = $('.myHour:checkbox:checked').map(function() {
        return this.value;
    }).get();  
});


// $('#insert').click(function(e){
//     e.preventDefault();

//     $('#result').empty();

//     $.post('submit.php', $(this).serialize(), function(data) {
//         $("#result").html(data);
//         // $("#form1")[0].reset();
//         // $("#check").reset();

//     });

// });


$(document).on('submit', '#submitSched', function() {
    $('#result').empty();

    $('#section').prop('disabled', false);
    $('#semester').prop('disabled', false);
    $('#academicYear').prop('disabled', false);

    $.post('submit.php', $(this).serialize(), function(data) {
        $("#result").html(data);
        // $("#form1")[0].reset();
        // $("#check").reset();

    });

    $('#section').prop('disabled', true);
    $('#semester').prop('disabled', true);
    $('#academicYear').prop('disabled', true);

    return false;


});
