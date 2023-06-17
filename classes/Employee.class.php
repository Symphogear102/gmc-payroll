<?php

class Employee extends User
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserDetails($employeeID)
    {
        $sql = " SELECT * FROM userinfo WHERE employeeID = '$employeeID' ";
        $query = $this->getDetails($sql);
        return $query;
    }
}
