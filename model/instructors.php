<?php
    // Viewing room
    function viewInstructors(){
        include('dbConnection.php');
        
        
        $query = "SELECT * FROM tbl_faculty"; //QUERY CODE
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
                    $checkbox = '<input class="w-100" type="checkbox" name="check1" id="check'. $facNum .'">',
                    $count++,
                    $facID,
                    $facFName,
                    $facMName, 
                    $facLName,
                    $facType,
                    $facAvailability,
                    ($facAvailability)? "FT" : $facAvailability,
                    $buttons = '<div class="btn-group d-flex">
                                    <button class="btn btn-warning" onclick="showEditForm('. $facNum .')" type"button">Edit</button>
                                    <button class="btn btn-danger" onclick="showEditForm('. $facNum .')" type"button">Delete</button>
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
    function getfacNum($facNum){

        include('dbConnection.php');
        $query = "SELECT * FROM tbl_faculty WHERE facNum = '". $facNum ."'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

        if(mysqli_num_rows($sql)>0){ 

            $facultyData = array();
            // GETTING QUERIED DATA
            $facultyData = mysqli_fetch_assoc($sql);

            return json_encode($facultyData);
        }
    }

    //Adding Rooms to Database
    function addInstructors($facID , $facFName, $facMName, $facLName, $facType, $facAvailability,){

        include('dbConnection.php');
        $query = "INSERT INTO `tbl_faculty`(`facNum`, `facID`, `facFName`, `facMName`, `facLName`, `facTeach`, `facType`, `facAvailability`) VALUES ('0','','','','','','','')"; 
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        return ($query);
    }

    

    // Editing Rooms to Database
    function editRoom($roomNum, $roomName , $roomLoc, $roomType, $roomAvailability=8){

        include('dbConnection.php');
        $query = "UPDATE `tbl_room` 
                    SET `roomName`='" . $roomName . "',`roomLocation`='" . $roomLoc . "',`roomType`='" . $roomType . "',`roomAvail`='" .$roomAvailability. "' 
                    WHERE roomNum = '". $roomNum ."'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        return ($query);
    }


    
?>
