<?php

class ProjectController extends Project
{
    // ADD PROJECT
    public function addProjectDetails()
    {
        extract($_REQUEST);
        if (isset($submit) && $submit == "addProject") {

            $addProject = $this->addProject($projectName, $projectLocation);
            if ($addProject) {
                echo "success";
                exit;
            } else {
                echo 'failed';
                exit;
            }
        }
    }

    // ASSIGN EMPLOYEE PROJECT
    public function assignEmployee()
    {
        extract($_REQUEST);
        if (isset($submit) && $submit == "assignEmployee") {

            $currentDate = date("Y/m/d");
            $status = "assigned";
            $employeeID = strtoupper($employeeID);

            $checkEmployeeID = $this->checkEmployeeID($employeeID);
            if ($checkEmployeeID > 0) {
                $checkOnProject = $this->checkEmployeeOnProject($employeeID, $projectID);
                if ($checkOnProject) {
                    echo 'Employee already on list!';
                    exit;
                } else {
                    $checkOnList = $this->checkEmployeeOnList($employeeID);
                    if ($checkOnList) {
                        echo 'Employee ID already have an assigned project!';
                        exit;
                    } else {
                        $assignEmployee = $this->insertEmployeeRecord($employeeID, $projectID, $currentDate, $status);
                        if ($assignEmployee) {
                            echo 'success';
                            exit;
                        } else {
                            echo 'Something went Wrong!';
                            exit;
                        }
                    }
                }
            } else {
                echo 'Employee ID not found!';
                exit;
            }
        }
    }
    // REMOVING EMPLOYEE ASSSIGNED PROJECT
    public function removeAssignedEmployee()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $removeData = $this->removeAssigned($id);
            if ($removeData) {
                echo "success";
                exit;
            } else {
                echo "failed";
                exit;
            }
        }
    }
}
