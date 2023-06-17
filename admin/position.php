<?php
include 'header.php';
?>
<div class="main-content">
  <div class="row ">
    <div class="container-fluid" style="width: 99%;">
      <h2 class="text-primary" style="font-family:Times, Times New Roman, serif;"> List of Positions</h2>
    </div>
    <div class="card container-fluid bg-white rounded">
      <br>
      <hr>
      <div class="col-md-12 text-right">
        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addPositionModal"><i class="fa fa-plus"></i>&nbsp; New</button>
      </div>
      <p></p>
      <table id="extra" class="table table-hover">
        <thead>
          <th style="text-align:center; vertical-align: middle;">Position</th>
          <th style="text-align:center;">Tools</th>
        </thead>
        <tbody>
          <?php
          $data = new PositionView;
          $data->displayPosition();
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php
  include 'modal/position_modal.php';
  include 'footer.php';
  ?>