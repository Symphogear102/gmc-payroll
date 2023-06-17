<?php
	$conn = new mysqli('localhost', 'root', '', 'gmc_payroll');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>