<?php
    function linkSelector($linkVal = 0){
        switch ($linkVal){
            case 0:
                // Homepage AKA INDEX
                return "index.html";
                break;

                // Dashboard
            case 'dashboard':
                return "dashboard.php";
                break;
                // ---------------------------------Account-------------------------------
                // Create an Account 
            case 'createAccount':
                return "account/createaccount.php";
                break;
                // Accounts Listing
            case 'accountsListing':
                    return "account/accountsListing.php";
                    break;
                // ---------------------------------PROGRAM-------------------------------
                // BSIT 
            case 'progBSIT':
                return "program/bsit.php";
                break;

                // BSCS
            case 'progBSCS':
                return "program/bscs.php";
                break;
                // ---------------------------------INSTRUCTORS-------------------------------
                // Instructors
            case 'instructors':
                return "Faculty/instructors.php";
                break;

                // ---------------------------------SCHEDULING-------------------------------
                // Create Schedule
            case 'createSchedule':
                return "scheduling/createSchedule.php";
                break;

                // View  Schedule 
            case 'viewSchedule':
                return "scheduling/viewSchedule.php";
                break;

                // ----------------------------------LOG OUT--------------------------------
                // Room
            case 'room':
                return "scheduling/room.php";
                break;
        }
    }
?>