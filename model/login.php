<?php

    function accountLogin($userName, $userPassword){
        include('dbConnection.php');
        $password = md5($userPassword);

        $accountUID = [];

        $query = "SELECT * FROM tbl_account WHERE `accountID` = '" . $userName . "' AND `accountPassword` = '" . $password . "' AND `accountActive` = '1'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

        // DOES QUERY CONTAINS ROWS?
        if(mysqli_num_rows($sql)>0){
            while ($row = mysqli_fetch_assoc($sql))
            {
                // Extract Data from the QUERY
                extract($row);
                $accountUID = [
                    $accountID,
                    $accountFName,
                    "Successfully"
                ];
            }
            return json_encode($accountUID);
        }
        else{
            $accountUID = [
                "credentials are incorrect",
                "credentials are incorrect",
                "credentials are incorrect"
            ];
            return json_encode($accountUID);
        }
    }

?>