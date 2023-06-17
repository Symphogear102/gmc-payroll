<?php

//  Child Class
class AttendanceView extends Attendance
{

    public function displayAttendance()
    {
        $data = $this->getCurrentAttendance();
        foreach ($data as $row) {
            $timein = date($row['timeIn']);
            $convertIn = strtotime($timein);
            $convertedTimeIn = date('h:ia', $convertIn);
            $timeOut = date($row['timedOut']);
            $convertOut = strtotime($timeOut);
            if ($row['timedOut'] == null) {
                $convertedTimeOut = '-';
            } else {
                $convertedTimeOut = date('h:ia', $convertOut);
            }

            if ($row['attendanceStatus'] == 'Late') {
                $status = '<span class="badge bg-danger">' . $row['attendanceStatus'] . ' </span>';
            } elseif ($row['attendanceStatus'] == 'On Time') {
                $status = '<span class="badge bg-success">' . $row['attendanceStatus'] . ' </span>';
            } else {
                $status = '<span class="badge bg-secondary">' . $row['attendanceStatus'] . ' </span>';
            }
            $output =
                '
                <tr>
                  <td style="text-align: left; vertical-align: middle;">' . $row['employeeID'] . '</td>
                  <td style="text-align: left; vertical-align: middle;">' . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . '</td>
                  <td style="text-align: right; vertical-align: middle;">' . $status . ' ' . $convertedTimeIn . '</td>
                  <td style="text-align: center; vertical-align: middle;">' . $convertedTimeOut . '</td>
                  <td style="text-align: center; vertical-align: middle;">' . $row['attendanceDate'] . '</td>
                </tr>';
            echo $output;
        }
    }

    public function displayEmployees()
    {
        $data = $this->getUserInfo();
        foreach ($data as $row) {
            $output =
                '
                <tr>
                    <td style="text-align: left; vertical-align: middle;width:600px;">' . $row['employeeID'] . '</td>
                    <td style="text-align: left; vertical-align: middle;width:500px;">' . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . '</td>
                    <td style="text-align: center; vertical-align: middle;">
                        <a href="view_attendance.php?id=' . $row['userInfoID'] . '"><button type="button" class="btn btn-primary btn-sm" value=""><i class="fa fa-eye"></i>&nbsp;View</button></a>
                    </td>
                </tr>';
            echo $output;
        }
    }

    public function getEmployeeAttendance()
    {
        $id = $_GET['id'];

        $data = $this->fetchEmployeeAttendance($id);
        foreach ($data as $row) {
            $timein = date($row['timeIn']);
            $convertIn = strtotime($timein);
            $convertedTimeIn = date('h:ia', $convertIn);
            $timeOut = date($row['timedOut']);
            $convertOut = strtotime($timeOut);
            if ($row['timedOut'] == null) {
                $convertedTimeOut = '-';
            } else {
                $convertedTimeOut = date('h:ia', $convertOut);
            }

            if ($row['attendanceStatus'] == 'Late') {
                $status = '<span class="badge bg-danger">' . $row['attendanceStatus'] . ' </span>';
            } elseif ($row['attendanceStatus'] == 'On Time') {
                $status = '<span class="badge bg-success">' . $row['attendanceStatus'] . ' </span>';
            } else {
                $status = '<span class="badge bg-secondary">' . $row['attendanceStatus'] . ' </span>';
            }

            $output =
                '
                <tr>
                <td style="text-align: center; vertical-align: middle;">' . $row['attendanceDate'] . '</td>
                <td style="text-align: right; vertical-align: middle;">' . $status . ' ' . $convertedTimeIn . '</td>
                <td style="text-align: center; vertical-align: middle;">' . $convertedTimeOut . '</td>
                <td style="text-align: center; vertical-align: middle;"><button type="button" class="btn btn-sm btn-warning text-dark fetchAttendanceData" name="fetchAttendanceData" value="fetchAttendanceData" id="' . $row['attendanceID'] . '"><i class="fa fa-edit"></i>&nbsp; Edit</button>
                
                &nbsp;</td>
                </tr>';
            echo $output;
        }
    }

    public function OnTimeToday()
    {
        $data = $this->getOnTimeToday();
        return $data;
    }

    public function LateToday()
    {
        $data = $this->getLateToday();
        return $data;
    }

    public function OnTimePercentage()
    {
        $data = $this->getPercentage();
        return $data;
    }
}
