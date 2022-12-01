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
                    <table class="table table-bordered" id="viewRoom" width="100%" cellspacing="0">
                         <thead>
                            <tr class="text-center">
                                <th>
                                    <input class="w-100" type="checkbox" name="check1" id="check1">
                                </th>
                                <th>No.</th>
                                <th>Room</th>
                                <th>Room Location</th>
                                <th>Room Type</th>
                                <th>Room Availability</th>
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

<!-- Add Room Modal-->
<div class="modal fade" id="addRoomModal" tabindex="-1" role="dialog" aria-labelledby="addRoomLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRoomLabel">Adding Room</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Room Number -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="roomName">Room</label>
                        <input type="text" name="roomName" id="roomName" maxlength="10">
                        
                    </div>
                    
                    <!-- Room Location -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="roomLoc">Room Location</label>
                        <input type="text" name="roomLoc" id="roomLoc" maxlength="10">
                    </div>

                    <!-- Laboratory -->
                    <div class="d-flex justify-content-between mb-1">
                        <label for="roomLab">Room Type</label>
                        <div class="d-flex">
                            <div class="mr-2">
                                <input type="radio" name="roomType" id="roomType" value="1">
                                <label for="roomLab">Classroom</label>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="roomType" id="roomType" value="2">
                                <label for="roomLab">Computer Lab</label>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="roomType" id="roomType" value="3">
                                <label for="roomLab">Speech Lab</label>
                            </div>
                        </div>
                    </div>

                    <!-- Room Availability  ---- WORK IN PROGRESS -->
                    <!-- <div class="d-flex justify-content-between mb-1">
                        <label for="roomLab">Availability</label>
                        <div class="d-flex">
                            <div class="mr-5">
                                <input type="radio" name="roomAvail" id="roomAvail" value="1">
                                <label for="roomLab"></label>
                            </div>
                            <div class="mr-5">
                                <input type="radio" name="roomAvail" id="roomAvail" value="0">
                                <label for="roomLab">No</label>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="button" id="addRoomButton">Add Room</button>
                </div>
            </form>
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
                    <!-- Room ID -->
                    <div class="d-none justify-content-between mb-4">
                        <label for="editRoomNum">Room ID</label>
                        <input type="text" name="editRoomNum" id="editRoomNum" maxlength="10">
                    </div>
                    <!-- Room Name -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editRoomName">Room</label>
                        <input type="text" name="editRoomName" id="editRoomName" maxlength="10">

                    </div>

                    <!-- Room Location -->
                    <div class="d-flex justify-content-between mb-4">
                        <label for="editRoomLoc">Room Location</label>
                        <input type="text" name="editRoomLoc" id="editRoomLoc" maxlength="10">
                    </div>

                    <!-- Laboratory -->
                    <div class="d-flex justify-content-between mb-1">
                        <label for="editRoomType">Room Type</label>
                        <div class="d-flex">
                            <div class="mr-2">
                                <input type="radio" name="editRoomType" id="editClassRoom" value="1">
                                <label for="editRoomType">Classroom</label>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="editRoomType" id="editCompLab" value="2">
                                <label for="editRoomType">Computer Lab</label>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="editRoomType" id="editSpeechLab" value="3">
                                <label for="editRoomType">Speech Lab</label>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Room Availability  ---- WORK IN PROGRESS -->
                    <!-- <div class="d-flex justify-content-between mb-1">
                        <label for="editRoomLab">Availability</label>
                        <div class="d-flex">
                            <div class="mr-5">
                                <input type="radio" name="editRoomAvail" id="editRoomAvail" value="1">
                                <label for="editRoomLab"></label>
                            </div>
                            <div class="mr-5">
                                <input type="radio" name="editRoomAvail" id="editRoomAvail" value="0">
                                <label for="editRoomLab">No</label>
                            </div>
                        </div>
                    </div> -->
                </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="button" id="editRoomButton">Edit</button>
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


<!-- <script src="assets/js/room.js"></script> -->