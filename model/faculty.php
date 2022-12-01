<?php
    // Viewing room
    function viewFaculty(){
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
                    $facLName . ", " . $facFName . " " . $facMName,
                    ($facAvailability = "FT")? "Fulltime": $facAvailability,
                    $buttons = '<div class="btn-group d-flex">
                                    <button class="btn btn-warning" onclick="showFacultyEditForm('. $facNum .')" type"button">Edit</button>
                                    <button class="btn btn-danger" onclick="showFacultyDeleteForm('. $facNum .')" type"button">Delete</button>
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

    // Getting Faculty Data
    function getFacNum($facNum){

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

    //Adding faculty to Database
    function addFaculty($facNum, $facID , $facFName, $facMName, $facLName, $facAvailability){

        include('dbConnection.php');
        $query = "INSERT INTO `tbl_faculty`(`facNum`, `facID`, `facFName`, `facMName`, `facLName`, `facAvailability`) VALUES ('". $facID ."','". $facNum."', '" .$facFName."','".$facMName."', '".$facLName."', '".$facAvailability."')"; 
        var_dump($query);
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

        return ($query);
    }


    // Editing Faculty to Database
    function editFaculty($facNum, $facID , $facFName, $facMName, $facLName, $facAvailability){

        include('dbConnection.php');
        $query = "UPDATE `tbl_faculty`
                    SET `facNum`='" . $facNum. "',`facID`='" . $facID. "',`facFName`='" . $facFName. "',`facMName`='" . $facMName. "',`facLName`='" . $facLName. "',`facAvailability`='" . $facAvailability. "'
                    WHERE `facNum` = '". $facNum ."'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

        return ($query);
    }
    
    //Delete  Faculty to Database
    function deleteFaculty($facNum){

        include('dbConnection.php');
        $query = "DELETE FROM `tbl_faculty`
                    WHERE `facNum` = '". $facNum ."'"; //QUERY CODE //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

        return ($query);
    }

?>
