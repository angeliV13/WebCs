<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Instructors List</h1>
        <a href="#"  class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#addFacultyModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Faculty</a>
    </div>
    <!-- Content Row -->
    <div class="column">
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">"Faculty List"</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="viewFaculty" width="100%" cellspacing="0">
                         <thead>
                            <tr class="text-center">
                                <th>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </th>
                                <th>No.</th>
                                <th>Faculty ID</th>
                                <th>Name (LN, FN, MN) </th>
                                <th>Availability</th>
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
                                <td>61</td>
                                <td>
                                    <div class="btn-group d-flex">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editRoomModal">Edit</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteRoomModal">Delete</button>
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

<!-- Add Faculty Modal-->
<div class="modal fade" id="addFacultyModal" tabindex="-1" role="dialog" aria-labelledby="addFacultyLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFacultyLabel">Adding Faculty</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Faculty ID -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="addfacID">Faculty ID</label>
                        <input type="text" name="addfacID" id="addfacID" maxlength="50">
                    </div>
                    
                    <!-- Faculty FName -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="addfacLName"> Last Name </label>
                        <input type="text" name="addfacLName" id="addfacLName" maxlength="50">
                    </div>
                    <!-- Faculty FName --> 
                    <div class="d-flex justify-content-between mb-4">
                        <label for="addfacFName"> First Name </label>
                        <input type="text" name="addfacFName" id="addfacFName" maxlength="50">
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <label for="addfacMName"> Middle Initial </label>
                        <input type="text" name="addfacMName" id="addfacMName" maxlength="50">
                    </div>

                    <!-- Faculty Availability -->
                    <div class="d-flex justify-content-between mb-1">
                        <label for="addfacAvailability">Faculty Availability</label>
                        <div class="d-flex">
                            <div class="mr-2">
                                <input type="radio" name="addfacAvailability" id="addfacAvailability" value="FT">
                                <label for="addfacAvailability">Full time</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="button" id="addFacultyButton">Add Faculty</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit FacultY Modal-->
<div class="modal fade" id="editFacultyModal" tabindex="-1" role="dialog" aria-labelledby="editFacultyLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFacultyLabel">Edit Faculty</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="d-none justify-content-between mb-4">
                        <label for="editfacNum ">Faculty Number</label>
                        <input type="text" name="editfacNum" id="editfacNum" maxlength="50">
                    </div>
                    <!-- Faculty ID -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editfacID ">Faculty ID</label>
                        <input type="text" name="editfacID" id="editfacID" maxlength="50">
                    </div>
                    <!-- Faculty FName -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editfacLName"> Last Name </label>
                        <input type="text" name="editfacLName" id="editfacLName" maxlength="50">
                    </div>
                    <!-- Faculty MName --> 
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editfacFName"> First Name </label>
                        <input type="text" name="editfacFName" id="editfacFName" maxlength="50">
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <label for="editfacLName"> Middle Initial </label>
                        <input type="text" name="editfacMName" id="editfacMName" maxlength="50">
                    </div>

                     <!-- Faculty Availability -->
                    <div class="d-flex justify-content-between mb-1">
                        <label for="editfacAvailability">Faculty Availability</label>
                        <div class="d-flex">
                            <div class="mr-2">
                                <input type="radio" name="editfacAvailability" id="editfacAvailability" value ="FT">
                                <label for="editfacAvailability">Full time</label>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="button" id="editFacultyButton">Update Faculty</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Room Modal-->
<div class="modal fade" id="deleteFacultyModal" tabindex="-1" role="dialog" aria-labelledby="deleteFacultyLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteFacultyLabel">Delete Faculty?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-1">
                    <p>Are you sure you want to delete this faculty?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="login.html">Delete Faculty</a>
            </div>
        </div>
    </div>
</div>


<!-- <script src="assets/js/room.js"></script>  -->