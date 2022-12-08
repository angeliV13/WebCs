<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-danger font-weight-bold">Bachelor of Science in Information Technology</h1>
        <a href="#"  class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#addITSubjectModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Subject</a>
    </div>
    <!-- Content Row -->
    <div class="column">
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-danger">Bachelor of Science in Information Technology</h6> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="viewItSubject" width="100%" cellspacing="0">
                         <thead>
                            <tr class="text-center">

                                <th>No.</th>
                                <th>Course Code</th>
                                <th>Course Name</th>   
                                <th>Lecture (hours) </th>
                                <th>Laboratory (hours) </th>
                                <th>Unit</th>
                                <th>Course ID</th>
                                <th>Semester</th>
                                <th>Year Level</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </td>
                                <td>IT111</td>
                                <td>Introduction to Computing</td>
                                <td>3</td>
                                <td>3</td>
                                <td>3</td>
                                <td> </td>
                                <td> </td>
                                <td>
                                    <div class="btn-group d-flex">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editCourseModal">Edit</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteCourseModal">Delete</button>
                                    </div>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Add course Modal-->
<div class="modal fade" id="addITSubjectModal" tabindex="-1" role="dialog" aria-labelledby="addBsitSubjectModal"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBsitSubjectModal">Adding Subject</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="d-flex justify-content-between mb-4">
                        <label for="addsubNum ">Subject Number</label>
                        <input type="text" name="addsubNum" id="addsubNum" maxlength="50">
                    </div> -->
                    <!-- Course Code-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="addcourseCode">Course Code</label>
                        <input type="text" name="addcourseCode" id="addcourseCode" maxlength="50">
                    </div>

                    <!-- Course Name -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="addcourseName"> Course Name </label>
                        <input type="text" name="addcourseName" id="addcourseName" maxlength="50">
                    </div>

                    <!-- Subject Lecture-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="addsubLec"> Lecture </label>
                        <input type="text" name="addsubLec" id="addsubLec" maxlength="50">
                    </div>

                    <!-- Subject Laboratory-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="addsubLab"> Laboratory </label>
                        <input type="text" name="addsubLab" id="addsubLab" maxlength="50">
                    </div>

                    <!-- Subject Units-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="addsubUnit"> Unit </label>
                        <input type="text" name="addsubUnit" id="addsubUnit" maxlength="50">
                    </div>

                    <!-- Year Level-->
                    <div class="d-flex justify-content-between mb-5">
                        <label for="addyearLevel"> Year Level</label>
                        <input type="text" name="addyearLevel" id="addyearLevel" maxlength="50">
                    </div>

                    <!-- Course ID -->
                   <div class="d-flex justify-content-between mb-5">
                        <label for="addcourseID"> Course ID</label>
                        <input type="text" name="addcourseID" id="addcourseID" maxlength="50">
                    </div>

                    <!-- Subject Semester-->
                    <div class="d-flex justify-content-between mb-1">
                        <label for="addsemester">Semester</label>
                        <div class="d-flex">
                            <div class="mr-2">
                                <input type="radio" name="addsemester" id="addsemester" value = "1">
                                <label for="addsemester">1st Semester</label>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="addsemester" id="addsemester" value = "2">
                                <label for="addsemester">2nd Semester</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="button" id="addITSubjectButton">Add Subject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Subject Modal-->
<div class="modal fade" id="editITSubjectModal" tabindex="-1" role="dialog" aria-labelledby="editBsitSubjectLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBsitSubjectLabel">Edit Subject</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="d-none justify-content-between mb-4">
                        <label for="editsubNum ">Subject Number</label>
                        <input type="text" name="editsubNum" id="editsubNum" maxlength="50">
                    </div>
                   <!-- Course Code-->
                   <div class="d-flex justify-content-between mb-4">
                        <label for="editcourseCode">Course Code</label>
                        <input type="text" name="editcourseCode" id="editcourseCode" maxlength="50">
                    </div>
                    
                    <!-- Course Name -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editcourseName"> Course Name </label>
                        <input type="text" name="editcourseName" id="editcourseName" maxlength="50">
                    </div>

                    <!-- Subject Lecture-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editsubLec"> Lecture </label>
                        <input type="text" name="editsubLec" id="editsubLec" maxlength="50">
                    </div>

                    <!-- Subject Laboratory-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editsubLab"> Laboratory </label>
                        <input type="text" name="editsubLab" id="editsubLab" maxlength="50">
                    </div>

                    <!-- Subject Units-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editsubUnit"> Unit </label>
                        <input type="text" name="editsubUnit" id="editsubUnit" maxlength="50">
                    </div>

                    <!-- Year Level-->
                    <div class="d-flex justify-content-between mb-5">
                        <label for="edityearLevel"> Year Level</label>
                        <input type="text" name="edityearLevel" id="edityearLevel" maxlength="50">
                    </div>

                    <!-- Course ID -->
                    <div class="d-flex justify-content-between mb-5">
                        <label for="editcourseID"> Course ID</label>
                        <input type="text" name="editcourseID" id="editcourseID" maxlength="50">
                    </div>
                    
                    <!-- Year Level-->
                    <div class="d-flex justify-content-between mb-1">
                        <label for="editsemester">Semester</label>
                        <div class="d-flex">
                            <div class="mr-2">
                                <input type="radio" name="editsemester" id="editsemester" value = "1">
                                <label for="editsemester">1st Semester</label>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="editsemester" id="editsemester" value = "2">
                                <label for="editsemester">2nd Semester</label>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="button" id="editITSubjectButton">Update Subject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Subject Modal-->
<div class="modal fade" id="deleteITSubjectModal" tabindex="-1" role="dialog" aria-labelledby="deleteBsitSubjectLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBsitSubjectLabel">Delete Subject?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-1">
                    <p>Are you sure you want to delete this subject?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="login.html">Delete</a>
            </div>
        </div>
    </div>
</div>


<!-- <script src="assets/js/bsit.js"></script>  -->