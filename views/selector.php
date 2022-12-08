<?php
    function linkSelector($linkVal = 0){
        switch ($linkVal){
            case 0:
                // Homepage AKA INDEX
                return "index.html";
                break;

                // Logout
            case 'logout':
                return "logout.php";
                break;

                // Dashboard
            case 'dashboard':
                return "dashboard.php";
                break;
                // ---------------------------------Account-------------------------------
                // Create an Account 
            case 'createAccount':
                return "account/createAccount.php";
                break;

            case 'login':
                return "account/login.php";
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
                // ---------------------------------FACULTY-------------------------------
                // FACULTY
            case 'faculty':
                return "faculty/faculty.php";
                break;

                // ---------------------------------SCHEDULING-------------------------------
                // Create Schedule
            case 'createSchedule':
                return "scheduling/createSchedule.php";
                break;

                // View  Schedule 
            case 'viewScheduleStudent':
                return "scheduling/viewSchedule_std.php";
                break;

            case 'viewScheduleInstructor':
                return "scheduling/viewSchedule_ins.php";
                break;

            case 'viewScheduleRoom':
                return "scheduling/viewSchedule_room.php";
                break;

                // ----------------------------------LOG OUT--------------------------------
                // Room
            case 'room':
                return "scheduling/room.php";
                break;

            case 'section':
                return "scheduling/section.php";
                break;
        }
    }
?>