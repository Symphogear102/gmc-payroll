<?php

class ProjectView extends Project
{
    public function employeeProjectRecords()
    {
        $id = $_GET['id'];
        $data = $this->getEmployeeProjectRecordsInfo($id);
        foreach ($data as $row) {
            $output =
                '<tr>
                    <td style="text-align: left;vertical-align: middle;">' . $row['dateAssigned'] . '</td>
                    <td style="text-align: center; vertical-align: middle;">' . $row['employeeID'] . '</td>
                    <td style="text-align: left; vertical-align: middle;">' . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . '</td>
                    <td style="text-align: center; vertical-align: middle;">
                    <button class="btn btn-sm btn-danger removeEmployee" name="removeEmployee" value="removeEmployee" id="' . $row['employeeRecordID'] . '"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                    </td>
                </tr>';
            echo $output;
        }
    }

    public function displayProjectDetails()
    {
        $data = $this->getProjectDetails();
        foreach ($data as $row) {
            $output =
                '
                <tr>
                    <td class="text-uppercase" style="text-align: center; vertical-align: middle;">' . $row['projectName'] . '</td>
                    <td style="text-align: center; vertical-align: middle;">' . $row['projectLocation'] . '</td>
                    <td style="text-align: center; vertical-align: middle;">
                        <a href="assign_project.php?id=' . $row['projectID'] . '"><button type="button" class="btn btn-primary btn-sm" value=""><i class="fa fa-eye"></i>&nbsp;View</button></a>
                    </td>
                    </td>
                </tr>';
            echo $output;
        }
    }

    public function displayProjectName()
    {
        $id = $_GET['id'];
        $data = $this->getProjectName($id);
        return $data;
    }

    public function getProjectID()
    {
        $id = $_GET['id'];
        return $id;
    }
}
