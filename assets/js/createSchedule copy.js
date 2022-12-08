$(document).ready( function () {
    
    var scheduleCreateSelection = true;
    
    var semester = 1;
    var academicYear = 1;
    var section = 1;

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
    var getSection = $('#section').find(":selected").val();
    var getSemester = $('#semester').find(":selected").val();
    var getAcadYear = $('#academicYear').find(":selected").val();
    // console.log(getSemester);

    if(getSection>0){
        $('#showToolbar').removeClass('d-none');

        var getSubjectDB = true;


        $.ajax({
            type: "POST",
            url: "controller/createSchedule.php",
            data:
            {
                getSubjectDB    :   getSubjectDB,
                getSection      :   getSection,
                getSemester     :   getSemester,
                getAcadYear     :   getAcadYear,
            },
            async: false,
            success: function(response)
            {
                var subjectArray = JSON.parse(response);
                console.log(subjectArray);
                
                $('#subjects').empty();
                
                for (subj in subjectArray) { 
                    if(subjectArray[subj].subLab>0){
                        $('#subject').append('<option value="' + sectionArray[sec].secNum + '">' + sectionArray[sec].secName + '</option>');
                        $('#subjects').append('<a href="#createSchedCarousel" class="c'+ subjectArray[subj].subLab +'" role="button" data-slide="next" id="lab'+subjectArray[subj].courseCode+'"\
                        onclick="dropSub(\''+subjectArray[subj].courseCode+ '\',\'lab\','+ subjectArray[subj].subLab +',\''+subjectArray[subj].subType+ '\')">\
                            <div class="col-xl-12 col-md-12 mb-4">\
                                <div class="card border-left-success shadow h-100 py-1">\
                                    <div class="card-body">\
                                        <div class="row no-gutters align-items-center">\
                                            <div class="col mr-2">\
                                                <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">\
                                                    '+ subjectArray[subj].courseCode +'</div>\
                                                <div class="text-xs font-weight-light text-secondary text-uppercase mb-1">\
                                                    '+ subjectArray[subj].courseName +'</div>\
                                            </div>\
                                            <div class="col-auto">\
                                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">\
                                                    Laboratory</div>\
                                                <div class="text-xs font-weight-light text-secondary text-uppercase mb-1">\
                                                    '+ subjectArray[subj].subLab +' hours</div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </a>');
                    }
                    if(subjectArray[subj].subLec>0){
                        $('#subjects').append('<a href="#createSchedCarousel" class="c'+ subjectArray[subj].subLec +'" role="button" data-slide="next" id="lec'+subjectArray[subj].courseCode+'"\
                        onclick="dropSub(\''+subjectArray[subj].courseCode+ '\',\'lec\','+ subjectArray[subj].subLec +',\''+subjectArray[subj].subType+ '\')">\
                            <div class="col-xl-12 col-md-12 mb-4">\
                                <div class="card border-left-warning shadow h-100 py-1">\
                                    <div class="card-body">\
                                        <div class="row no-gutters align-items-center">\
                                            <div class="col mr-2">\
                                                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">\
                                                    '+ subjectArray[subj].courseCode +'</div>\
                                                <div class="text-xs font-weight-light text-secondary text-uppercase mb-1">\
                                                    '+ subjectArray[subj].courseName +'</div>\
                                            </div>\
                                            <div class="col-auto">\
                                                <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">\
                                                    Lecture</div>\
                                                <div class="text-xs font-weight-light text-secondary text-uppercase mb-1">\
                                                    '+ subjectArray[subj].subLec +' hours</div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </a>');
                    }
                }
                
            },
            error: function(response)
            {
                console.log(response);
            }
        });
    }
    else{
        alert("No Section is Selected");
        $('#createSchedCarousel').removeClass('d-none');
        $('#createSchedCarousel').addClass('d-none');
    }
});

function dropSub(courseCode, courseDelivery, hours, subType){
    var checkAvailRoom = true;
    var getSemester = $('#semester').find(":selected").val();
    var getAcadYear = $('#academicYear').find(":selected").val();

    $.ajax({
        type: "POST",
        url: "controller/createSchedule.php",
        data:
        {
            checkAvailRoom  :   checkAvailRoom,
            getSemester     :   getSemester,
            getAcadYear     :   getAcadYear,
            courseCode      :   courseCode,
            courseDelivery  :   courseDelivery,
            hours           :   hours,
        },
        async: false,
        success: function(response)
        {   
            try{
                schedDataArray = JSON.parse(response);
                console.log(schedDataArray);

                $('#rooms').empty();
                for(count in schedDataArray){
                    $('#rooms').append('<a href="#createSchedCarousel" role="button" data-slide="next" id="room'+schedDataArray[count][0][0]+'"\
                    onclick="getCheck(\''+courseCode+ '\','+ hours +',\''+schedDataArray[count][0][0]+ '\', \''+subType+'\', \''+getSemester+'\', \''+getAcadYear+'\', \''+courseDelivery+'\')"\
                        <div class="col-xl-12 col-md-12 mb-4">\
                            <div class="card border-left-success shadow h-100 py-1">\
                                <div class="card-body">\
                                    <div class="row no-gutters align-items-center">\
                                        <div class="col mr-2">\
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">\
                                                '+ schedDataArray[count][0][3] +'</div>\
                                            <div class="text-xs font-weight-light text-secondary text-uppercase mb-1">\
                                                '+ schedDataArray[count][0][4] +'</div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </a>');
                }

                // dropRoom(schedDataArray, courseCode, courseDelivery, hours, getSemester, getAcadYear);
            }
            catch(e){
                console.log(response);
                console.log(e);
            }
            
        }
    });
}

