<?php
include 'includes/autoloader.inc.php';

$data = new ProjectController;
$data->addProjectDetails();
$data->assignEmployee();
$data->removeAssignedEmployee();
