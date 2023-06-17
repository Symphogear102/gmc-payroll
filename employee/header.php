<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
  header('location:../login.php');
}
// if ($_SESSION['userType'] != "1") {
//   header('location:../admin/dashboard.php');
// }

include 'includes/autoloader.inc.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title>GMC|Payroll</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!----css3---->
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/datatable.css">
  <link rel="stylesheet" href="css/calendar.css">
  <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

  <!--google material icon-->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <div class="body-overlay"></div>
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <center>
          <h3><img src="../images/logo-2.png" class="img-fluid" style="height:60px;width:60px;border-radius: 15px;object-fit:cover;"></h3>
        </center>
      </div>
      <ul class="list-unstyled components">
        <li class="active">
          <a href="index.php" class="dashboard"><i class="material-icons">house</i><span>Home</span></a>
        </li>
      </ul>
    </nav>

    <div id="content">
      <div class="top-navbar">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
              <span class="material-icons">arrow_back_ios</span>
            </button>

            <a class="navbar-brand" href="#"></a>

            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="material-icons">more_vert</span>
            </button>

            <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="dropdown nav-item active">
                  <a href="#" class="nav-link" data-toggle="dropdown">
                    <span class="material-icons">person</span>

                  </a>
                  <ul class="dropdown-menu">
                    <li class="user-header">
                      <center>
                        <img src="../images/<?php echo $_SESSION['userPhoto']; ?>" style="height: 150px; width: 200px;object-fit:cover;">
                        <small style="font-family:Times, Times New Roman, serif;"><?php echo $_SESSION['username']; ?></small>
                      </center>
                    </li>
                    <hr>
                    <li>
                      <center>
                        <a href="../logout.php" class="btn btn-sm btn-danger" style="width: 200px;"><i class="fa fa-lock"></i>&nbsp;Sign out</a>
                      </center>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <?php
      include 'modal/editprofile_modal.php';
      ?>
      <style type="text/css">
        .mt20 {
          margin-top: 20px;
        }

        .bold {
          font-weight: bold;
        }

        /* chart style*/
        #legend ul {
          list-style: none;
        }

        #legend ul li {
          display: inline;
          padding-left: 30px;
          position: relative;
          margin-bottom: 4px;
          border-radius: 5px;
          padding: 2px 8px 2px 28px;
          font-size: 14px;
          cursor: default;
          -webkit-transition: background-color 200ms ease-in-out;
          -moz-transition: background-color 200ms ease-in-out;
          -o-transition: background-color 200ms ease-in-out;
          transition: background-color 200ms ease-in-out;
        }

        #legend li span {
          display: block;
          position: absolute;
          left: 0;
          top: 0;
          width: 20px;
          height: 100%;
          border-radius: 5px;
        }
      </style>