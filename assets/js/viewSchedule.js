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
                $('#academicYearView').append('<option value="' + acadYearArray[ay].ayID + '">' + acadYearArray[ay].ayName + '</option>');
            }

            for (sem in semesterArray) { 
                // console.log(semesterArray)
                $('#semesterView').append('<option value="' + semesterArray[sem].semesterNum + '">' + semesterArray[sem].semesterName + '</option>');
            }

            for (sec in sectionArray) { 
                // console.log(sectionArray)
                $('#sectionView').append('<option value="' + sectionArray[sec].secNum + '">' + sectionArray[sec].secName + '</option>');
            }
            
        },
        error: function(response)
        {
            console.log(response);
        }
    });
});

$('#viewSectionSchedule').click(function(){
    var getSection = $('#sectionView').find(":selected").val();
    var getSemester = $('#semesterView').find(":selected").val();
    var getAcadYear = $('#academicYearView').find(":selected").val();
    // console.log(getSemester);

    if(getSection>0){

        var getScheduleDB = true;


        $.ajax({
            type: "POST",
            url: "controller/createSchedule.php",
            data:
            {
                getScheduleDB    :   getScheduleDB,
                getSection      :   getSection,
                getSemester     :   getSemester,
                getAcadYear     :   getAcadYear,
            },
            async: false,
            success: function(response)
            {
                var subjectArray = JSON.parse(response);
                console.log(subjectArray);
                
                
                
            },
            error: function(e)
            {
                console.log(e);
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
            facNum          :   facNum
        },
        async: false,
        success: function(response)
        {   
            try{
                var checkDataArray = JSON.parse(response);
                var dayAdd = 0;
                var dayString = "";
                var timeAdd = 0;
                var timeString = "";
                console.log(checkDataArray);

                console.log("START");
                for(days in checkDataArray[0][1]){
                    console.log(checkDataArray[0][1][days]);
                    dayAdd = (parseInt(days) + 1);
                    dayString = dayAdd.toString();
                    for(times in checkDataArray[0][1][days]){
                        timeAdd = (parseInt(times) - 1);
                        timeString = timeAdd.toString();

                        $('#d'+dayString+'-'+timeString+'').append('<div class="form-check">\
                        <input class="form-check-input" type="checkbox" value="#d'+dayString+'-'+timeString+'" id="flexCheckDefault">\
                      </div>');
                    //   console.log('#d'+dayString+'-'+timeString+'');
                    }
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


$('.myHour').click(function(){
    var numItems = $('.myHour:checkbox:checked').map(function() {
        return this.value;
    }).get();
    
    
});