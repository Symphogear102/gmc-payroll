<?php

class AdminView extends Admin
{
    public function displayEmployeeInfo()
    {
        $data = $this->getUserInfo();
        return $data;
    }

    public function displayTotalEmployee()
    {
        $data = $this->getTotalEmployee();
        return $data;
    }
    public function employeeDetails($id)
    {
        $display = $this->getEmployeeInfo($id);
        return $display;
    }
}
