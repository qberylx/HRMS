<?php

namespace App\Models;

use CodeIgniter\Model;

class department_mst extends Model
{
    public function SenaraiSemua(){
        $sql = "SELECT * FROM department_mst";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function SelectWhereCode($val){
        $sql = "SELECT * FROM department_mst where Code = '".$val."' ORDER BY code";

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