<!-- Sidebar -->
<div>

</div>
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-calendar"></i>
        </div>
        <div class="sidebar-brand-text mx-10">WEBCS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php?val=dashboard">
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Options
    </div>
    <!-- Nav Item - Accounts -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccount"
            aria-expanded="true" aria-controls="collapseAccount">
            <span>Account</span>
        </a>
        <div id="collapseAccount" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Account Options:</h6>
                <a class="collapse-item" href="index.php?val=accountsListing">Accounts Listing</a>
            </div>
        </div>
    </li>

     <!-- Nav Item - Guest Lecturers -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFaculty"
            aria-expanded="true" aria-controls="collapseFaculty">
            <span>Guest Lecturers</span>
        </a>
        <div id="collapseFaculty" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Faculty Options:</h6>
                <a class="collapse-item" href="index.php?val=faculty">Faculty List</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Curriculum -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCurriculum"
            aria-expanded="true" aria-controls="collapseCurriculum">
            <span>Curriculum</span>
        </a>
        <div id="collapseCurriculum" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List of Courses:</h6>
                <a class="collapse-item" href="index.php?val=progBSIT">BS Information Technology</a>
                <a class="collapse-item" href="index.php?val=progBSCS">BS Science in Computer</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Scheduling -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <span>Scheduling</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-3 collapse-inner rounded">
                <h6 class="collapse-header">Scheduling Options:</h6>
                <a class="collapse-item" href="index.php?val=createSchedule">Create Schedule</a>
                <a class="collapse-item" href="index.php?val=viewScheduleStudent">Student Schedules</a>
                <a class="collapse-item" href="index.php?val=viewScheduleInstructor">Faculty Schedules</a>
                <a class="collapse-item" href="index.php?val=viewScheduleRoom">Room Schedules</a>    
            </div>
        </div>
    </li>

    <!-- Nav Item - Rooms -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php?val=room">
            <span>Rooms</span></a>
    </li>

    <!-- Nav Item - Section -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php?val=section">
            <span>Sections</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">

    </div>

    <!-- Nav Item - Logout -->
    <li class="nav-item active bg-dark">
        <a class="nav-link" href="index.php?val=logout">
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->