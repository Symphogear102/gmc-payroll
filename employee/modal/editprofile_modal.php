<div class="modal fade" id="editprofile">
    <div class="modal-dialog modal-lg modal-dialog-centered  modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary"><b>Edit Employee</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" id="updateEmployee">

                    <div class="row">
                        <center>
                            <div class="form-group ">
                                <div class="col-sm-9" id="profile_userPhoto">

                                </div>
                            </div>
                        </center>
                        <center>
                            <div class=" col-sm-4">
                                <label>Employee ID</label>
                                <input style="text-align: center;" type="text" name="employeeID" id="profile_employeeID" class="form-control" disabled>
                            </div>
                        </center>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="" class="">First Name&nbsp;<a style="color:red;">*</a></label>
                                <input style="text-align: center;" type="text" name="firstname" id="profile_firstname" class="form-control">
                                <div id="firstname_error_update"></div>
                            </div>
                            <div class="col-sm-4">
                                <label for="">M.i&nbsp;<a style="color:red;">*</a></label>
                                <input type="text" style="text-align: center;" name="middlename" id="profile_middlename" class="form-control" required>
                                <div id="middlename_error_update"></div>
                            </div>
                            <div class="col-sm-4">
                                <label>Last Name&nbsp;<a style="color:red;">*</a></label>
                                <input type="text" class="form-control" name="lastname" id="profile_lastname" required>
                                <div id="lastname_error_update"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>Address&nbsp;<a style="color:red;">*</a></label>
                                <input type="text" class="form-control" name="address" id="profile_address" required>
                                <div id="address_error_update"></div>
                            </div>
                            <div class="col-sm-4">
                                <label>Birthday&nbsp;<a style="color:red;">*</a></label>
                                <input type="date" class="form-control" name="birthday" id="profile_birthday" required>
                                <div id="birtdate_error_update"></div>
                            </div>
                            <div class="col-sm-4">
                                <label>Gender&nbsp;<a style="color:red;">*</a></label>
                                <select class="form-control" name="gender" id="profile_gender" required>
                                    <option value="" selected>- Select -</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <div id="gender_error_update"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">
                                <label>Email Address&nbsp;<a style="color:red;">*</a></label>
                                <input type="email" class="form-control" name="email" id="profile_email" required>
                                <div id="email_error_update"></div>
                            </div>
                            <div class="col-sm-4">
                                <label>Contact Info&nbsp;<a style="color:red;">*</a></label>
                                <input type="text" class="form-control" name="contact" id="profile_contact" required>
                                <div id="contact_error_update"></div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                    </div>
                    <input type="hidden" name="userInfoID" id="userInfoID">

                    <div class="modal-footer">
                        <button class="btn btn-sm btn-success btn-flat" name="submit" value="updateprofile"><i class="fa fa-edit"></i> Update</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>