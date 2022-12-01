$(document).ready( function () {
    var viewItSubjectDB = true;
    $('#viewItSubject').DataTable({
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
                viewItSubjectDB: viewItSubjectDB
            },
            url: "controller/bsit.php", // json datasource
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

// ADD IT SUBJECT BUTTON
$("#addITSubjectButton").click(function(){
    // alert("Success");
    var addITSubjectDB = true;

    var addITSubjectDB  = $("#addITSubjectDB").val();
    var subNum          = $("#addSubNumDB").val();
    var courseCode      = $("#addCourseCodeDB").val();
    var courseName      = $("#addCourseNameDB").val();
    var subLec          = $("#addSubLecDB").val();
    var subLab          = $("#addSubLabDB").val();
    var subUnit         = $("#addSubUnitDB").val();
    var courseID        = $("#input[name='courseID']:checked").val();
    var semester        = $("#addSemesterDB").val();
    var yearLevel       = $("#addYearLevelDB").val();


    $.ajax
    ({
        type: "POST",
        url: "controller/bsit.php",
        data:
        {
            addITSubjectDB   :   addITSubjectDB,
            subNum         : subNum,
            courseCode     : courseCode,
            courseName     : courseName,
            subLec         : subLec,
            subLab         : subLab,
            subUnit        : subUnit,
            courseID       : courseID,
            semester       : semester,
            yearLevel      : yearLevel,

        },
        async: false,
        success: function(response)
        {
            alert("Subject Added Successfully");
            location.reload();
        },
        error: function(response)
        {
            console.log(response);
        }
    });

});

// SHOW IT EDIT FORM
function showITEditForm(subNum){
    // alert("Show Edit");
    var showITEditDB = true;
    // alert(subNum);

    // Clearing Edit Forms
    $('#editCourseCode').val();
    $('#editCourseName').val();
    $('#editSubLec').val();
    $('#editSubLab').val();
    $('#editSubUnit').val();
    $('editCourseID').val();
    $('#editSemester').val();
    $('#editYearLevel').val();
  

    $("input[name='editCourseID']:radio[value='1']").attr("checked", false);
    $("input[name='editCourseID']:radio[value='2']").attr("checked", false);
    $("input[name='editCourseID']:radio[value='3']").attr("checked", false);
    $("input[name='editCourseID']:radio[value='4']").attr("checked", false);
    
    
    $.ajax
    ({
        type: "POST",
        url: "controller/bsit.php",
        data:
        {
            showITEditDB  :   showITEditDB,
            subNum      :   subNum,
        },
        async: false,
        success: function(response)
        {

            var subData = $.parseJSON(response);

            $('#editSubNum').val(subData.subNum);
            $('#editCourseCode').val(subData.courseCode);
            $('#editCourseName').val(subData.courseName);
            $('#editSubLec').val(subData.subLec);
            $('#editSubLab').val(subData.subLab);
            $('#editSubUnit').val(subData.subUnit);
            $('#editCourseID').val(subData.courseID);
            $('#editSemester').val(subData.semester);
            $('#editYearLevel').val(subData.yearLevel);

            // alert(roomData.roomType)
            if(subData.courseID==1){
                $("input[name='editCourseID']:radio[value='1']").attr("checked", true);
            }
            else if(subData.courseID==2){
                $("input[name='editCourseID']:radio[value='2']").attr("checked", true);
            }
            else if(subData.courseID==3){
                $("input[name='editCourseID']:radio[value='3']").attr("checked", true);
            }
            else if(subData.courseID==4){
                $("input[name='editCourseID']:radio[value='4']").attr("checked", true);
            }
           

            $('#editITSubjectModal').modal('toggle');
        },
        error: function(response)
        {
            console.log(response);
        }
    });

}

// EDIT SUBJECT BUTTON
$("#editITSubjectButton").click(function(){
    // alert("Success");
    var editITSubjectDB = true;

    var editITSubjectDB     = $("#editITSubjectDB").val();
    var subNum          = $("#addSubNumDB").val();
    var courseCode      = $("#addCourseCodeDB").val();
    var courseName      = $("#addCourseNameDB").val();
    var subLec          = $("#addSubLecDB").val();
    var subLab          = $("#addSubLabDB").val();
    var subUnit         = $("#addSubUnitDB").val();
    var courseID        = $("#input[name='editCourseID']:checked").val();
    var semester        = $("#addSemesterDB").val();
    var yearLevel       = $("#addYearLevelDB").val();


    // alert(roomType);
    $.ajax
    ({
        type: "POST",
        url: "controller/bsit.php",
        data:
        {
            editITSubjectDB  :   editITSubjectDB,
            subNum         : subNum,
            courseCode     : courseCode,
            courseName     : courseName,
            subLec         : subLec,
            subLab         : subLab,
            subUnit        : subUnit,
            courseID       : courseID,
            semester       : semester,
            yearLevel      : yearLevel,
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


// SHOW DELETE ROOM
function showITDeleteForm(subNum){
    // alert("Show Edit");
    var showITEditDB = true;
    // alert(roomNum);
    $.ajax
    ({
        type: "POST",
        url: "controller/bsit.php",
        data:
        {
            showITEditDB  :   showITEditDB,
            subNum     :   subNum,
        },
        async: false,
        success: function(response)
        {
            
            var subData = $.parseJSON(response);
            // console.log(response);
            var deleteDB = true;

            if(confirm("Are you sure you want to delete the subject " + subData.courseName +"? This cannot be undone.")){
                $.ajax
                ({
                    type: "POST",
                    url: "controller/bsit.php",
                    data:
                    {
                        deleteDB    :   deleteDB,
                        subNum     :   subNum,
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
