<?php

class Position extends Admin
{
    public function __construct()
    {
        parent::__construct();
    }


    public function getPositionInfoByID($id)
    {
        $sql = "SELECT * FROM positionlist WHERE positionID = $id";
        $query = $this->getDetails($sql);
        return $query;
    }

    public function addPositionInfo($position)
    {
        $sql = "INSERT INTO positionlist (positionName) 
				VALUES ('$position')";
        $query = $this->setinfo($sql);
        return $query;
    }

    public function getPositionInfo()
    {
        $sql = "SELECT * FROM positionlist WHERE positionID != 1";
        $query = $this->setInfo($sql);
        return $query;
    }

    public function deletePosition($id)
    {
        $sql = "DELETE FROM positionlist WHERE positionID = $id ";
        $query = $this->setInfo($sql);
        return $query;
    }

    public function updatePosition($id, $positionName)
    {
        $sql = "UPDATE positionlist SET positionName = '$positionName' WHERE positionID = $id ";
        $query = $this->setInfo($sql);
        return $query;
    }
}
