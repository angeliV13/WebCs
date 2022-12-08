<?php

    function accountLogin($userName, $userPassword){
        session_start();
        include('dbConnection.php');
        $password = md5($userPassword);

        $accountUID = [];

        $query = "SELECT * FROM tbl_account WHERE `accountID` = '" . $userName . "' AND `accountActive` = '1'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

        // DOES QUERY CONTAINS ROWS?
        if(mysqli_num_rows($sql)>0){
            $row = mysqli_fetch_assoc($sql);
            extract($row);

            if($accountPassword==$password){
                $_SESSION['userID'] = $accountID;
                $_SESSION['fName'] = $accountFName;
                
                return 1;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }
    }

?>