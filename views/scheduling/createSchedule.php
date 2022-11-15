<!-- Begin Page Content -->
<div class="container-fluid" >
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create Scheduling</h1>
    <p class="mb-4"> </a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Create Schedule</h6>
        </div>
        <div class="card-body">
            <div>
                <form action="" method="post">
                    <div class="row mb-3 ">
                        <div class="col-lg-3">
                            <label for="semester">Academic Year</label>
                            <select name="acadyear" id="acadyear">
                                <option value="1">First</option>
                                <option value="2">Second</option>
                                <option value="3">Summer</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="semester">Semester</label>
                            <select name="semester" id="semester">
                                <option value="1">First</option>
                                <option value="2">Second</option>
                                <option value="3">Summer</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-between">
                                <label for="itFirst">Sections of IT First Year</label>
                                <input type="number" name="itFirst" id="itFirst" min="0" max="10">
                            </div>
                            <div class="d-flex justify-content-between">
                                <label for="itSecond">Sections of IT Second Year</label>
                                <input type="number" name="itSecond" id="itSecond" min="0" max="10">
                            </div>
                            <div class="d-flex justify-content-between">  
                                <label for="itThird">Number of IT Third Year</label>
                                <input type="number" name="itBAThird" id="itBAThird" min="0" max="10">
                            </div>
                            <div class="d-flex justify-content-between">
                                <label for="itFirst">Number of IT Third Year</label>
                                <input type="number" name="itNTThird" id="itNTThird" min="0" max="10">
                            </div>
                            <div class="d-flex justify-content-between">
                                <label for="itFirst">Number of IT Third Year</label>
                                <input type="number" name="itSMThird" id="itSMThird" min="0" max="10">
                            </div>
                            <div class="d-flex justify-content-between">
                                <label for="itFirst">Number of IT Fourth Year</label>
                                <input type="number" name="itBAFourth" id="itBAFourth" min="0" max="10">
                            </div>
                            <div class="d-flex justify-content-between">
                                <label for="itFirst">Number of IT Fourth Year</label>
                                <input type="number" name="itNTFourth" id="itNTFourth" min="0" max="10">
                            </div>
                            <div class="d-flex justify-content-between">
                                <label for="itFirst">Number of IT Fourth Year</label>
                                <input type="number" name="itSMFourth" id="itSMFourth" min="0" max="10">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-between">
                                <label for="itFirst">Number of CS First Year</label>
                                <input type="number" name="csFirst" id="csFirst" min="0" max="10">
                            </div>
                            <div class="d-flex justify-content-between">
                                <label for="itFirst">Number of CS Second Year</label>
                                <input type="number" name="csSecond" id="csSecond" min="0" max="10">
                            </div>
                            <div class="d-flex justify-content-between">
                                <label for="itFirst">Number of CS Third Year</label>
                                <input type="number" name="csThird" id="csThird" min="0" max="10">
                            </div>
                            <div class="d-flex justify-content-between">
                                <label for="itFirst">Number of CS Fourth Year</label>
                                <input type="number" name="csFourth" id="csFourth" min="0" max="10">
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input class="btn btn-outline-danger px-5" type="button" name="genSched" id = "genSched" value="Generate Schedule">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->