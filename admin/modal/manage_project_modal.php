<!-- Add -->
<div class="modal fade" id="addProjectModal">
	<div class="modal-dialog modal-md  modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary"><b>Add Project</b></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" id="addProjectForm">
					<div class="input-group">
						<span class="input-group-text" style="width: 140px;">Project Name</span>
						<input type="text" style="text-align:right;" class="form-control" id="projectName" name="projectName" required>
					</div>
					<br>

					<div class="input-group">
						<span class="input-group-text">Project Location</span>
						<input type="text" style="text-align:right;" class="form-control" id="projectLocation" name="projectLocation" required>
					</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-primary btn-flat" name="addProject" id="addProject"><i class="fa fa-plus"></i> Save</button>
				<button type="button" class="btn btn-sm btn-danger btn-flat" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Close</button>
				</form>
			</div>
		</div>
	</div>
</div>