<?php
include 'header.php';
// Set your timezone!!
date_default_timezone_set('Asia/Tokyo');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym . '-01');  // the first day of the month
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Today (Format:2018-08-8)
$today = date('Y-m-j');

// Title (Format:August, 2018)
$title = date('F, Y', $timestamp);

// Create prev & next month link
$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);

// 1:Mon 2:Tue 3: Wed ... 7:Sun
$str = date('N', $timestamp);

// Array for calendar
$weeks = [];
$week = '';

// Add empty cell(s)
$week .= str_repeat('<td></td>', $str - 1);

for ($day = 1; $day <= $day_count; $day++, $str++) {

    $date = $ym . '-' . $day;

    if ($today == $date) {
        $week .= '<td id="today">';
    } else {
        $week .= '<td>';
    }
    $week .= $day . '</td>';

    // Sunday OR last day of the month
    if ($str % 7 == 0 || $day == $day_count) {

        // last day of the month
        if ($day == $day_count && $str % 7 != 0) {
            // Add empty cell(s)
            $week .= str_repeat('<td></td>', 7 - $str % 7);
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        $week = '';
    }
}


$info = new EmployeeView();
$data = $info->fetchUserDetails($_SESSION['username']);
?>
<div class="main-content">
    <br>
    <div class="container">
        <div class="col-md-12">
            <div class="jumbotron bg-white" style="height: 100%; width:100%;">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="container">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="?ym=<?= $prev; ?>" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left"></i> prev</a></li>
                                <li class="list-inline-item"><span class="title"><?= $title; ?></span></li>
                                <li class="list-inline-item"><a href="?ym=<?= $next; ?>" class="btn btn-sm btn-primary">next <i class="fa fa-arrow-right"></i> </a></li>
                            </ul>

                            <p class="text-right"><a href="index.php">Today</a></p>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>M</th>
                                        <th>T</th>
                                        <th>W</th>
                                        <th>T</th>
                                        <th>F</th>
                                        <th>S</th>
                                        <th>S</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($weeks as $week) {
                                        echo $week;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body bg-light">
                                <div class="card-title">
                                    <table id="extra">
                                        <thead>
                                            <th style="text-align: left;">Date</th>
                                            <th style="text-align: center; vertical-align: middle;">Time in</th>
                                            <th style="text-align: center; vertical-align: middle;">Time out</th>
                                        </thead>

                                        <tbody>
                                            <?php $info->displayAttendance($data['userInfoID']); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>