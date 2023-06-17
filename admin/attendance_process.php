<?php

include 'includes/autoloader.inc.php';


$action = new AttendanceController();
$action->fetchRecordData();
$action->addAttendanceRecord();
$action->updateAttendanceRecord();
