<?php
date_default_timezone_set('Asia/Manila');
$timein = date('8:00:00');
$timeout = date('17:50:00');
$end = strtotime($timeout);
$start = strtotime($timein);
// $interval = $scheduleTime->diff($timein);
// if (date('h.i', $start) <= 8) {
//     echo "on time";
// } else {
//     echo "late";
// }
// // echo number_format(($end - $start) / 3600, 2);
// echo date('h.i', $start);

$workinghour = ($end - $start) / 3600;
echo $workinghour;
