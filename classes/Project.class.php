<?php

class Project extends Admin
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addProject($projectName, $projectLocation)
    {
        $sql = "INSERT INTO projectdetails (projectName, projectLocation) 
				VALUES ('$projectName', '$projectLocation')";
        $query = $this->setInfo($sql);
        return $query;
    }

    public function getProjectDetails()
    {
        $sql = "SELECT * FROM projectdetails";
        $query = $this->setInfo($sql);
        return $query;
    }

    public function getEmployeeProjectRecordsInfo($id)
    {
        $sql = "SELECT * FROM userinfo, employeeprojectrecords WHERE userinfo.employeeID = employeeprojectrecords.employeeID AND employeeprojectrecords.projectID = $id AND employeeprojectrecords.recordStatus = 'assigned' AND userinfo.employeeStatus ='active' ";
        $query = $this->setInfo($sql);
        return $query;
    }

    public function getProjectName($id)
    {
        $sql = "SELECT * FROM projectdetails WHERE projectID = $id";
        $query = $this->getDetails($sql);
        return $query;
    }

    public function insertEmployeeRecord($employeeID, $projectID, $currentDate, $status)
    {
        $sql = "INSERT INTO employeeprojectrecords(employeeID, projectID, dateAssigned, recordStatus)
				VALUES ('$employeeID', $projectID, '$currentDate', '$status')";
        $query = $this->setinfo($sql);
        if ($query) {
            return $query;
        } else {
            $_SESSION['message'] = "Oops! Something went wrong!";
        }
    }

    public function checkEmployeeID($employeeID)
    {
        $sql = "SELECT employeeID FROM userinfo WHERE employeeID = '$employeeID' AND employeeStatus = 'active' ";
        $query = $this->getDetails($sql);
        return $query;
    }

    public function checkEmployeeOnList($employeeID)
    {
        $sql = "SELECT * FROM employeeprojectrecords WHERE employeeID = '$employeeID' AND recordStatus = 'assigned' ";
        $query = $this->getDetails($sql);
        return $query;
    }

    public function checkEmployeeOnProject($employeeID, $projectID)
    {
        $sql = "SELECT * FROM employeeprojectrecords WHERE employeeID = '$employeeID' AND projectID = $projectID AND recordStatus = 'assigned' ";
        $query = $this->getDetails($sql);
        return $query;
    }

    public function removeAssigned($id)
    {
        $sql = "UPDATE employeeprojectrecords SET recordStatus = 'available' WHERE employeeRecordID = $id ";
        $query = $this->setInfo($sql);
        return $query;
    }
}
