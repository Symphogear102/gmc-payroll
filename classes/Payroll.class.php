<?php

class Payroll extends Admin
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getEmployeeAttendanceRecordsByDate($from, $to)
    {
        $sql = "SELECT *, SUM(workingHour) AS totalWorkingHour, SUM(overTime) AS totalOverTime FROM employeeattendance JOIN userinfo ON userinfo.userInfoID = employeeattendance.userInfoID WHERE employeeattendance.attendanceDate BETWEEN CAST('$from' AS DATE) AND CAST('$to' AS DATE) AND userinfo.employeeStatus = 'active' GROUP BY userinfo.userInfoID";
        $query = $this->setInfo($sql);
        return $query;
    }
}
