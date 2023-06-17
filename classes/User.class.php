<?php

//  Child Class
class User extends DbConnection
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function checkLogin($username, $password)
    {
        $sql = "SELECT * FROM userlogin, userinfo WHERE userlogin.userID = userinfo.employeeID AND userlogin.userID = '$username' ";
        $query = $this->connection->query($sql);

        if ($query->num_rows > 0) {
            $data = $query->fetch_array();
            $check = password_verify($password, $data['pwd']);
            if ($check) {
                $sql = "SELECT * FROM userlogin, userinfo WHERE userlogin.userID = userinfo.employeeID AND userlogin.userID = '$username' AND userinfo.employeeStatus = 'active'";
                $status = $this->connection->query($sql);
                if ($status->num_rows > 0) {
                    return $data;
                } else {
                    echo "Account disabled";
                    exit;
                }
            } else {
                echo "Incorrect password!";
                exit;
            }
        } else {
            echo "Username not found!";
            exit;
        }
    }

    public function getDetails($sql)
    {
        $query = $this->connection->query($sql);
        $data = $query->fetch_array();
        return $data;
    }

    public function setInfo($sql)
    {
        $query = $this->connection->query($sql);
        return $query;
    }
}
