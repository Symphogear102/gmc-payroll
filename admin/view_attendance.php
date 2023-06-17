<?php
include 'header.php';
$datas = new AttendanceView();
$data = new AdminView();
$employeeDetails = $data->employeeDetails($_GET['id']);
?>
<div class="main-content">
  <div class="row ">
    <div class="container-fluid" style="width: 99%;">
      <h2 class="text-primary" style="font-family:Times, Times New Roman, serif;">Record of Attendance</h2>
    </div>
    <div class="card container-fluid bg-white rounded">
      <hr>
      <h2 class="text-left text-success" style="font-family:Times, Times New Roman, serif;"><?php echo $employeeDetails['firstname']  . " " . $employeeDetails['lastname']; ?></h2>
      <h2 class="text-left text-success" style="font-family:Times, Times New Roman, serif;"> <?php echo $employeeDetails['employeeID']; ?> </h2>
      <div class="row">
        <div class="col-md-12 text-right">
          <button type="button" class="btn btn-sm btn-success fetchByEmployeeID" name="fetchByEmployeeID" value="fetchByEmployeeID" id="<?php echo $_GET['id']; ?>"><i class="fa fa-plus"></i>&nbsp; New</button>
          <button type="button" class=" text-right btn btn-sm btn-danger btn-flat" data-bs-placement="left" onclick="history.back()"><i class="fa fa-arrow-left"></i> Back</button>
        </div>
      </div>
      <p></p>
      <table id="extra" class="table table-hover">
        <thead>
          <th style=" text-align: center; vertical-align: middle;">Date</th>
          <th style=" text-align: right; vertical-align: middle;">Time in</th>
          <th style="text-align: center; vertical-align: middle;">Time out</th>
          <th style=" text-align: center; vertical-align: middle;">Tool</th>

        </thead>
        <tbody>
          <?php $datas->getEmployeeAttendance(); ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php
  include 'modal/attendance_modal.php';
  include 'footer.php';
  ?>