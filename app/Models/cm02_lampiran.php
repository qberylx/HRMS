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

}

?>