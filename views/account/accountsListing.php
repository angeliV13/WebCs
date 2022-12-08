<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-danger font-weight-bold ">Accounts</h1>
        <a href="#"  class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#addAccountAccountsListingModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Admin</a>
    </div>
    <!-- Content Row -->
    <div class="column">
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-danger">"Account Listing"</h6> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="viewAccountsListing" width="100%" cellspacing="0">
                         <thead>
                            <tr class="text-center">
                                <!-- <th>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </th> -->
                                <th>No.</th>
                                <th>Name</th>
                                <th>Account ID </th>
                                <th>Email Address</th>
                                <th>Position</th>
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
<div class="modal fade" id="addAccountAccountsListingModal" tabindex="-1" role="dialog" aria-labelledby="addAccountAccountsListingLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAccountAccountsListingModal">Add Account</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <!-- Faculty FName -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="addaccountFName"> First Name </label>
                        <input type="text" name="addaccountFName" id="addaccountFName" maxlength="50">
                    </div>
                    <!-- Faculty FName --> 
                    <div class="d-flex justify-content-between mb-4">
                        <label for="addaccountMName"> Middle Name </label>
                        <input type="text" name="addaccountMName" id="addaccountMName" maxlength="50">
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <label for="addaccountLName"> Last Name </label>
                        <input type="text" name="addaccountLName" id="addaccountLName" maxlength="50">
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <label for="addaccountID"> Account ID </label>
                        <input type="text" name="addaccountID" id="addaccountID" maxlength="50">
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <label for="addemailAddress"> Email Address </label>
                        <input type="text" name="addemailAddress" id="addemailAddress" maxlength="50">
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <label for="addposition"> Position </label>
                        <input type="text" name="addposition" id="addposition" maxlength="50">
                    </div>
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger" type="button" id="addAccountAccountsListingButton">Add Faculty</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit FacultY Modal-->
<div class="modal fade" id="editAccountAccountsListingModal" tabindex="-1" role="dialog" aria-labelledby="editAccountAccountsListingLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAccountAccountsListingLabel">Edit Account </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-none justify-content-between mb-4">
                    <label for="editaccountNum"> First Name </label>
                    <input type="text" name="editaccountNum" id="editaccountNum" maxlength="50">
                </div>
                <!-- Faculty FName -->
                <div class="d-flex justify-content-between mb-4">
                    <label for="editaccountFName"> First Name </label>
                    <input type="text" name="editaccountFName" id="editaccountFName" maxlength="50">
                </div>
                <!-- Faculty FName --> 
                <div class="d-flex justify-content-between mb-4">
                    <label for="editaccountMName"> Middle Name </label>
                    <input type="text" name="editaccountMName" id="editaccountMName" maxlength="50">
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <label for="editaccountLName"> Last Name </label>
                    <input type="text" name="editaccountLName" id="editaccountLName" maxlength="50">
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <label for="editaccountID"> Account ID </label>
                    <input type="text" name="editaccountID" id="editaccountID" maxlength="50">
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <label for="editemailAddress"> Email Address </label>
                    <input type="text" name="editemailAddress" id="editemailAddress" maxlength="50">
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <label for="editposition"> Position </label>
                    <input type="text" name="editposition" id="editposition" maxlength="50">
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="button" id="editAccountAccountsListingButton">Update Account</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Room Modal-->
<div class="modal fade" id="deleteAccountAccountsListingModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountAccountsListingLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountAccountsListingLabel">Delete Account?</h5>
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
                <a class="btn btn-danger" href="">Delete  Account</a>
            </div>
        </div>
    </div>
</div>  


<!-- <script src="assets/js/room.js"></script>  -->