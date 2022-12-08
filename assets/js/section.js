$(document).ready( function () {

    var viewSectionDB = true;
    $('#viewSection').DataTable({
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
                viewSectionDB: viewSectionDB
            },
            url: "controller/section.php", // json datasource
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
$("#addSectionButton").click(function(){
    // alert("Success");
    var addSectionDB = true;

    var sectionName = $("#sectionName").val();
    var sectionYearLevel = $("#sectionYearLevel").val();
    var sectionCourse = $("#sectionCourse").val();
    $.ajax
    ({
        type: "POST",
        url: "controller/section.php",
        data:
        {
            addSectionDB   :   addSectionDB,
            sectionName    :   sectionName,
            sectionYearLevel     :   sectionYearLevel,
            sectionCourse    :   sectionCourse,
        },
        async: false,
        success: function(response)
        {
            alert("Section Added Successfully");
            console.log(response);
            location.reload();
        },
        error: function(response)
        {
            console.log(response);
        }
    });

});


// SHOW EDIT ROOM
function showSectionEditForm(sectionNum){
    // alert("Show Edit");
    var showSectionEditDB = true;
    // alert(sectionNum);

    // Clearing Edit Forms
    $('#editSectionNum').val();
    $('#editSectionYearLevel').val();
    $('#editSectionCourse').val();


    $.ajax
    ({
        type: "POST",
        url: "controller/section.php",
        data:
        {
            showSectionEditDB  :   showSectionEditDB,
            sectionNum      :   sectionNum,
        },
        async: false,
        success: function(response)
        {
            try{
                var sectionData = $.parseJSON(response);
                $('#editSectionNum').val(sectionData.secNum);
                $('#editSectionName').val(sectionData.secName);
                $('#editSectionYearLevel').val(sectionData.secYearLevel);
                // alert(sectionData.sectionType)
                $('#editSectionCourse').val(sectionData.courseID);


                $('#editSectionModal').modal('toggle');
            }
            catch(e){
                console.log(response);
                console.log(e);
                
            }
            
        },
        error: function(response)
        {
            console.log(response);
        }
    });

}

// EDIT ROOM BUTTON
$("#editSectionButton").click(function(){
    // alert("Success");
    var editSectionDB = true;

    var sectionNum = $("#editSectionNum").val();
    var sectionName = $("#editSectionName").val();
    var sectionYearLevel = $("#editSectionYearLevel").val();
    var sectionCourse = $("#editSectionCourse").val();

    console.log(sectionNum + " "+ sectionName + " "+sectionYearLevel+ " "+sectionCourse);

    // alert(sectionType);
    $.ajax
    ({
        type: "POST",
        url: "controller/section.php",
        data:
        {
            editSectionDB  :   editSectionDB,
            sectionNum     :   sectionNum,
            sectionName    :   sectionName,
            sectionYearLevel     :   sectionYearLevel,
            sectionCourse    :   sectionCourse,
        },
        async: false,
        success: function(response)
        {
            console.log(response);
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
function showSectionDeleteForm(sectionNum){
    // alert("Show Edit");
    var showSectionEditDB = true;
    // alert(sectionNum);
    
    $.ajax
    ({
        type: "POST",
        url: "controller/section.php",
        data:
        {
            showSectionEditDB  :   showSectionEditDB,
            sectionNum     :   sectionNum,
        },
        async: false,
        success: function(response)
        {

            var sectionData = $.parseJSON(response);
            console.log(response);
            var deleteSectionDB = true;

            if(confirm("Are you sure you want to delete the section " + sectionData.secName +"? This cannot be undone.")){
                $.ajax
                ({
                    type: "POST",
                    url: "controller/section.php",
                    data:
                    {
                        deleteSectionDB    :   deleteSectionDB,
                        sectionNum     :   sectionNum,
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