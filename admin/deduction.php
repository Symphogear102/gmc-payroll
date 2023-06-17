<?php
include 'header.php';
$data = new DeductionView();
$details = new AdminView();
$employeeDetails = $details->employeeDetails($_GET['id']);
?>
<div class="main-content">
  <div class="row ">
    <div class="container-fluid" style="width: 99%;">
      <h2 class="text-primary" style="font-family:Times, Times New Roman, serif;"> Deduction List</h2>
    </div>
    <div class="card container-fluid bg-white rounded">
      <br>
      <hr>
      <h2 class="text-left text-success" style="font-family:Times, Times New Roman, serif;"><?php echo $employeeDetails['firstname']  . " " . $employeeDetails['lastname']; ?></h2>
      <h2 class="text-left text-success" style="font-family:Times, Times New Roman, serif;"> <?php echo $employeeDetails['employeeID']; ?> </h2>

      <div class="col-md-12 text-right">
        <button type="button" class="btn btn-sm btn-success addDeductionButton" name="addDeductionButton" value="addDeductionButton" id="<?php echo $_GET['id']; ?>"><i class="fa fa-plus"></i>&nbsp; Assign</button>
        <button type="button" class=" text-right btn btn-sm btn-danger btn-flat" data-bs-placement="left" onclick="history.back()"><i class="fa fa-arrow-left"></i> Back</button>
      </div>
      <p></p>


      <table id="extra" class="table table-hover">
        <thead>
          <th style="text-align: center; vertical-align: middle;">Description</th>
          <th style="text-align: right; vertical-align: middle;">Amount</th>
          <th style="text-align:center;">Tools</th>
        </thead>
        <tbody id="deduction_result">
          <?php
          $data->displayDeductionData($_GET['id']);
          ?>
        </tbody>
      </table>
    </div>

  </div>
  <?php
  include 'modal/deduction_modal.php';
  include 'footer.php';
  ?>