<?php

namespace App\Models;

use CodeIgniter\Model;

class cm02_lampiran extends Model
{
    public function addLampiran($data){
        $sql = "INSERT INTO cm02_lampiran(cm02_mohonid,cm02_namadokumen,cm02_lokasi) VALUES(?,?,?)";


        $value = [$data['mohonid'],$data['namadokumen'],$data['lokasi']];

        $this->db->query($sql,$value);

        if ($this->db->affectedRows() == '1')
        {
            return TRUE;
        }
            return FALSE;
    }

    public function SelWheremohonID($id){
        $sql = "SELECT * FROM cm02_lampiran where cm02_mohonid = ".$id;
        $data = [];
        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return $data;
    }

}

?>