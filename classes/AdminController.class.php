<?php

class AdminController extends Admin
{
    private function uploadPhoto($img_name, $img_size, $tmp_name, $error)
    {
        if ($error === 0) {
            if ($img_size > 5000000) {
                echo "Sorry, your file is too large.";
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = '../images/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    return $new_img_name;
                } else {
                    echo "You can't upload files of this type";
                }
            }
        } else {
            echo "unknown error occurred!";
        }
    }

    public function addNewEmployee()
    {
        extract($_REQUEST);
        if (isset($submit) && $submit == "addNewEmployee") {

            // images upload
            $img_name =  $_FILES['photo']['name'];
            $img_size =  $_FILES['photo']['size'];
            $tmp_name =  $_FILES['photo']['tmp_name'];
            $error =  $_FILES['photo']['error'];
            $userPhoto = $this->uploadPhoto($img_name, $img_size, $tmp_name, $error);

            if ($userPhoto) {
                $registrationDate = date("Y/m/d");
                $employeeID = $this->generateEmployeeID();
                $addEmployeeInfo = $this->addEmployee($firstname, $middlename, $lastname, $contact, $address, $gender, $birthday, $email, $registrationDate, $employeeID, $userPhoto, $position, $salary);
                if ($addEmployeeInfo) {
                    $defaultPassword = '1234';
                    $password = password_hash($defaultPassword, PASSWORD_DEFAULT);
                    $loginAccount = $this->createLoginAccount($employeeID, $password, $registrationDate);
                    if ($loginAccount) {
                        echo 'success';
                    }
                } else {
                    echo "Adding employee failed!";
                }
            } else {
                echo "Image upload failed";
            }
        }
    }

    public function fetchEmployeeData()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->getEmployeeInfo($id);
            $data['userPhoto'] = '<img src="../images/' . $data['userPhoto'] . '" alt="" width="100" height="100" style="margin-top:10px;border-radius: 15px;object-fit:cover;">';
            echo json_encode($data);
        }
    }


    public function updateEmployeeInfo()
    {
        extract($_REQUEST);
        if (isset($submit) && $submit == "updateEmployeeData") {


            $update = $this->updateEmployee($userID, $firstname, $middlename, $lastname, $address, $birthday, $contact, $gender, $email, $position, $salary);
            if ($update) {
                echo "success";
                exit;
            } else {
                echo 'failed';
                exit;
            }
        }
    }

    public function deleteEmployeeInfo()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $delete = $this->deleteEmployee($id);
            if ($delete) {
                echo "success";
                exit();
            } else {
                echo "error";
            }
        }
    }
}