function getCheck(courseCode, hours, roomNum, subType, getSemester, getAcadYear, courseDelivery){
    var checkAvailFac = true;

    $.ajax({
        type: "POST",
        url: "controller/createSchedule.php",
        data:
        {
            checkAvailFac   :   checkAvailFac,
            getSemester     :   getSemester,
            getAcadYear     :   getAcadYear,
            courseCode      :   courseCode,
            hours           :   hours,
            courseDelivery  :   courseDelivery,
            roomNum         :   roomNum
        },
        async: false,
        success: function(response)
        {   
            try{
                schedDataArray = JSON.parse(response);
                console.log(schedDataArray);

                $('#faculty').empty();
                for(count in schedDataArray){
                    $('#faculty').append('<a href="#createSchedCarousel" role="button" id="fac'+schedDataArray[count][2][0]+'"\
                    onclick="showCheck(\''+courseCode+ '\','+ hours +',\''+schedDataArray[count][2][0]+ '\' ,\''+subType+'\', \''+getSemester+'\', \''+getAcadYear+'\', \''+courseDelivery+'\',\''+roomNum+ '\')"\
                        <div class="col-xl-12 col-md-12 mb-4">\
                            <div class="card border-left-success shadow h-100 py-1">\
                                <div class="card-body">\
                                    <div class="row no-gutters align-items-center">\
                                        <div class="col mr-2">\
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">\
                                                '+ schedDataArray[count][2][2] +'</div>\
                                            <div class="text-xs font-weight-light text-secondary text-uppercase mb-1">\
                                                '+ schedDataArray[count][2][3] +'</div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </a>');
                }
                // dropRoom(schedDataArray, courseCode, courseDelivery, hours, getSemester, getAcadYear);
            }
            catch(e){
                console.log(response);
                console.log(e);
            }
            
        }
    });
}

function showCheck(courseCode, hours, facNum, subType, getSemester, getAcadYear, courseDelivery, roomNum){
    var checkAvailFac = true;
    var numItems = $('.myHour:checkbox:checked').map(function() {
        return this.value;
    }).get(); 


    $.ajax({
        type: "POST",
        url: "controller/createSchedule.php",
        data:
        {
            checkAvailFac   :   checkAvailFac,
            getSemester     :   getSemester,
            getAcadYear     :   getAcadYear,
            courseCode      :   courseCode,
            hours           :   hours,
            courseDelivery  :   courseDelivery,
            roomNum         :   roomNum,
            facNum          :   facNum,
            numItems        :   numItems,
        },
        async: false,
        success: function(response)
        {   
            


            // try{
            //     var checkDataArray = JSON.parse(response);
            //     var dayAdd = 0;
            //     var dayString = "";
            //     var timeAdd = 0;
            //     var timeString = "";
            //     console.log(checkDataArray);

            //     console.log("START");
            //     for(days in checkDataArray[0][1]){
            //         console.log(checkDataArray[0][1][days]);
            //         dayAdd = (parseInt(days) + 1);
            //         dayString = dayAdd.toString();
            //         for(times in checkDataArray[0][1][days]){
            //             timeAdd = (parseInt(times) - 1);
            //             timeString = timeAdd.toString();

            //             $('#d'+dayString+'-'+timeString+'').append('<div class="form-check">\
            //             <input class="form-check-input" type="checkbox" value="#d'+dayString+'-'+timeString+'" id="flexCheckDefault">\
            //           </div>');
            //         //   console.log('#d'+dayString+'-'+timeString+'');
            //         }
            //     }
            //     // dropRoom(schedDataArray, courseCode, courseDelivery, hours, getSemester, getAcadYear);
            // }
            // catch(e){
            //     console.log(response);
            //     console.log(e);
            // }
            
        }
    });
}


$('.myHour').click(function(){
    var numItems = $('.myHour:checkbox:checked').map(function() {
        return this.value;
    }).get();  
});