<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rooms</h1>
        <a href="#"  class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#addRoomModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Room</a>
    </div>
    <!-- Content Row -->
    <div class="column">
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">Room List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="room" width="100%" cellspacing="0">
                         <thead>
                            <tr class="text-center">
                                <th>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </th>
                                <th>No.</th>
                                <th>Room</th>   
                                <th>Room Location</th>
                                <th>Laboratory</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </td>
                                <td>1</td>
                                <td>CECS 101</td>
                                <td>BSIT</td>
                                <td>61</td>
                                <td>
                                    <div class="btn-group d-flex">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editRoomModal">Edit</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteRoomModal">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </td>
                                <td>2</td>
                                <td>CECS 101</td>
                                <td>BSIT</td>
                                <td>63</td>
                                <td>
                                    <div class="btn-group d-flex">
                                        <button class="btn btn-warning">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </td>
                                <td>3</td>
                                <td>CECS 101</td>
                                <td>BSIT</td>
                                <td>66</td>
                                <td>
                                    <div class="btn-group d-flex">
                                        <button class="btn btn-warning">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </td>
                                <td>4</td>
                                <td>CECS 101</td>
                                <td>BSIT</td>
                                <td>22</td>
                                <td>
                                    <div class="btn-group d-flex">
                                        <button class="btn btn-warning">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </td>
                                <td>5</td>
                                <td>CECS 101</td>
                                <td>BSIT</td>
                                <td>33</td>
                                <td>
                                    <div class="btn-group d-flex">
                                        <button class="btn btn-warning">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

        
    <div></div>

</div>
<!-- /.container-fluid -->

<!-- Add Room Modal-->
<div class="modal fade" id="addRoomModal" tabindex="-1" role="dialog" aria-labelledby="addRoomLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoomLabel">Adding Room</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-1">
                    <label for="roomName">Room</label>
                    <input type="text" name="roomName" id="roomName" maxlength="10">
                    
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="roomLoc">Room Location</label>
                    <input type="text" name="roomLoc" id="roomLoc" maxlength="10">
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="roomLab">Laboratory</label>
                    <div class="d-flex">
                        <div class="mr-5">
                            <input type="radio" name="roomLab" id="roomName" value="1">
                            <label for="roomLab">Yes</label>
                        </div>
                        <div class="mr-5">
                            <input type="radio" name="roomLab" id="roomName" value="1">
                            <label for="roomLab">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-dangerx" href="login.html">Add</a>
            </div>
        </div>
    </div>
</div>

<!-- Edit Room Modal-->
<div class="modal fade" id="editRoomModal" tabindex="-1" role="dialog" aria-labelledby="editRoomLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoomLabel">Edit Room</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-1">
                    <label for="roomName">Room</label>
                    <input type="text" name="roomName" id="roomName" maxlength="10">
                    
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="roomLoc">Room Location</label>
                    <input type="text" name="roomLoc" id="roomLoc" maxlength="10">
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <label for="roomLab">Laboratory</label>
                    <div class="d-flex">
                        <div class="mr-5">
                            <input type="radio" name="roomLab" id="roomName" value="1">
                            <label for="roomLab">Yes</label>
                        </div>
                        <div class="mr-5">
                            <input type="radio" name="roomLab" id="roomName" value="1">
                            <label for="roomLab">No</label>
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
<div class="modal fade" id="deleteRoomModal" tabindex="-1" role="dialog" aria-labelledby="deleteRoomLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoomLabel">Delete Room?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-1">
                    <p>Are you sure you want to delete this room?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="login.html">Delete</a>
            </div>
        </div>
    </div>
</div>

