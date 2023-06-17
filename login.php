<?php
session_start();

//redirect if logged in
if (isset($_SESSION['userType'])) {
  header('location:index.php');
}

include 'includes/autoloader.inc.php';
$user = new UserController();
$attendance = new AttendanceController();
$user->login();
$attendance->timeIn();
$attendance->timeOut();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GMC|Payroll</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="shortcut icon" type="image/x-icon" href="images/logo-1.ico">
</head>

<body onload="initClock()">
  <br>
  <center style="margin-top: 9%;" alt="">
    <div class="datetime">
      <div class="date">
        <span id="dayname">Day</span>
        <span id="month">Month</span>
        <span id="daynum">00</span>
        <span id="year">Year</span>
      </div>

      <div class="time">
        <span id="hour">00</span>:
        <span id="minutes">00</span>:
        <span id="seconds">00</span>
        <span id="Period">AM</span>
      </div>
    </div>
  </center>
  <div class="card mx-auto" style="margin-top: 1%;" alt="">
    <p></p>
    <img src="images/logo-2.png" class="mx-auto" style="width: 40%;" alt="">
    <div class="card-body">
      <div class="text-center">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#time_in"> <i class="fa fa-clock">&nbsp;</i>Time in</button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#time_out"> <i class="fa fa-clock">&nbsp;</i>Time out</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginmodal"> <i class="fa fa-unlock">&nbsp;</i>Login</button>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/dclock.js"></script>
  <script src="js/loginAjax.js"></script>
</body>

</html>
<!-- Time in -->
<div class="modal fade" id="time_in">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;">
        <h4 class="modal-title text-white"><b>Time In</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" id="form_timein" method="POST" action="" enctype="multipart/form-data">
          <input type="hidden" id="timeIn_action" value="timeIn">
          <center>
            <div class="col-md-9">
              <label class="form-label"><i class="fa fa-user"></i>&nbsp;Employee ID&nbsp;<a style="color:red;">*</a></label>
              <input type="text" class="form-control text-center" name="timeIn_username" id="timeIn_username">
            </div>
            <p></p>
            <div class="col-md-9">
              <label for="" class=""><i class="fa fa-key" aria-hidden="true"></i> Password</label>
              <input type="password" class="form-control text-center" name="timeIn_password" id="timeIn_password">
            </div>
          </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal" style="margin-right: 295px;">Close</button>
        <button type="button" class="btn btn-success btn-flat" name="timeIn" id="timeIn"><i class="fa fa-clock"></i>Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Time out -->
<div class="modal fade" id="time_out">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: red;">
        <h4 class="modal-title text-white"><b>Time out</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" id="form_timeout" method="POST" action="" enctype="multipart/form-data">
          <input type="hidden" id="timeOut_action" value="timeOut">
          <center>
            <div class="col-md-9">
              <label class="form-label"><i class="fa fa-user"></i>&nbsp;Employee ID&nbsp;<a style="color:red;">*</a></label>
              <input type="text" class="form-control text-center" name="timeOut_username" id="timeOut_username">
            </div>
            <p></p>
            <div class="col-md-9">
              <label for="" class=""><i class="fa fa-key" aria-hidden="true"></i> Password</label>
              <input type="password" class="form-control text-center" name="timeOut_password" id="timeOut_password">
            </div>
          </center>
          <div class="col-md-1">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal" style="margin-right: 295px;">Close</button>
        <button type="button" class="btn btn-danger btn-flat" name="timeOut" id="timeOut"><i class="fa fa-clock"></i>Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Login -->
<div class="modal fade" id="loginmodal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: blue;">
        <h4 class="modal-title text-white"><b>Login</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" id="form_login" action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="action" value="login">
          <center>
            <div class="col-md-9">
              <label class="form-label"><i class="fa fa-user"></i> Username&nbsp;<a style="color:red;">*</a></label>
              <input type="text" class="form-control text-center" name="username" id="username" required>
            </div>
            <p></p>
            <div class="col-md-9">
              <label for="" class=""><i class="fa fa-key" aria-hidden="true"></i> Password</label>
              <input type="password" class="form-control text-center" name="password" id="password">
            </div>
          </center>
          <div class="col-md-1">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal" style="margin-right: 310px;">Close</button>
        <button type="button" class="btn btn-primary btn-flat" name="login" id="login"><i class="fa fa-unlock"></i> Login</button>
        </form>
      </div>
    </div>
  </div>
</div>