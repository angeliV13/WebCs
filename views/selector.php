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

                // ---------------------------------SCHEDULING-------------------------------
                // Create Schedule
            case 'createSchedule':
                return "scheduling/createSchedule.php";
                break;

                // View  Schedule
            case 'viewSchedule':
                return "scheduling/viewSchedule.php";
                break;
                // Instructor Schedule
            case 'instructorSchedule':
                return "scheduling/instructorSchedule.php";
                break;
        }
    }
?>