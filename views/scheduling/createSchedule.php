<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Schedule</h1>
    </div>
<div class="row">

    <!-- Academic Year -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Academic Year</div>
                        <div class="mb-0 font-weight-bold text-gray-800">
                            <select name="academicYear" id="academicYear" class="form-select form-select-sm">
                                <option value="" disabled selected>Select Academic Year</option>
                                <!-- <option value="21">2020-2021</option>
                                <option value="22">2021-2022</option>
                                <option value="23">2022-2023</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Semester -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Semester</div>
                        <div class="mb-0 font-weight-bold text-gray-800">
                            <select name="semester" id="semester" class="form-select form-select-sm">
                                <option value="" disabled selected>Select Semester</option>
                                <!-- <option value="1">First</option>
                                <option value="2">Second</option>
                                <option value="3">Summer</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-text-o fa-search fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Content Row -->
    <div class="column">
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger text-center">Create Schedule</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <button class="btn btn-danger btn-rounded d-block col-6 mx-auto" type="button" 
                    data-toggle="modal" data-target="#addCourseModal" data-backdrop="static" data-keyboard="false">Create Now</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Add Schedule Modal-->
<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseLabel"
        aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCourseLabel">Create Schedule</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <label for="section">Section: </label>
                    <select name="section" id="section">
                        <option value="">Select Section</option>
                    </select>
                    <button class="btn btn-sm btn-danger" id="selectSection">Select Section</button>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="theCalendar">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="createSchedule" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <!-- <th>
                                                <input class="w-100" type="checkbox" name="check1" id="check1">
                                            </th> -->
                                            <th>Time</th>
                                            <th>Monday</th>
                                            <th>Tuesday</th>
                                            <th>Wednesday</th>
                                            <th>Thursday</th>
                                            <th>Friday</th>
                                            <th>Saturday</th>
                                            <th>Sunday</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="createSchedCarousel" class="carousel slide col-4 d-none" data-interval="false" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div>

                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-danger btn-rounded" href="#createSchedCarousel"
                                    role="button" data-slide="next">Next</button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-danger btn-rounded" href="#createSchedCarousel"
                                    role="button" data-slide="prev">Previous</button>
                                    <button class="btn btn-danger btn-rounded" href="#createSchedCarousel"
                                    role="button" data-slide="next">Next</button>
                                </div>
                                

                            </div>
                            <div class="carousel-item">
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-danger btn-rounded" href="#createSchedCarousel"
                                    role="button" data-slide="prev">Previous</button>
                                    <button class="btn btn-danger btn-rounded" href="#createSchedCarousel"
                                    role="button" data-slide="next">Submit</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>

<!-- Edit Room Modal-->
<div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="editCourseLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCourseLabel">Edit Course</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-1">
                    <label for="courseCode">Course Code</label>
                    <input type="text" name="courseCode" id="courseCode" maxlength="10">
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="courseName">Course Name</label>
                    <input type="text" name="courseActive" id="courseName" maxlength="10">
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="courseActive">Active</label>
                    <div class="d-flex">
                        <div class="mr-5">
                            <input type="radio" name="courseActive" id="courseActive" value="1">
                            <label for="courseActive">Yes</label>
                        </div>
                        <div class="mr-5">
                            <input type="radio" name="courseActive" id="courseName" value="1">
                            <label for="courseActive">No</label>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="login.html">Update</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Room Modal-->
<div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog" aria-labelledby="deleteCourseLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCourseLabel">Delete Course?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-1">
                    <p>Are you sure you want to delete this course?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="login.html">Delete</a>
            </div>
        </div>
    </div>
</div>



