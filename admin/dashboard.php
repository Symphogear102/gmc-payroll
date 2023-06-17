<?php
include 'header.php';
include '../timezone.php';
$userData = new AdminView();
$datas = new AttendanceView();
$total = $userData->displayTotalEmployee();
$OnTime = $datas->OnTimeToday();
$Late = $datas->LateToday();
$OnTimePercentage = $datas->OnTimePercentage();
?>

<div class="main-content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-info">
                        <span class="material-icons">person</span>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Total Employee</strong></p>
                    <h3 class="card-title"><?php echo $total; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-rose">
                        <span class="material-icons">pie_chart</span>

                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>On Time Percentage</strong></p>
                    <h3 class="card-title"><?php echo "<h3>" . number_format($OnTimePercentage, 2) . "<sup style='font-size: 20px'>%</sup></h3>"; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-success">
                        <span class="material-icons">
                            query_builder
                        </span>

                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>On Time today</strong></p>
                    <h3 class="card-title"><?php echo "<h3>" . $OnTime . "</h3>" ?></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-warning">

                        <span class="material-icons">
                            warning
                        </span>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Late Today</strong></p>
                    <h3 class="card-title"><?php echo "<h3>" . $Late . "</h3>" ?></h3>
                </div>
            </div>
        </div>
    </div>
    <center>
        <div class="col-xl-9">
            <div class="card mb-6">
                <div class="card-header">
                    <?php include 'chart.php'; ?>
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </center>
    <?php
    include 'footer.php';
    ?>