<?php

include 'includes/autoloader.inc.php';

$action = new DeductionController();
$action->addDeductionData();
$action->fetchDeductionData();
$action->updateDeductionData();
$action->removeDeductionData();
