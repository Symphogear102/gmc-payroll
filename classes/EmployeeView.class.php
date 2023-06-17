<?php

class EmployeeView extends Employee
{
    public function fetchUserDetails($employeeID)
    {
        $fetch = $this->getUserDetails($employeeID);
        return $fetch;
    }

    public function displayAttendance($id)
    {
        $attendance = new Attendance();
        $data = $attendance->fetchEmployeeAttendance($id);
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
                    <td style="text-align: left;vertical-align: middle;">' . $row['attendanceDate'] . '</td>
                    <td style="text-align: center; vertical-align: middle;">' . $status . ' ' . $convertedTimeIn . '</td>
                    <td style="text-align: center; vertical-align: middle;">' . $convertedTimeOut . '</td>
                </tr>';
            echo $output;
        }
    }
}
