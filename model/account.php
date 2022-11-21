<?php
    function viewAccount(){
        include('dbConnection.php');

        $query = "SELECT * FROM tbl_account";
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

        $totalData = 0;
        if(mysqli_num_rows($sql)>0){
            while ($row = mysqli_fetch_assoc($sql))
            {
                extract($row);
                $checkbox = "";
                $buttons = "";
                $count = 1;

                $data[] = [
                    $checkbox = '<input class="w-100" type="checkbox" name="check1" id="check'. $accountNum .'">',
                    $count,
                    $accountID,
                    $accountLName .", " . $accountFName . $accountMName,
                    ($accountActive==1)? "Active" : "Inactive",
                    $buttons = '<div class="btn-group d-flex">
                                    <button class="btn btn-warning" data-num="'. $accountNum .'" data-toggle="modal" data-target="#editAccountModal">Edit</button>
                                    <button class="btn btn-danger" data-num="'. $accountNum .'" data-toggle="modal" data-target="#deleteAccountModal">Delete</button>
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

?>