<?php

//  Child Class
class DeductionView extends Deduction
{

    public function displayEmployees()
    {
        $data = $this->getUserInfo();
        foreach ($data as $row) {
            $output =
                '
                <tr>
                    <td style="text-align: left; vertical-align: middle;width:600px;">' . $row['employeeID'] . '</td>
                    <td style="text-align: left; vertical-align: middle;width:500px;">' . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . '</td>
                    <td style="text-align:center;">
                        <a href="deduction.php?id=' . $row['userInfoID'] . '"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp;View</button></td></a>
                    </td>
                </tr>';
            echo $output;
        }
    }

    public function displayDeductionData($id)
    {
        $data = $this->getDeductionData($id);
        foreach ($data as $row) {
            echo
            '
                <tr>
                    <td style="text-align: left;vertical-align: middle;">' . $row['deduction_name'] . '</td>
                    <td style="text-align: right; vertical-align: middle;">' . $row['deduction_amount'] . '</td>
                    <td style="text-align: center; vertical-align: middle;">
                    <button type="button" class="btn btn-sm btn-warning text-black editDeductionButton" name="  " value="editDeductionButton" id="' . $row['deductionID'] . '"><i class="fa fa-edit"></i>&nbsp; Edit</button>&nbsp;
                    <button class="btn btn-sm btn-danger removeDeductionData" name="removeDeductionData" value="removeDeductionData" id="' . $row['deductionID'] . '"><i class="fa fa-trash"></i>&nbsp;Delete</button>

                    </td>
            </tr>';
        }
    }
}
