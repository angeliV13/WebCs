<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Schedule</h1>
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
                <div class="row">
                    <div class="mr-4">
                        <label for="section">Section: </label>
                        <select name="academicYear" id="academicYear" class="form-select form-select-sm">
                            <option value="">Select Section</option>
                        </select>
                    </div>
                    <div class="mr-4">
                        <label for="section">Section: </label>
                        <select name="semester" id="semester" class="form-select form-select-sm">
                            <option value="">Select Section</option>
                        </select>
                    </div>
                    <div class="mr-4">
                        <label for="section">Section: </label>
                        <select name="section" id="section">
                            <option value="">Select Section</option>
                        </select>
                        <button class="btn btn-sm btn-danger" id="selectSection">Select Section</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="theCalendar">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="createSchedule" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
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
                                        <tr class="text-center">
                                            <th>7:00 - 8:00</th>
                                            <th id="d1-0"></th>
                                            <th id="d2-0"></th>
                                            <th id="d3-0"></th>
                                            <th id="d4-0"></th>
                                            <th id="d5-0"></th>
                                            <th id="d6-0"></th>
                                            <th id="d7-0"></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>8:00 - 9:00</th>
                                            <th id="d1-1"></th>
                                            <th id="d2-1"></th>
                                            <th id="d3-1"></th>
                                            <th id="d4-1"></th>
                                            <th id="d5-1"></th>
                                            <th id="d6-1"></th>
                                            <th id="d7-1"></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>9:00 - 10:00</th>
                                            <th id="d1-2"></th>
                                            <th id="d2-2"></th>
                                            <th id="d3-2"></th>
                                            <th id="d4-2"></th>
                                            <th id="d5-2"></th>
                                            <th id="d6-2"></th>
                                            <th id="d7-2"></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>10:00 - 11:00</th>
                                            <th id="d1-3"></th>
                                            <th id="d2-3"></th>
                                            <th id="d3-3"></th>
                                            <th id="d4-3"></th>
                                            <th id="d5-3"></th>
                                            <th id="d6-3"></th>
                                            <th id="d7-3"></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>11:00 - 12:00</th>
                                            <th id="d1-4"></th>
                                            <th id="d2-4"></th>
                                            <th id="d3-4"></th>
                                            <th id="d4-4"></th>
                                            <th id="d5-4"></th>
                                            <th id="d6-4"></th>
                                            <th id="d7-4"></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>12:00 - 1:00</th>
                                            <th id="d1-5"></th>
                                            <th id="d2-5"></th>
                                            <th id="d3-5"></th>
                                            <th id="d4-5"></th>
                                            <th id="d5-5"></th>
                                            <th id="d6-5"></th>
                                            <th id="d7-5"></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>1:00 - 2:00</th>
                                            <th id="d1-6"></th>
                                            <th id="d2-6"></th>
                                            <th id="d3-6"></th>
                                            <th id="d4-6"></th>
                                            <th id="d5-6"></th>
                                            <th id="d6-6"></th>
                                            <th id="d7-6"></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>2:00 - 3:00</th>
                                            <th id="d1-7"></th>
                                            <th id="d2-7"></th>
                                            <th id="d3-7"></th>
                                            <th id="d4-7"></th>
                                            <th id="d5-7"></th>
                                            <th id="d6-7"></th>
                                            <th id="d7-7"></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>3:00 - 4:00</th>
                                            <th id="d1-8"></th>
                                            <th id="d2-8"></th>
                                            <th id="d3-8"></th>
                                            <th id="d4-8"></th>
                                            <th id="d5-8"></th>
                                            <th id="d6-8"></th>
                                            <th id="d7-8"></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>4:00 - 5:00</th>
                                            <th id="d1-9"></th>
                                            <th id="d2-9"></th>
                                            <th id="d3-9"></th>
                                            <th id="d4-9"></th>
                                            <th id="d5-9"></th>
                                            <th id="d6-9"></th>
                                            <th id="d7-9"></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>5:00 - 6:00</th>
                                            <th id="d1-10"></th>
                                            <th id="d2-10"></th>
                                            <th id="d3-10"></th>
                                            <th id="d4-10"></th>
                                            <th id="d5-10"></th>
                                            <th id="d6-10"></th>
                                            <th id="d7-10"></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>6:00 - 7:00</th>
                                            <th id="d1-11"></th>
                                            <th id="d2-11"></th>
                                            <th id="d3-11"></th>
                                            <th id="d4-11"></th>
                                            <th id="d5-11"></th>
                                            <th id="d6-11"></th>
                                            <th id="d7-11"></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>7:00 - 8:00</th>
                                            <th id="d1-12"></th>
                                            <th id="d2-12"></th>
                                            <th id="d3-12"></th>
                                            <th id="d4-12"></th>
                                            <th id="d5-12"></th>
                                            <th id="d6-12"></th>
                                            <th id="d7-12"></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="createSchedCarousel" class="carousel slide col-4 d-none" data-interval="false" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="text-center">
                                    <h1 class="h6">Select Subject</h1>
                                </div>
                                <!-- <div class="d-flex justify-content-end">
                                    <button class="btn btn-danger btn-rounded" href="#createSchedCarousel"
                                    role="button" data-slide="next">Next</button>
                                </div> -->
                                <div id="subjects"> <!-- DIV IDEAS STARTS-->

                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="text-center">
                                    <h1 class="h6">Select Room</h1>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-danger btn-rounded" href="#createSchedCarousel"
                                    role="button" data-slide="prev">Previous</button>
                                </div>
                                <div id="rooms"> <!-- DIV IDEAS STARTS-->

                                </div>
                                

                            </div>
                            <div class="carousel-item">
                                <div class="text-center">
                                    <h1 class="h6">Select Instructor</h1>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-danger btn-rounded" href="#createSchedCarousel"
                                    role="button" data-slide="prev">Previous</button>
                                    <button class="btn btn-danger btn-rounded" href="#createSchedCarousel"
                                    role="button" data-slide="next">Submit</button>
                                </div>
                                <div id="faculty"> <!-- DIV IDEAS STARTS-->

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



