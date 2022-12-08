<?php
    function viewAccountAccountsListing(){
        include('dbConnection.php');

        $query = "SELECT * FROM tbl_account";
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

        $totalData = 0;
        if(mysqli_num_rows($sql)>0){
            $count = 1;
            while ($row = mysqli_fetch_assoc($sql))
            {
                
                $checkbox = "";
                $buttons = "";

                extract($row);

                $data[] = [
                    // $checkbox = '<input class="w-100" type="checkbox" name="check1" id="check'. $accountNum .'">',
                    $count++,
                    // $accountNum,
                    $accountFName." " . $accountMName. " " . $accountLName,
                    $accountID,
                    $emailAddress,
                    $position,
                    $buttons = '<div class="btn-group d-flex">
                                    <button class="btn btn-warning" onclick="showAccountAccountsListingEditForm('. $accountNum .')">Edit</button>
                                    <button class="btn btn-danger" onclick="showAccountAccountsListingDeleteForm('. $accountNum .')">Delete</button>
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
     // Getting subjects Data
function getAccountNum($accountNum)
{

    include('dbConnection.php');
    $query = "SELECT * FROM tbl_account WHERE accountNum = '" . $accountNum . "'"; //QUERY CODE
    $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

    if (mysqli_num_rows($sql) > 0) {

        $accountData = array();
        // GETTING QUERIED DATA
        $accountData = mysqli_fetch_assoc($sql);

        return json_encode($accountData);
    }
}    
    //Adding subjects to Database
    function addAccountAccountsListing($accountFName, $accountMName, $accountLName, $accountID,$emailAddress,$position){

        include('dbConnection.php');
        $query = "INSERT INTO `tbl_account`(`accountNum`, `accountFName`, `accountMName`, `accountLName`, `accountID`, `emailAddress`,`position` ) VALUES (0,'".$accountFName."','".$accountMName."','".$accountLName."','" .$accountID. "','" .$emailAddress. "','" .$position. "')"; 
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

        return ($query);
    }
    // Editing subjects to Database
    function editAccountAccountsListing($accountNum, $accountFName, $accountMName, $accountLName, $accountID, $emailAddress, $position){

        include('dbConnection.php');
        $query = "UPDATE `tbl_account`
                    SET `accountFName`='" . $accountFName . "',`accountMName`='" . $accountMName . "',`accountLName`='" .$accountLName. "',`accountID`='" .$accountID. "', `emailAddress`='" .$emailAddress. "',`position`='" .$position. "'
                    WHERE `accountNum` = '". $accountNum ."'"; //QUERY CODE
        var_dump($query);
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

        return ($query);
    }

    // Deleting subjects
    function deleteAccountAccountsListing($accountNum){

        include('dbConnection.php');
        $query = "DELETE FROM `tbl_account`
                    WHERE accountNum = '". $accountNum ."'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

        return ($query);
    }


?>