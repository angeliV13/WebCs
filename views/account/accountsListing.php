<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Accounts</h1>
    </div>
    <!-- Content Row -->
    <div class="column">
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">Account List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="viewAccount" width="100%" cellspacing="0">
                         <thead>
                            <tr class="text-center">
                                <th>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </th>
                                <th>No.</th>
                                <th>Employee ID</th>
                                <th>NAME (FN, MN, LN)</th>
                                <th>Active Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


<!-- Add course Modal-->
<!-- <div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAccountLabel">Account Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-1">
                    <label for="accountFirstName">First Name </label>
                    <input type="text" name="instructorsFirstName" id="instructorsFirstName" maxlength="10">
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="instructorsMiddleName">Middle Name</label>
                    <input type="text" name="accountMiddleName" id="accountMiddleName" maxlength="10">
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="accountSurName">Surname</label>
                    <input type="text" name="accountSurName" id="accountSurName" maxlength="10">
                </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="login.html">Add Course</a>
            </div>
        </div>
    </div>
</div> -->


<!-- Edit Room Modal-->
<div class="modal fade" id="editInstructorsModal" tabindex="-4" role="dialog" aria-labelledby="editInstructorsLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInstructorsLabel">Edit Instructor</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-1">
                    <label for="instructorsFirstName">First Name </label>
                    <input type="text" name="instructorsFirstName" id="instructorsFirstName" maxlength="10">
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="instructorsMiddleName">Middle Name</label>
                    <input type="text" name="instructorsMiddleName" id="instructorsMiddleName" maxlength="10">
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="instructorsSurName">Surname</label>
                    <input type="text" name="instructorsSurName" id="instructorsSurName" maxlength="10">
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="instructorsType">Instructor Type</label>
                    <div class="d-flex">
                        <div class="mr-1">
                            <input type="radio" name="instructorsType" id="instructorsType" value="1">
                            <label for="instructorsType">Permanent Lecturer</label>
                        </div>
                        <div class="mr-1">
                            <input type="radio" name="instructorsType" id="instructorsType" value="1">
                            <label for="instructorsType">Guest Lecturer</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="instructorsType">Instructor Availability</label>
                    <div class="d-flex">
                        <div class="mr-1">
                            <input type="radio" name="instructorsAvail" id="instructorsType" value="1">
                            <label for="instructorsAvail">Part time</label>
                        </div>
                        <div class="mr-1">
                            <input type="radio" name="instructorsAvail" id="instructorsAvail" value="1">
                            <label for="instructorsAvail">Full time</label>
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
<div class="modal fade" id="deleteInstructorsModal" tabindex="-1" role="dialog" aria-labelledby="deleteInstructorsLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInstructorsLabel">Delete Instructor?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-1">
                    <p>Are you sure you want to delete this Instructors?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="login.html">Delete</a>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/account.js"></script>

