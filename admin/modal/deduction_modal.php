<!-- Add -->
<div class="modal fade" id="addDeductionModal">
	<div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary"><b>Add Deduction</b></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" id="addDeductionForm">
					<div class="input-group mb-3">
						<span class="input-group-text">Description</span>
						<input type="text" style="text-align:right;" class="form-control" id="deduction_description" name="description" required>
						<input type="hidden" id="deduction_userInfoID" name="id">
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" style="width: 105px;">Amount</span>
						<input type="text" style="text-align:right;" class="form-control" id="deduction_amount" name="amount" placeholder="0.00" required>
						<div id="deduction_amount_error" class="text-center"></div>
					</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-primary btn-flat" name="addDeduction" id="addDeduction"><i class="fa fa-plus"></i> Add</button>
				<button type="button" class="btn btn-sm btn-danger btn-flat" data-bs-dismiss="modal"><i class="fa fa-ban"></i>Close</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Edit -->
<div class="modal fade" id="editDeductionModal">
	<div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary"><b>Edit Deduction</b></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" id="editDeductionForm">
					<div class="input-group mb-3">
						<span class="input-group-text">Description</span>
						<input type="text" style="text-align:right;" class="form-control" id="edit_description" name="description" required>
						<input type="hidden" id="edit_deductionID" name="id">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" style="width: 105px;">Amount</span>
						<input type="text" style="text-align:right;" class="form-control" id="edit_amount" name="amount" required>
						<div id="edit_deduction_amount_error" class="text-center"></div>
					</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-success btn-flat" name="editDeductionData" id="editDeductionData"><i class="fa fa-edit"></i> Update</button>
				<button type="button" class="btn btn-sm btn-danger btn-flat" data-bs-dismiss="modal"><i class="fa fa-ban"></i>Close</button>
				</form>
			</div>
		</div>
	</div>
</div>