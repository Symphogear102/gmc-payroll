<?php
include 'header.php';
$datas = new AttendanceView();
?>
<div class="main-content">
  <div class="row ">
    <div class="container-fluid" style="width: 99%;">
      <h2 class="text-primary" style="font-family:Times, Times New Roman, serif;">General attendance</h2>
    </div>
    <div class="card container-fluid bg-white rounded">
      <br>
      <table id="extra" class="table table-hover">
        <thead>
          <th style="text-align:center;">Employee ID</th>
          <th style="text-align:center;">Full Name</th>
          <th style="text-align:center;">Tools</th>
        </thead>
        <tbody>
          <?php $datas->displayEmployees(); ?>
        </tbody>
      </table>
      </table>
    </div>
  </div>
  <?php
  include 'modal/attendance_modal.php';
  include 'footer.php';
  ?>