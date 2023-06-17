<?php

//  Child Class
class Deduction extends Admin
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getDeductionData($id)
    {
        $sql = "SELECT * FROM deduction WHERE userInfoID = $id  AND deduction_status ='1' ";
        $query = $this->setInfo($sql);
        return $query;
    }

    public function insertDeductionData($description, $amount, $id)
    {
        $today = date('Y-m-d');

        $sql = "INSERT INTO deduction (deduction_name, deduction_amount, deduction_date, deduction_status, userInfoID) VALUES ('$description', $amount, '$today', '1', $id)";
        $query = $this->setInfo($sql);
        return $query;
    }

    public function getDeductionDataByID($id)
    {
        $sql = "SELECT * FROM deduction WHERE deductionID = $id AND deduction_status ='1' ";
        $query = $this->getDetails($sql);
        return $query;
    }

    public function setDeductionData($description, $amount, $id)
    {
        $sql = "UPDATE deduction SET deduction_name = '$description', deduction_amount = $amount WHERE deductionID = $id";
        $query = $this->setInfo($sql);
        return $query;
    }

    public function deductionTotal($id)
    {
        $sql = "SELECT *, SUM(deduction_amount) AS deduction_totalAmount FROM deduction JOIN userinfo ON userinfo.userInfoID = deduction.userInfoID WHERE deduction.userInfoID = $id GROUP BY deduction.userInfoID";
        $query = $this->setInfo($sql);
        return $query;
    }

    public function deleteDeductionData($id)
    {
        $sql = "UPDATE deduction SET deduction_status = '0' WHERE deductionID = $id";
        $query = $this->setInfo($sql);
        return $query;
    }
}
