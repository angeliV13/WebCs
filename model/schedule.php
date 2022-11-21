<?php
    function viewSched(){
        // $room = "";
        // include('dbConnection.php');

        // $query = "SELECT * FROM tbl_room WHERE roomNum = 0";
        // $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

        // $totalData = 0;
        // if(mysqli_num_rows($sql)>0){
        //     while ($row = mysqli_fetch_assoc($sql))
        //     {
        //         extract($row);

        //         $data[] = [
        //             $schedNum,
        //             $schedFacID,
        //             $schedRoomID,
        //             $schedSubNum,
        //             $schedTime,
        //             $schedDay,
        //             $schedCourseID,
        //             $schedSemID,
        //             $schedAYID,
        //         ];
        //     }
        // }

        // $json_data = array(
        //     "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
        //     "recordsTotal"    => intval($totalData),  // total number of records
        //     "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
        //     "data"            => $data   // total data array
        // );

        // echo json_encode($json_data);  // send data as json format

    }

?>