<?php

namespace App\Models;

use CodeIgniter\Model;

class cm_sistem extends Model
{
    public function SenaraiSemua(){
        $sql = "SELECT * FROM cm_sistem";

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