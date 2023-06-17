<?php
include 'includes/autoloader.inc.php';

$data = new PositionController;
$data->fetchPositionData();
$data->updatePositionInfo();
$data->addPositionDetails();
