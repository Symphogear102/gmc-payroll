<?php

//  Child Class
class AttendanceController extends Attendance
{
    public function __construct()
    {
        parent::__construct();
    }

    public function timeIn()
    {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == "timeIn") {
                $username = mysqli_real_escape_string($this->connection, $_POST['username']);
                $password = mysqli_real_escape_string($this->connection, $_POST['password']);

                $auth = $this->checkLogin($username, $password);

                if ($auth) {
                    $employeeID = $auth['userInfoID'];
                    //time in
                    date_default_timezone_set('Asia/Manila');
                    $currentDate = date('Y-m-d');
                    $timeIn = date('H:i');
                    $scheduleTime = date('8:00:00');
                    $convertTimeIn = strtotime($timeIn);
                    $convertSchedTime = strtotime($scheduleTime);

                    //checking if late
                    if ($convertTimeIn <= $convertSchedTime) {
                        $status = "On Time";
                    } else {
                        $status = "Late";
                    }
                    $checkAttendance = $this->checkAttendance($employeeID, $currentDate);

                    if ($checkAttendance->num_rows == 0) {
                        $recordAttendance = $this->recordTimeIn($timeIn, $currentDate, $status, $employeeID);
                        if ($recordAttendance) {
                            echo "Success";
                            exit;
                        }
                    } else {
                        echo "You've already timed in for today!";
                        exit;
                    }
                }
            }
        }
    }

    public function timeOut()
    {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == "timeOut") {
                $username = mysqli_real_escape_string($this->connection, $_POST['username']);
                $password = mysqli_real_escape_string($this->connection, $_POST['password']);

                $auth = $this->checkLogin($username, $password);

                if ($auth) {
                    $employeeID = $auth['userInfoID'];
                    //time in
                    date_default_timezone_set('Asia/Manila');
                    $currentDate = date('Y-m-d');
                    $timeOut = date('H:i');

                    $checkAttendance = $this->checkAttendance($employeeID, $currentDate);

                    if ($checkAttendance->num_rows == 0) {
                        echo "You haven't timed in yet!";
                        exit;
                    } else {
                        $data = $checkAttendance->fetch_array();
                        $timeIn = date($data['timeIn']);
                        $start = strtotime($timeIn);
                        $end = strtotime($timeOut);
                        $workingHour = (($end - $start) / 3600) - 1;
                        if ($workingHour >= 8) {
                            $overtime = ($workingHour - 1) - 8;
                        } else {
                            $overtime = 0;
                        }

                        if ($data['timedOut'] == null) {
                            $recordAttendance = $this->recordTimeOut($employeeID, $currentDate, $timeOut, $workingHour, $overtime);
                            if ($recordAttendance) {
                                echo "Success";
                                exit;
                            }
                        } else {
                            echo "You've already timed out for today!";
                            exit;
                        }
                    }
                }
            }
        }
    }

    public function addAttendanceRecord()
    {
        extract($_REQUEST);
        if (isset($submit) && $submit == "addAttendance") {
            $timeInToDate = date($timeIn);
            $timeOutToDate = date($timeOut);
            $start = strtotime($timeInToDate);
            $end = strtotime($timeOutToDate);
            $workingHour = (($end - $start) / 3600) - 1;
            if ($workingHour >= 8) {
                $overtime = ($workingHour) - 8;
            } else {
                $overtime = 0;
            }

            $attendanceRecord = $this->checkAttendance($employeeID, $attendanceDate);

            if ($attendanceRecord->num_rows == 0) {
                $record = $this->recordAttendance($attendanceDate, $timeIn, $timeOut, $employeeID, $workingHour, $overtime);
                if ($record) {
                    echo "success";
                    exit;
                }
            } else {
                echo "failed";
                exit;
            }
        }
    }

    public function fetchRecordData()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->getAttendanceRecordByID($id);
            echo json_encode($data);
        }
    }

    public function updateAttendanceRecord()
    {
        extract($_REQUEST);
        if (isset($submit) && $submit == "updateAttendanceRecord") {
            $timeInToDate = date($timeIn);
            $timeOutToDate = date($timeOut);
            $start = strtotime($timeInToDate);
            $end = strtotime($timeOutToDate);
            $workingHour = (($end - $start) / 3600) - 1;
            if ($workingHour >= 8) {
                $overtime = ($workingHour) - 8;
            } else {
                $overtime = 0;
            }

            $update = $this->updateAttendanceInfo($id, $attendanceDate, $timeIn, $timeOut, $workingHour, $overtime);
            if ($update) {
                echo "success";
                exit;
            } else {
                echo 'failed';
                exit;
            }
        }
    }
}
