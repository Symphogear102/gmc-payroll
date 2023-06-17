<?php

class UserController extends User
{
    public function login()
    {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == "login") {
                $username = mysqli_real_escape_string($this->connection, $_POST['username']);
                $password = mysqli_real_escape_string($this->connection, $_POST['password']);

                $auth = $this->checkLogin($username, $password);

                if (!$auth) {
                    return $auth;
                } else {
                    $_SESSION['username'] = $auth['userID'];
                    $_SESSION['userType'] = $auth['userType'];
                    $_SESSION['userPhoto'] = $auth['userPhoto'];

                    $this->userFilter();
                }
            }
        }
    }

    protected function userFilter()
    {
        if ($_SESSION['userType'] == 3) {
            exit('admin');
        } elseif ($_SESSION['userType'] == 1) {
            exit('employee');
        }
    }
}
