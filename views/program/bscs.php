<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Programs</h1>
        <a href="#"  class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#addCsSubjectModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Subject</a>
    </div>
    <!-- Content Row -->
    <div class="column">
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">Bachelor of Science in Computer Science</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="viewCsSubject" width="100%" cellspacing="0">
                         <thead>
                            <tr class="text-center">
                                <!-- <th>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </th> -->
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
<div class="modal fade" id="addCsSubjectModal" tabindex="-1" role="dialog" aria-labelledby="addCsSubjectLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubjectLabel">Adding Subject</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between mb-4 hidden">
                        <label for="addSubNum">Subject Number</label>
                        <input type="text" name="addSubNum" id="addSubNum" maxlength="50">
                    </div>
                    <!-- Course Code-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="courseCode">Course Code</label>
                        <input type="text" name="addCourseCode" id="addCourseCode" maxlength="50">
                    </div>

                    <!-- Course Name -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="courseName"> Course Name </label>
                        <input type="text" name="addCourseName" id="addCourseName" maxlength="50">
                    </div>

                    <!-- Subject Lecture-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="subLec"> Lecture </label>
                        <input type="text" name="addSubLecDB" id="addSubLecDB" maxlength="50">
                    </div>

                    <!-- Subject Laboratory-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="subLab"> Laboratory </label>
                        <input type="text" name="addSubLab" id="addSubLab" maxlength="50">
                    </div>

                    <!-- Subject Units-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="subUnit"> Unit </label>
                        <input type="text" name="addSubUnit" id="addSubUnit" maxlength="50">
                    </div>

                    <!-- Year Level-->
                    <div class="d-flex justify-content-between mb-5">
                        <label for="yearLevel"> Year Level</label>
                        <input type="text" name="addYearLevel" id="addYearLevel" maxlength="50">
                    </div>

                    <!-- Course ID -->
                   <div class="d-flex justify-content-between mb-1">
                        <label for="courseID">Course ID</label>
                        <div class="combo-box justify-content-between mb-2">

                            <div class="mr-2">
                                <input type="radio" name="addCourseID" id="addCourseID">
                                <label for="addCourseID">BSIT</label>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="addCourseID" id="addCourseID">
                                <label for="addCourseID">BSCS</label>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="addCourseID" id="addCourseID">
                                <label for="addCourseID">BSIT-BA</label>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="addCourseID" id="addCourseID">
                                <label for="addCourseID">BSIT-SM</label>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="addCourseID" id="addCourseID">
                                <label for="addCourseID">BSIT-NT</label>
                            </div>
                        </div>
                    </div>
                    <!-- Subject Semester-->
                    <div class="d-flex justify-content-between mb-1">
                        <label for="semester">Semester</label>
                        <div class="d-flex">
                            <div class="mr-2">
                                <input type="radio" name="addSemester" id="addSemester">
                                <label for="addSemester">1st Semester</label>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="addSemester" id="addSemester">
                                <label for="addSemester">2nd Semester</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="button" id="addSubjectButton">Add Subject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--EDIT Subject Semester-->
<div class="modal fade" id="editCsSubjectModal" tabindex="-1" role="dialog" aria-labelledby="editCsSubjectLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCsSubjectLabel">Edit Subject</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form>
            <div class="modal-body">
                    <!-- SubNum -->
                    <div class="d-flex justify-content-between mb-4 hidden">
                        <label for="editSubNum">Subject Number</label>
                        <input type="text" name="editSubNum" id="editSubNum" maxlength="50">
                    </div>

                   <!-- Course Code-->
                   <div class="d-flex justify-content-between mb-4">
                        <label for="editCourseCode">Course Code</label>
                        <input type="text" name="editCourseCode" id="editCourseCode" maxlength="50">
                    </div>
                    
                    <!-- Course Name -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editCourseName"> Course Name </label>
                        <input type="text" name="editCourseName" id="editCourseName" maxlength="50">
                    </div>

                    <!-- Subject Lecture-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editsubLec"> Lecture </label>
                        <input type="text" name="editsubLec" id="editSubLec" maxlength="50">
                    </div>

                    <!-- Subject Laboratory-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="subLab"> Laboratory </label>
                        <input type="text" name="editsubLab" id="editSubLab" maxlength="50">
                    </div>

                    <!-- Subject Units-->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="subUnit"> Unit </label>
                        <input type="text" name="editSubUnit" id="editSubUnit" maxlength="50">
                    </div>

                    <!-- Year Level-->
                    <div class="d-flex justify-content-between mb-5">
                        <label for="editYearLevel"> Year Level</label>
                        <input type="text" name="editYearLevel" id="editYearLevel" maxlength="50">
                    </div>

                    <!-- Course ID -->
                   <div class="d-flex justify-content-between mb-1">
                        <label for="editCourseID">Course ID</label>
                        <div class="d-flex">
                            <div class="mr-2">
                                <input type="radio" name="editCourseID" id="editCourseID" value = "1">
                                <label for="editCourseID">BSCS</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Year Level-->
                    <div class="d-flex justify-content-between mb-1">
                        <label for="editsemester">Semester</label>
                        <div class="d-flex">
                            <div class="mr-2">
                                <input type="radio" name="editSemester" id="editSemester">
                                <label for="editsemester">1st Semester</label>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="semester" id="editSemester">
                                <label for="editsemester">2nd Semester</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="button" id="editBscsSubjectButton">Add Subject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Subject Modal-->
<div class="modal fade" id="deleteCsSubjectModal" tabindex="-1" role="dialog" aria-labelledby="deleteBscsSubjectLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBscsSubjectLabel" >Delete Subject?</h5>
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
                <a class="btn btn-danger" href="">Delete</a>
            </div>
        </div>
    </div>
</div>


<!-- <script src="assets/js/bscs.js"></script>  -->