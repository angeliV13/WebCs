<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Programs</h1>
        <a href="#"  class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#addCourseModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Course</a>
    </div>
    <!-- Content Row -->
    <div class="column">
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">Bachelor of Science in Information Technology</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="viewSched" width="100%" cellspacing="0">
                         <thead>
                            <tr class="text-center">
                                <th>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </th>
                                <th>Course Code</th>
                                <th>Course Title</th>   
                                <th>Units</th>
                                <th>Lecture</th>
                                <th>Laboratory</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </td>
                                <td>IT111</td>
                                <td>Introduction to Computing</td>
                                <td>3</td>
                                <td>3</td>
                                <td>3</td>
                                <td>
                                    <div class="btn-group d-flex">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editCourseModal">Edit</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteCourseModal">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Add course Modal-->
<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCourseLabel">Course Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-1">
                    <label for="courseCode"> Course code</label>
                    <input type="text" name="courseActive" id="courseName" maxlength="10">
                    
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="courseName">Course Name</label>
                    <input type="text" name="courseName" id="courseName" maxlength="10">
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="courseActive">Active</label>
                    <div class="d-flex">
                        <div class="mr-5">
                            <input type="radio" name="courseActive" id="courseName" value="1">
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
                <a class="btn btn-danger" href="login.html">Add Course</a>
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

