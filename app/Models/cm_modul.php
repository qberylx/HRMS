<?php

namespace App\Models;

use CodeIgniter\Model;

class cm_modul extends Model
{
    public function SenaraiSemua(){
        $sql = "SELECT * FROM cm_modul";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function SelectWhereSistemID($val){
        $sql = "SELECT * FROM cm_modul where sistemid = '".$val."' ORDER BY kod";

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