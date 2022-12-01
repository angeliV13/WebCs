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
    
    var subNum          = $ ("#addsubNum").val();
    var courseCode      = $("#addcourseCode").val();
    var courseName      = $("#addcourseName").val();
    var subLec          = $("#addsubLec").val();
    var subLab          = $("#addsubLab").val();
    var subUnit         = $("#addsubUnit").val();
    var courseID        = $("#addcourseID").val();
    var semester        = $("#addsemester").val();
    var yearLevel       = $("#addyearLevel").val();


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
            // console.log(response);
            alert("Subject Added Successfully");
            location.reload();
        },
        error: function(response)
        {
            console.log(response);
        }
    });

});

// SHOW EDIT SUBJECTS
function showITEditForm(subNum){
    // alert("Show Edit");
    var showITEditDB = true;
    // alert(subNum);

    // Clearing Edit Forms
    $('#editsubNum').val();
    $('#editcourseCode').val();
    $('#editcourseName').val();
    $('#editsubLec').val();
    $('#editsubLab').val();
    $('#editsubUnit').val();
    $('editcourseID').val();
    $('#editsemester').val();
    $('#edityearLevel').val();

    $("input[name='editsemester']:radio[value='1']").attr("checked", false);
    $("input[name='editsemester']:radio[value='2']").attr("checked", false);

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
            $('#editsubNum').val(subData.subNum);
            $('#editcourseCode').val(subData.courseCode);
            $('#editcourseName').val(subData.courseName);
            $('#editsubLec').val(subData.subLec);
            $('#editsubLab').val(subData.subLab);
            $('#editsubUnit').val(subData.subUnit);
            $('#editcourseID').val(subData.courseID);
            $('#editsemester').val(subData.semester);
            $('#edityearLevel').val(subData.yearLevel);

            if(subData.semester==1){
                $("input[name='editsemester']:radio[value='1']").attr("checked", true);
            }
            else if(subData.semester==2){
                $("input[name='editsemester']:radio[value='2']").attr("checked", true);
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

    var subNum          = $("#editsubNum").val();
    var courseCode      = $("#editcourseCode").val();
    var courseName      = $("#editcourseName").val();
    var subLec          = $("#editsubLec").val();
    var subLab          = $("#editsubLab").val();
    var subUnit         = $("#editsubUnit").val();
    var courseID        = $("#editcourseID").val();
    var semester        = $("#editsemester").val();
    var yearLevel       = $("#edityearLevel").val();

    // alert(roomType);
    $.ajax
    ({
        type: "POST",
        url: "controller/bsit.php",
        data:
        {
            editITSubjectDB  :   editITSubjectDB,
            subNum          : subNum,
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
            // console.log(response);
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
            var deleteSubjectDB = true;

            if(confirm("Are you sure you want to delete the subject " + subData.subNum +"? This cannot be undone.")){
                $.ajax
                ({
                    type: "POST",
                    url: "controller/bsit.php",
                    data:
                    {
                        deleteSubjectDB    :   deleteSubjectDB,
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
