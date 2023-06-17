<?php

class Admin extends User
{
	public function __construct()
	{
		parent::__construct();
	}

	public function generateEmployeeID()
	{
		$sql = "SELECT * FROM userinfo ORDER BY userInfoID DESC LIMIT 1";
		$row = $this->getDetails($sql);
		if ($row > 0) {
			$employeeID = $row['employeeID'];
			$getNumbers = str_replace("GMC-", "", $employeeID);
			$idIncrease = $getNumbers + 1;
			$getString = str_pad($idIncrease, 4, 0, STR_PAD_LEFT);
			$newEmployeeID = "GMC-" . $getString;
		} else {
			$newEmployeeID = 'GMC-0001';
		}
		return $newEmployeeID;
	}

	public function addEmployee($firstname, $middlename, $lastname, $contactNumber, $userAddress, $gender, $bday, $emailAddress, $registrationDate, $employeeID, $userPhoto, $position, $basicSalary)
	{
		$sql = "INSERT INTO userinfo (firstname, middlename, lastname, contactNumber, userAddress, gender, bday, emailAddress, registrationDate, employeeID, employeeStatus, userPhoto, position, basicSalary) 
				VALUES ('$firstname', '$middlename', '$lastname', '$contactNumber', '$userAddress', '$gender', '$bday', '$emailAddress', '$registrationDate', '$employeeID', 'active', '$userPhoto', $position, $basicSalary)";
		$query = $this->setinfo($sql);
		if ($query) {
			return $query;
		} else {
			echo "There is a problem on database!";
		}
	}

	public function createLoginAccount($employeeID, $password, $registrationDate)
	{
		$sql = "INSERT INTO userlogin(userID, pwd, userType, registrationDate)
				VALUES ('$employeeID', '$password', 1, '$registrationDate')";
		$query = $this->setinfo($sql);
		if ($query) {
			return $query;
		} else {
			echo "There is a problem on database!";
		}
	}

	public function getUserInfo()
	{
		$sql = "SELECT * FROM userinfo, userlogin, positionlist WHERE userlogin.userID = userinfo.employeeID AND positionlist.positionID = userinfo.position AND userlogin.userType = 1 AND userinfo.employeeStatus = 'active' ";
		$query = $this->setInfo($sql);
		return $query;
	}

	public function getEmployeeInfo($id)
	{
		$sql = "SELECT * FROM userinfo, positionlist WHERE positionlist.positionID = userinfo.position AND userinfo.userInfoID = $id";
		$query = $this->getDetails($sql);
		return $query;
	}


	public function updateEmployee($userID, $firstname, $middlename, $lastname, $address, $birthday, $contact, $gender, $email, $position, $salary)
	{
		$sql = "UPDATE userinfo SET firstname = '$firstname', middlename= '$middlename', lastname = '$lastname', gender = '$gender', contactNumber = '$contact', userAddress = '$address', bday = '$birthday', emailAddress = '$email', position ='$position', basicSalary = $salary WHERE userInfoID = $userID ";
		$query = $this->setInfo($sql);
		return $query;
	}

	public function deleteEmployee($id)
	{
		$sql = "UPDATE userinfo SET employeeStatus = 'inactive' WHERE userInfoID = $id ";
		$query = $this->setInfo($sql);
		return $query;
	}



	public function getTotalEmployee()
	{

		$sql = "SELECT userinfoID FROM userinfo ORDER BY userInfoID";
		$total = $this->setInfo($sql);
		$query = mysqli_num_rows($total);
		return $query;
	}
}
