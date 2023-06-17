<!-- Add -->
<div class="modal fade" id="assignEmployeeModal">
	<div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary"><b>Assign Employee</b></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" id="assignEmployeeForm">
					<br>
					<div class="input-group">
						<span class="input-group-text">Employee ID</span>
						<input type="text" style="text-align:right;" class="form-control" id="assign_employeeID" name="employeeID" required>
						<input type="hidden" class="form-control" id="assign_projectID" name="projectID">
					</div>
					<br>
					<div class="modal-footer">
						<button class="btn btn-sm btn-primary btn-flat" name="assignEmployee" id="assignEmployee"><i class="fa fa-plus"></i>Assign</button>
						<button type="button" class="btn btn-sm btn-danger btn-flat" data-bs-dismiss="modal"><i class="fa fa-ban"></i>Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>