<?php

//  Child Class
class Attendance extends Admin
{
    public function __construct()
    {
        parent::__construct();
    }

    public function recordTimeIn($timeIn, $attendanceDate, $status, $employeeID)
    {
        $sql = "INSERT INTO employeeattendance (timeIn, attendanceDate, attendanceStatus, userInfoID) 
				VALUES ('$timeIn', '$attendanceDate', '$status', '$employeeID')";
        $query = $this->setinfo($sql);
        return $query;
    }

    public function recordTimeOut($employeeID, $currentDate, $timeOut, $workingHour, $overtime)
    {
        $sql = "UPDATE employeeattendance SET timedOut='$timeOut', workingHour = $workingHour, overTime = $overtime WHERE userInfoID = '$employeeID' AND attendanceDate='$currentDate'";
        $query = $this->connection->query($sql);
        return $query;
    }

    public function checkAttendance($employeeID, $currentDate)
    {
        $sql = "SELECT * FROM employeeattendance where userInfoID = '$employeeID' AND attendanceDate = '$currentDate' ";
        $query = $this->connection->query($sql);
        return $query;
    }

    public function getCurrentAttendance()
    {
        $sql = "SELECT * FROM employeeattendance, userinfo WHERE employeeattendance.userInfoID = userinfo.userInfoID AND employeeattendance.attendanceDate = CURDATE()";
        $query = $this->setInfo($sql);
        return $query;
    }

    public function fetchEmployeeAttendance($id)
    {
        $sql = "SELECT * FROM employeeattendance WHERE userInfoID ='$id' ";
        $query = $this->connection->query($sql);
        return $query;
    }

    public function getOnTimeToday()
    {
        $today = date('Y-m-d');
        $sql = "SELECT * FROM employeeattendance WHERE attendanceDate = '$today' AND attendanceStatus = 'On Time'";
        $total = $this->setInfo($sql);
        $query = $total->num_rows;
        return $query;
    }

    public function getLateToday()
    {
        $today = date('Y-m-d');
        $sql = "SELECT * FROM employeeattendance WHERE attendanceDate = '$today' AND attendanceStatus = 'Late'";
        $total = $this->setInfo($sql);
        $query = $total->num_rows;
        return $query;
    }

    public function getPercentage()
    {
        $today = date('Y-m-d');
        $sql = "SELECT * FROM userinfo WHERE employeeStatus = 'active'";
        $query = $this->setInfo($sql);
        $total = $query->num_rows;

        $sql = "SELECT * FROM employeeattendance WHERE attendanceStatus = 'On Time'  AND attendanceDate = '$today'";
        $query = $this->setInfo($sql);
        $early = $query->num_rows;

        $overall = $total - 1;
        $percentage = ($early / $overall) * 100;


        $percentage;

        return $percentage;
    }

    public function recordAttendance($attendanceDate, $timeIn, $timeOut, $employeeID,  $workingHour, $overtime)
    {
        $sql = "INSERT INTO employeeattendance (attendanceDate, timeIn, timedOut, userInfoID, attendanceStatus, workingHour, overTime)
				VALUES ('$attendanceDate', '$timeIn', '$timeOut', '$employeeID', 'modified', $workingHour, $overtime)";
        $query = $this->setinfo($sql);
        return $query;
    }

    public function getAttendanceRecordByID($id)
    {
        $sql = "SELECT * FROM employeeattendance WHERE attendanceID = $id";
        $query = $this->getDetails($sql);
        return $query;
    }

    public function updateAttendanceInfo($id, $attendanceDate, $timeIn, $timeOut, $workingHour, $overtime)
    {
        $sql = "UPDATE employeeattendance SET attendanceDate = '$attendanceDate', timeIn = '$timeIn', timedOut = '$timeOut', workingHour = $workingHour, overTime = $overtime WHERE attendanceID = $id ";
        $query = $this->setInfo($sql);
        return $query;
    }
}
