<?php
    // Viewing room
    function viewRoom(){
        include('dbConnection.php');


        $query = "SELECT * FROM tbl_room"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

        $totalData = 0;

        // DOES QUERY CONTAINS ROWS?
        if(mysqli_num_rows($sql)>0){ 
            $count = 1;
            $checkbox = "";
            $buttons = "";

            // GETTING QUERIED DATA
            while ($row = mysqli_fetch_assoc($sql))
            {

                // Extract Data from the QUERY
                extract($row);

                // WHERE EXTRACTED DATA WILL BE STORED
                $data[] = [
                    $checkbox = '<input class="w-100" type="checkbox" name="check1" id="check'. $roomNum .'">',
                    $count++,
                    $roomName,
                    $roomLocation,
                    $roomType,
                    ($roomAvail==8)? "All Day" : $roomAvail,
                    $buttons = '<div class="btn-group d-flex">
                                    <button class="btn btn-warning" onclick="showRoomEditForm('. $roomNum .')" type"button">Edit</button>
                                    <button class="btn btn-danger" onclick="showRoomDeleteForm('. $roomNum .')" type"button">Delete</button>
                                </div>',
                ];
            }
        }

        $json_data = array(
            "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal"    => intval($totalData),  // total number of records
            "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   // total data array
        );

        echo json_encode($json_data);  // send data as json format

    }

    // Getting Room Data
    function getRoomNum($roomNum){

        include('dbConnection.php');
        $query = "SELECT * FROM tbl_room WHERE roomNum = '". $roomNum ."'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

        if(mysqli_num_rows($sql)>0){ 

            $roomData = array();
            // GETTING QUERIED DATA
            $roomData = mysqli_fetch_assoc($sql);

            return json_encode($roomData);
        }
    }

    //Adding Rooms to Database
    function addRoom($roomName , $roomLoc, $roomType, $roomAvailability=8){

        include('dbConnection.php');
        $query = "INSERT INTO `tbl_room`(`roomNum`, `roomName`, `roomLocation`, `roomType`, `roomAvail`) VALUES ('0','".$roomName."','".$roomLoc."','".$roomType."','".$roomAvailability."')"; 
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        return ($query);
    }

    // Editing Rooms to Database
    function editRoom($roomNum, $roomName , $roomLoc, $roomType, $roomAvailability=8){

        include('dbConnection.php');
        $query = "UPDATE `tbl_room` 
                    SET `roomName`='" . $roomName . "',`roomLocation`='" . $roomLoc . "',`roomType`='" . $roomType . "',`roomAvail`='" .$roomAvailability. "';
                    WHERE roomNum = '". $roomNum ."'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        return ($query);
    }

    // Deleting Rooms
    function deleteRoom($roomNum){

        include('dbConnection.php');
        $query = "DELETE FROM `tbl_room`
                    WHERE roomNum = '". $roomNum ."'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        return ($query);
    }


    
?>
