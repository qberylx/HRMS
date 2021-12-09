<?php

namespace App\Models;

use CodeIgniter\Model;

class accesslevel_mst extends Model
{
    public function SelectAll()
    {
        $sql = "SELECT * FROM accesslevel_mst where id <> 1";
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

    public function InsertData($data){
        $sql = "INSERT INTO accesslevel_mst(access_name) VALUES(?)";
        $value = [$data['access_name']];

        $this->db->query($sql,$value);

        if ($this->db->affectedRows() == '1')
        {
            //$query = $this->db->getLastQuery();
            return TRUE;
        }
            return FALSE;
    }

    public function delByID($id)
    {
        $sql="DELETE FROM accesslevel_mst WHERE id = '".$id."'";
        if ($this->db->query($sql))
        {
            return TRUE;
        }
            return FALSE;

    }
}