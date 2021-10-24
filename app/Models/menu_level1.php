<?php

namespace App\Models;

use CodeIgniter\Model;

class menu_level1 extends Model
{
    public function addmenu($data){
        $sql = "INSERT INTO menu_level1(menu_name,parent,menu_url) VALUES(?,?,?)";

        $value = [$data['menu_name'],$data['parent'],$data['menu_url']];

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

    public function SelectByAccessLvl($parent_id,$accesslvl){
        $sql = "select * from menu_level1 A ".
        "left join groupaccess_mst B ON B.menu_id = A.id ".
        "WHERE B.accesslevel_id = '".$accesslvl."' AND parent = '".$parent_id."'";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function SelectWhereID($id){
        $sql = "SELECT * FROM menu_level1 where id = '".$id."'";
        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            return $result->getRow();
        }
            return false;
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