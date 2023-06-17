<?php

include 'includes/autoloader.inc.php';

$action = new AdminController();
$action->addNewEmployee();
$action->fetchEmployeeData();
$action->updateEmployeeInfo();
$action->deleteEmployeeInfo();
