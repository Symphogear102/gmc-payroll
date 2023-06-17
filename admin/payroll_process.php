<?php
include 'includes/autoloader.inc.php';

$data = new PayrollController();
$data->generatePayroll();
