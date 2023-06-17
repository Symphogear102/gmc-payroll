<!-- Add -->
<div class="modal fade" id="add_employee">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><b>Add Employee</b></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="" id="addNewEmployee" enctype="multipart/form-data">
					<div class="input-group mb-3">
						<span class="input-group-text">First name</span>
						<input type="text" style="text-align:right;" name="firstname" id="firstname" class="form-control">
						<div id="firstname_error" class="text-center"></div>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" style="width: 100px;">M.i</span>
						<input type="text" style="text-align:right;" class="form-control" name="middlename" id="middlename">
						<div id="middlename_error" class="text-center"></div>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" style="width: 100px;">Last name</span>
						<input type="text" style="text-align:right;" class="form-control" name="lastname" id="lastname">
						<div id="lastname_error" class="text-center"></div>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" style="width: 100px;">Address</span>
						<input type="text" style="text-align:right;" class="form-control" name="address" id="address">
						<div id="address_error" class="text-center"></div>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text md-3" style="width: 100px;">Birthday</span>
						<input type="date" class="form-control" name="birthday" id="birthday">
						<div id="birthday_error" class="text-center"></div>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text md-3">Contact Number</span>
						<input type="text" style="text-align:right;" class="form-control" name="contact" id="contact" maxlength="11">
						<div id="contact_error" class="text-center"></div>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text md-3" style="width: 142px;">Email Address</span>
						<input type="email" style="text-align:right;" class="form-control" name="email" id="email">
						<div id="email_error" class="text-center"></div>
					</div>

					<div class="input-group mb-3">
						<label class="input-group-text" style="width: 100px;">Gender</label>
						<select class="form-select" name="gender" id="gender">
							<option selected>Choose...</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
						<div id="gender_error" class="text-center"></div>
					</div>

					<div class=" input-group mb-3">
						<label class="input-group-text" style="width: 100px;">Position</label>
						<select class="form-select" name="position" id="position">
							<option selected>Choose...</option>
							<?php foreach ($positions as $position) : ?>
								<option value="<?php echo $position['positionID']; ?>"> <?php echo $position['positionName']; ?></option>
							<?php endforeach; ?>
						</select>
						<div id=" position_error" class="text-center"></div>
					</div>

					<div class="input-group mb-3">
						<label class="input-group-text" style="width: 100px;">Salary</label>
						<input type="text" style="text-align:right;" class="form-control" name="salary" id="salary">
						<span class="input-group-text">.00</span>
						<div id="salary_error" class="text-center"></div>
					</div>

					<div class="input-group mb-3">
						<input type="file" name="photo" id="photo" class="form-control">
						<label class="input-group-text" for="inputGroupFile02">Upload</label>
						<div id="photo_error" class="text-center"></div>
					</div>

			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-primary btn-flat" name="submit" value="addNewEmployee"><i class="fa fa-plus"></i> Add </button>
				<button type="button" class="btn btn-sm btn-danger btn-flat" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit_employee">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary"><b>Edit Employee</b></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" id="updateEmployeeForm">
					<div class="row">
						<center>
							<div class="form-group ">
								<div class="col-sm-9" id="userPhoto">

								</div>
							</div>
						</center>
						<center>
							<div class=" col-sm-4">
								<label>Employee ID</label>
								<input style="text-align: center;" type="text" name="employeeID" id="employeeID" class="form-control" disabled>
							</div>
						</center>
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="" class="">First Name&nbsp;<a style="color:red;">*</a></label>
								<input style="text-align: left;" type="text" name="firstname" id="update_firstname" class="form-control">
								<div id="firstname_error_update"></div>
							</div>
							<div class="col-sm-4">
								<label for="">M.i&nbsp;<a style="color:red;">*</a></label>
								<input type="text" style="text-align: center;" name="middlename" id="update_middlename" class="form-control" required>
								<div id="middlename_error_update"></div>
							</div>
							<div class="col-sm-4">
								<label>Last Name&nbsp;<a style="color:red;">*</a></label>
								<input type="text" style="text-align:right;" class="form-control" name="lastname" id="update_lastname" required>
								<div id="lastname_error_update"></div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4">
								<label>Address&nbsp;<a style="color:red;">*</a></label>
								<input type="text" class="form-control" name="address" id="update_address" required>
								<div id="address_error_update"></div>
							</div>
							<div class="col-sm-4">
								<label>Birthday&nbsp;<a style="color:red;">*</a></label>
								<input type="date" class="form-control" name="birthday" id="update_birthday" required>
								<div id="birtdate_error_update"></div>
							</div>
							<div class="col-sm-4">
								<label>Gender&nbsp;<a style="color:red;">*</a></label>
								<select class="form-select" name="gender" id="update_gender" required>
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
								<input type="email" class="form-control" name="email" id="update_email" required>
								<div id="email_error_update"></div>
							</div>
							<div class="col-sm-4">
								<label>Contact Info&nbsp;<a style="color:red;">*</a></label>
								<input type="text" class="form-control" name="contact" id="update_contact" required>
								<div id="contact_error_update"></div>
							</div>
							<div class="col-sm-2"></div>
						</div>
						<div class="form-group row">
							<div class="col-sm-2"></div>
							<div class="col-sm-4">
								<label>Position&nbsp;<a style="color:red;">*</a></label>
								<select class="form-select" name="position" id="update_position">
									<option value=""> - Select -</option>
									<?php foreach ($positions as $position) : ?>
										<option value="<?php echo $position['positionID']; ?>"> <?php echo $position['positionName']; ?></option>
									<?php endforeach; ?>
								</select>
								<div id="position_error_update"></div>
							</div>
							<div class="col-sm-4">
								<label>Salary&nbsp;<a style="color:red;">*</a></label>
								<input type="text" class="form-control" name="salary" id="update_salary" required>
								<div id="salary_error_update"></div>
							</div>
							<div class="col-sm-2"></div>
						</div>
					</div>
					<input type="hidden" name="userID" id="userID">

					<div class="modal-footer">
						<button class="btn btn-sm btn-success btn-flat" name="submit" value="updateEmployeeData"><i class="fa fa-edit"></i> Update</button>
						<button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
					</div>
			</div>
			</form>
		</div>
	</div>
</div>
</div>