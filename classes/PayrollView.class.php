<?php

class PayrollView extends Payroll
{
    public function displayPayroll($from, $to)
    {

        $rows = $this->getEmployeeAttendanceRecordsByDate($from, $to);
        foreach ($rows as $row) {
            $hourlyRate = ($row['basicSalary'] / 22) / 8;
            $overtimeRate = $hourlyRate * 1.25;
            $totalWorkingHour = $row['totalWorkingHour'] + $row['totalOverTime'];
            $normalWorkingHour = $row['totalWorkingHour'];
            $workPay = $hourlyRate * $normalWorkingHour;
            $overTimePay = $row['totalOverTime'] * $overtimeRate;
            $salary = $workPay + $overTimePay;
            $hourlyRate = number_format($hourlyRate);
            $overtimeRate = number_format($overtimeRate);
            $getDeduction = new Deduction();
            $deduction = $getDeduction->deductionTotal($row['userInfoID']);
            foreach ($deduction as $data) {
                $totalSalary = $salary - $data['deduction_totalAmount'];
                echo '
                        <tr>
                            <td style="visibility:collapse;" hidden>' . $totalWorkingHour . '</td>
                            <td style="visibility:collapse;" hidden>' . $row['basicSalary'] . '</td>
                            <td style="text-align: left; vertical-align: middle; width: 20%;" id="fromToDate">' . $from . ' - ' . $to . '</td>
                            <td style="text-align: left; vertical-align: middle; width: 15%;">' . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . '</td>
                            <td style="text-align: center; vertical-align: middle; width: 15%;">' . $row['employeeID'] . '</td>
                            <td style="text-align: center; vertical-align: middle; width: 10%;">' . $normalWorkingHour . '</td>
                            <td style="text-align: center; vertical-align: middle; width: 10%;">' . $row['totalOverTime'] . '</td>
                            <td style="text-align: right; vertical-align: middle; width: 10%;">' . $data['deduction_totalAmount'] . '</td>
                            <td style="text-align: right; vertical-align: middle; width: 10%;">' . number_format($totalSalary, 2) . '</td>
                            <td style="text-align: center; vertical-align: middle; width: 10%;">
                                <button type="button" class="btn btn-sm btn-primary payslipButton" name="payslipButton" value="payslipButton"><i class="fa fa-print"></i>Payslip</button>
                            </td>
                            <td style="visibility:collapse;" hidden>' . $hourlyRate . '</td>
                            <td style="visibility:collapse;" hidden>' . $overtimeRate . '</td>
                        </tr>';
            }
        }
    }
}
