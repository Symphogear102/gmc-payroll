<?php
include 'header.php';
$datas = new AttendanceView();

?>
<div class="main-content">
  <div class="row ">
    <div class="container-fluid" style="width: 99%;">
      <h2 class="text-primary" style="font-family:Times, Times New Roman, serif;">Daily Record Attendance</h2>
    </div>
    <div class="card container-fluid bg-white rounded">
      <br>
      <hr>
      <table id="extra" class="table table-hover">
        <thead>
          <th style="text-align: center; vertical-align: middle;">Employee ID</th>
          <th style="text-align: center; vertical-align: middle; ">Full Name</th>
          <th style="text-align: right; vertical-align: middle;">Time in</th>
          <th style="text-align: center; vertical-align: middle;">Time out</th>
          <th style="text-align: center;">Date</th>
        </thead>

        <tbody>
          <?php $datas->displayAttendance(); ?>
        </tbody>
      </table>
    </div>

  </div>
  <?php
  include 'footer.php';
  ?>