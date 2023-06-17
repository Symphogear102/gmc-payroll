<?php

class PositionController extends Position
{
    public function addPositionDetails()
    {
        extract($_REQUEST);
        if (isset($submit) && $submit == "addPosition") {

            $addposition = $this->addPositionInfo($positionName);
            if ($addposition) {
                echo "success";
                exit;
            } else {
                echo 'failed';
                exit;
            }
        }
    }

    public function fetchPositionData()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->getPositionInfoByID($id);
            echo json_encode($data);
            exit;
        }
    }

    public function deletePositionInfo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['id']) {
                $id = $_POST['id'];
            }
            $delete = $this->deletePosition($id);
            if ($delete) {
                $_SESSION['message'] = 'Record has been removed!';
                $_SESSION['msg'] = 'success';
                header('location: position.php');
                exit(0);
            } else {
                $_SESSION['message'] = 'Something went Wrong!';
                $_SESSION['msg'] = 'danger';
                return $_SESSION['message'];
            }
        }
    }


    public function updatePositionInfo()
    {
        extract($_REQUEST);
        if (isset($submit) && $submit == "updatePosition") {

            $update = $this->updatePosition($id, $positionName);
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
