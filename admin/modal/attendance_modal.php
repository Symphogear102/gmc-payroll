<div class="modal fade" id="addattendance">
	<div class="modal-dialog modal-md  modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary"><b>Add Attendance</b></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" id="addAttendanceForm">
					<br>
					<div class="input-group mb-3">
						<span class="input-group-text">Employee ID</span>
						<input type="text" class="form-control" value="<?php echo $employeeDetails['employeeID']; ?>" name="employeeID" disabled>
						<input type="hidden" class="form-control" id="addAttendance_employeeID" name="employeeID">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text">Date</span>
						<input type="date" class="form-control" id="addAttendance_Date" name="attendanceDate" required>
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" style="width: 100px;">Time In</span>
						<input type="time" class="form-control" id="addAttendance_in" name="timeIn" value="08:00">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" style="width: 100px;">Time Out</span>
						<input type="time" class="form-control" id="addAttendance_Out" name="timeOut" value="17:00">
					</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-primary btn-flat" name="submit" value="addAttendance"><i class="fa fa-plus"></i> Add </button>
				<button type="button" class="btn btn-sm btn-danger btn-flat" data-bs-dismiss="modal"><i class="fa fa-ban"></i>Close</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- Edit -->
<div class="modal fade" id="editattendance">
	<div class="modal-dialog modal-md  modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary"><b>Edit Attendance</b></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" id="updateAttendanceForm">
					<br>
					<div class="input-group mb-3">
						<span class="input-group-text">Date</span>
						<input type="date" class="form-control" id="update_date" name="attendanceDate">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" style="width: 100px;">Time In</span>
						<input type="time" class="form-control" id="update_timeIn" name="timeIn" required>
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" style="width: 100px;">Time Out</span>
						<input type="time" class="form-control" id="update_timeOut" name="timeOut" required>
					</div>
					<input type="hidden" name="id" id="attendanceID">
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-success btn-flat" name="updateAttendanceRecord" value="updateAttendanceRecord"><i class="fa fa-edit"></i> Save</button>
				<button type="button" class="btn btn-sm btn-danger btn-flat" data-bs-dismiss="modal"><i class="fa fa-ban"></i>Close</button>
				</form>
			</div>
		</div>
	</div>
</div>