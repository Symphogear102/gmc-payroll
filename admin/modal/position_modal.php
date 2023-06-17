<!-- Add -->
<div class="modal fade" id="addPositionModal">
	<div class="modal-dialog modal-md  modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary"><b>Add Position</b></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" id="addPositionForm">
					<div class="input-group">
						<span class="input-group-text">Position title</span>
						<input type="text" style="text-align:right;" class="form-control" id="positionName" name="positionName" required>
					</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-primary btn-flat" name="addPosition" id="addPosition"><i class="fa fa-plus"></i> Add</button>
				<button type="button" class="btn btn-sm btn-danger btn-flat" data-bs-dismiss="modal"><i class="fa fa-ban"></i>Close</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Edit -->
<div class="modal fade" id="editPositionModal">
	<div class="modal-dialog modal-md  modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary"><b>Edit Position</b></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" id="updatePositionForm">
					<div class="input-group">
						<span class="input-group-text">Position title</span>
						<input type="text" style="text-align:right;" class="form-control" id="editposition" name="positionName" required>
					</div>
					<input type="hidden" name="id" id="editpositionID">
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-success btn-flat" name="updatePosition" id="updatePosition"><i class="fa fa-edit"></i> Update</button>
				<button type="button" class="btn btn-sm btn-danger btn-flat" data-bs-dismiss="modal"><i class="fa fa-ban"></i>Close</button>
				</form>
			</div>
		</div>
	</div>
</div>