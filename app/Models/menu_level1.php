<?php

namespace App\Models;

use CodeIgniter\Model;

class menu_level1 extends Model
{
    public function addmenu($data){
        $sql = "INSERT INTO menu_level1(menu_name,parent,menu_url) VALUES(?,?,?)";

        $value = [$data[0],$data[1],$data[2]];

        $this->db->query($sql,$value);

        if ($this->db->affectedRows() == '1')
        {
            return TRUE;
        }
            return FALSE;
    }

    public function SelectWhereParent($id){
        $data = [];
        $sql = "SELECT * FROM menu_level1 where parent = '".$id."'";
        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return $data;
    }

    public function delByID($id)
    {
        $sql="DELETE FROM menu_level1 WHERE id = '".$id."'";
        if ($this->db->query($sql))
        {
            return TRUE;
        }
            return FALSE;

    }

}

?>