$(document).ready( function () {
    var viewCsSubjectDB = true;
    $('#viewCsSubject').DataTable({
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
                viewCsSubjectDB: viewCsSubjectDB
            },
            url: "controller/bscs.php", // json datasource
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
$("#addSubjectButton").click(function(){
    // alert("Success");
    var addSubjectDB = true;

    var addSubjectDB  = $("#addSubjectDB").val();
    var subNum          = $("#addSubNumDB").val();
    var courseCode      = $("#addCourseCodeDB").val();
    var courseName      = $("#addCourseNameDB").val();
    var subLec          = $("#addSubLecDB").val();
    var subLab          = $("#addSubLabDB").val();
    var subUnit         = $("#addSubUnitDB").val();
    var courseID        = $("#addCourseIDDB").val();
    var semester        = $("#addSemesterDB").val();
    var yearLevel       = $("#addYearLevelDB").val();

    $.ajax
    ({
        type: "POST",
        url: "controller/bscs.php",
        data:
        {
            addSubjectDB :   addSubjectDB,
            subNum         : subNum,
            courseCode     : courseCode,
            courseName     : courseName,
            subLec         : subLec,
            subLab         : subLab,
            subUnit        : subUnit,
            courseID       : courseID,
            semester       : semester,

            yearLevel : yearLevel,
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

// SHOW EDIT Subjects
function showCsEditForm(subNum){
    // alert("Show Edit");
    var showCsEditDB = true;
    // alert(subNum);

    // Clearing Edit Forms
    $('#editSubNum').val();
    $('#editCourseCode').val();
    $('#editCourseName').val();
    $('#editSubLec').val();
    $('#editSubLab').val();
    $('#editSubUnit').val();
    $('editCourseID').val();
    $('#editSemester').val();
    $('#editYearLevel').val();

    $("input[name='editsubType']:radio[value='1']").attr("checked", false);
    $("input[name='editsubType']:radio[value='2']").attr("checked", false);
    $("input[name='editsubType']:radio[value='3']").attr("checked", false);
    $("input[name='editsubType']:radio[value='4']").attr("checked", false);
    $("input[name='editsubType']:radio[value='5']").attr("checked", false);
    $("input[name='editsubType']:radio[value='6']").attr("checked", false);
    $("input[name='editsubType']:radio[value='7']").attr("checked", false);
    $("input[name='editsubType']:radio[value='8']").attr("checked", false);


    $.ajax
    ({
        type: "POST",
        url: "controller/bscs.php",
        data:
        {
            showCsEditDB  :   showCsEditDB,
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
           
           
            // // alert(roomData.roomType)
            // if(subData.subType==1){
            //     $("input[name='editsubType']:radio[value='1']").attr("checked", true);
            // }
            // else if(subData.subType==2){
            //     $("input[name='editsubType']:radio[value='2']").attr("checked", true);
            // }
            // else if(subType.subType==3){
            //     $("input[name='editsubType']:radio[value='3']").attr("checked", true);
            // }
            // else if(subType.subType==3){
            //     $("input[name='editsubType']:radio[value='3']").attr("checked", true);
            // }
            // else if(subType.subType==3){
            //     $("input[name='editsubType']:radio[value='3']").attr("checked", true);
            // }
            // else if(subType.subType==3){
            //     $("input[name='editsubType']:radio[value='3']").attr("checked", true);
            // }
            // else if(subType.subType==3){
            //     $("input[name='editsubType']:radio[value='3']").attr("checked", true);
            // }
            // else if(subType.subType==3){
            //     $("input[name='editsubType']:radio[value='3']").attr("checked", true);
            // }
            // else if(subType.subType==3){
            //     $("input[name='editsubType']:radio[value='3']").attr("checked", true);
            // }

            $('#editCsSubjectModal').modal('toggle');
        },
        error: function(response)
        {
            console.log(response);
        }
    });

}
// SHOW DELETE ROOM
function showCsDeleteForm(subNum){
    // alert("Show Edit");
    var showCsEditDB = true;
    // alert(roomNum);
    
    $.ajax
    ({
        type: "POST",
        url: "controller/bscs.php",
        data:
        {
            showCsEditDB  :   showCsEditDB,
            subNum     :   subNum,
        },
        async: false,
        success: function(response)
        {
            var subData = $.parseJSON(response);
            // console.log(response);
            var deleteDB = true;

            if(confirm("Are you sure you want to delete this " + subData.courseName +" ? It cannot be undone.")){
                $.ajax
                ({
                    type: "POST",
                    url: "controller/bscs.php",
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
