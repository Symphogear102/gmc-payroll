<?php

class PositionView extends Position
{
    public function displayPosition()
    {
        $data = $this->getPositionInfo();
        foreach ($data as $row) {
            $output =
                '
                <tr>
                    <td style="text-align: center; vertical-align: middle;">' . $row['positionName'] . '</td>
                    <td style="text-align: center; vertical-align: middle;">
                        <button type="button" class="btn btn-sm btn-warning text-black editPositionData" name="editPositionData" value="editPositionData" id="' . $row['positionID'] . '"><i class="fa fa-edit"></i>&nbsp; Edit</button>
                    </td>
                </tr>';
            echo $output;
        }
    }

    public function positionDetails()
    {
        $id = $_GET['id'];
        $data = $this->getPositionInfoByID($id);
        return $data;
    }
}
