<?php

//  Child Class
class DeductionController extends Deduction
{
    public function addDeductionData()
    {
        extract($_REQUEST);
        if (isset($submit) && $submit == "addDeduction") {

            $insertData = $this->insertDeductionData($description, $amount, $id);
            if ($insertData) {
                echo 'success';
                exit;
            } else {
                echo 'failed';
                exit;
            }
        }
    }

    public function fetchDeductionData()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->getDeductionDataByID($id);
            echo json_encode($data);
            exit;
        }
    }

    public function updateDeductionData()
    {
        extract($_REQUEST);
        if (isset($submit) && $submit == "editDeductionData") {

            $updateData = $this->setDeductionData($description, $amount, $id);
            if ($updateData) {
                echo "success";
                exit;
            } else {
                echo 'failed';
                exit;
            }
        }
    }

    public function removeDeductionData()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $removeData = $this->deleteDeductionData($id);
            if ($removeData) {
                echo 'success';
                exit;
            } else {
                echo "failed";
                exit;
            }
        }
    }
}
