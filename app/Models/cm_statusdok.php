<?php

namespace App\Models;

use CodeIgniter\Model;

class cm_statusdok extends Model
{
    public function SelWhereKodIn(){
        $sql = "SELECT * FROM cm_statusdok where kod in ('02','03','04','05')";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


}

?>