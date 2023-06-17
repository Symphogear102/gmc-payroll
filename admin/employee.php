<?php
include 'header.php';
?>
<div class="main-content">
  <!-- Employee List -->
  <div class="row ">
    <div class="container-fluid" style="width: 99%;">
      <h2 class="text-primary" style="font-family:Times, Times New Roman, serif;">Employee List</h2>

      <div class="card container-fluid bg-white rounded">
        <br>
        <hr>
        <div class="col-md-12 text-right">
          <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#add_employee"><i class="fa fa-plus"></i>&nbsp; New</button>
        </div>
        <p></p>
        <?php
        $userData = new AdminView();
        $rows = $userData->displayEmployeeInfo();
        $data = new PositionView();
        $positions = $data->getPositionInfo();

        ?>
        <table id="example" class="table table-hover">
          <thead>
            <th style="text-align: center; vertical-align: middle;">Employee ID</th>
            <th style="width:300px;text-align: center; vertical-align: middle;">Full Name</th>
            <th style="text-align: center; vertical-align: middle;">Position</th>
            <th style="text-align: center; vertical-align: middle;">Salary</th>
            <th style="text-align:center;vertical-align: middle;">Member Since</th>
            <th style="text-align:center;vertical-align: middle;">Tools</th>
          </thead>
          <tbody>
            <?php foreach ($rows as $row) : ?>
              <tr>

                <td style="width:300px;text-align: left; vertical-align: middle;"><?php echo $row['employeeID']; ?></td>
                <td style="text-align: left; vertical-align: middle;"><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo $row['positionName']; ?></td>
                <td style="text-align: right; vertical-align: middle;"><?php echo $row['basicSalary']; ?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo $row['registrationDate']; ?></td>
                <td style="text-align: center; vertical-align: middle;">

                  <button type="button" class="btn btn-sm btn-primary text-white editEmployeeData" name="editEmployeeData" value="editEmployeeData" id="<?php echo $row['userInfoID']; ?>"><i class="fa fa-eye"></i>&nbsp;View</button>
                  &nbsp;
                  <button type="submit" class="btn btn-sm btn-danger deleteEmployee" name="deleteEmployee" value="deleteEmployee" id="<?php echo $row['userInfoID']; ?>"><i class="fa fa-trash"></i>&nbsp;Delete</button>

                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php
  include 'modal/employee_modal.php';
  include 'footer.php';
  ?>