<?php
include 'header.php';
$data = new ProjectView;
?>

<div class="main-content">
  <div class="row ">
    <div class="container-fluid" style="width: 99%;">
      <h2 class="text-primary" style="font-family:Times, Times New Roman, serif;"> List of Workers</h2>
    </div>
    <div class="card container-fluid bg-white rounded">
      <br>
      <hr>
      <div class="row">
        <div class="col-md-12 text-right">
          <button type="button" class="btn btn-sm btn-success assignEmployeeButton" name="assignEmployeeButton" value="assignEmployeeButton" id="<?php echo $_GET['id']; ?>"><i class="fa fa-plus"></i>&nbsp; Assign</button>
          <button type="button" class=" text-right btn btn-sm btn-danger btn-flat" data-bs-placement="left" onclick="history.back()"><i class="fa fa-arrow-left"></i> Back</button>
        </div>
      </div>

      <p></p>


      <table id="extra" class="table table-hover">
        <thead>
          <th style="text-align: center;">Date</th>
          <th style="text-align: center; vertical-align: middle;">Employee ID</th>
          <th style="text-align: center; vertical-align: middle;">Full Name</th>
          <th style="text-align:center;">Tools</th>
        </thead>

        <tbody>
          <?php
          $data->employeeProjectRecords();
          ?>
        </tbody>
      </table>
    </div>
    <?php
    include 'modal/assignproject_modal.php';
    include 'footer.php';
    ?>