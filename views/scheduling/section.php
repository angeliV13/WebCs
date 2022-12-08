<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-danger font-weight-bold">Sections</h1>
        <a href="#"  class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#addSectionModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Section</a>
    </div>
    <!-- Content Row -->
    <div class="column">
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-danger">Section List</h6> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="viewSection" width="100%" cellspacing="0">
                         <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Section</th>
                                <th>Section Year Level</th>
                                <th>Section Course</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </td>
                                <td>1</td>
                                <td>CECS 101</td>
                                <td>CECS</td>
                                <td>61</td>
                                <td>61</td>
                                <td>
                                    <div class="btn-group d-flex">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editSectionModal">Edit</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteSectionModal">Delete</button>
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

<!-- Add Section Modal-->
<div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="addSectionLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSectionLabel">Adding Section</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Section Number -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="sectionName">Section</label>
                        <input type="text" name="sectionName" id="sectionName" maxlength="10">
                        
                    </div>
                    
                    <!-- Section Year -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="sectionYearLevel">Section Year Level</label>
                        <input type="text" name="sectionYearLevel" id="sectionYearLevel" maxlength="10">
                    </div>

                    <!-- Section Course -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="sectionCourse">Section Course</label>
                        <input type="text" name="sectionCourse" id="sectionCourse" maxlength="10">
                    </div>

                    <!-- Section Availability  ---- WORK IN PROGRESS -->
                    <!-- <div class="d-flex justify-content-between mb-1">
                        <label for="sectionLab">Availability</label>
                        <div class="d-flex">
                            <div class="mr-5">
                                <input type="radio" name="sectionAvail" id="sectionAvail" value="1">
                                <label for="sectionLab"></label>
                            </div>
                            <div class="mr-5">
                                <input type="radio" name="sectionAvail" id="sectionAvail" value="0">
                                <label for="sectionLab">No</label>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="button" id="addSectionButton">Add Section</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Section Modal-->
<div class="modal fade" id="editSectionModal" tabindex="-1" role="dialog" aria-labelledby="editSectionLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSectionLabel">Edit Section</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                    <!-- Section ID -->
                    <div class="d-none justify-content-between mb-4">
                        <label for="editSectionNum">Section ID</label>
                        <input type="text" name="editSectionNum" id="editSectionNum" maxlength="10">
                    </div>

                    <!-- Section Name -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editSectionName">Section</label>
                        <input type="text" name="editSectionName" id="editSectionName" maxlength="10">

                    </div>

                    <!-- Section Location -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editSectionYearLevel">Section Year Level</label>
                        <input type="text" name="editSectionYearLevel" id="editSectionYearLevel" maxlength="10">
                    </div>

                    <!-- Section Location -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editSectionCourse">Course</label>
                        <input type="text" name="editSectionCourse" id="editSectionCourse" maxlength="10">
                    </div>

                    <!-- Edit Section Availability  ---- WORK IN PROGRESS -->
                    <!-- <div class="d-flex justify-content-between mb-1">
                        <label for="editSectionLab">Availability</label>
                        <div class="d-flex">
                            <div class="mr-5">
                                <input type="radio" name="editSectionAvail" id="editSectionAvail" value="1">
                                <label for="editSectionLab"></label>
                            </div>
                            <div class="mr-5">
                                <input type="radio" name="editSectionAvail" id="editSectionAvail" value="0">
                                <label for="editSectionLab">No</label>
                            </div>
                        </div>
                    </div> -->
                </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="button" id="editSectionButton">Edit</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Section Modal-->
<div class="modal fade" id="deleteSectionModal" tabindex="-1" role="dialog" aria-labelledby="deleteSectionLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSectionLabel">Delete Section?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-1">
                    <p>Are you sure you want to delete this section?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="login.html">Delete</a>
            </div>
        </div>
    </div>
</div>


<!-- <script src="assets/js/section.js"></script> -->