$("#schedView").ready( function () {
    // $('#viewSched').DataTable({
    //     "processing": true,

    //     "ajax": "controller/schedule.php",
    //     // "columns": [
    //     //     {data: 'id'},
    //     //     {data: 'name'},
    //     //     {data: 'email'}
    //     // ]
    // });
    var checkDB = 'meme';
    $.ajax({
        type: "POST",
        
        url: "controller/schedule.php",
        data: 
        {
            checkDB: checkDB
        },
        async: false,
        success: function(text) {
            response = text;
            alert(response);
        }
    });
}); 

// var response = '';
// $.ajax({
//     type: "GET",
//     url: "Records.php",
//     async: false,
//     success: function(text) {
//         response = text;
//     }
// });