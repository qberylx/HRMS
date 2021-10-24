<?php

namespace App\Models;

use CodeIgniter\Model;

class menu extends Model
{
    public function addmenu($data){
        $sql = "INSERT INTO menu(nama_menu) VALUES(?)";

        $value = [$data['namamenu']];

        $this->db->query($sql,$value);

        if ($this->db->affectedRows() == '1')
        {
            $query = $this->db->getLastQuery();
            return TRUE;
        }
            return FALSE;
    }

    public function SenaraiSemua(){
        $sql = "SELECT * FROM menu ORDER BY urutan";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function SelectByAccessLvl($accesslvl){
        $sql = "select A.id, nama_menu from menu A ".
        "left join menu_level1 B ON B.parent = A.id ".
        "left join groupaccess_mst C ON C.menu_id = B.id ".
        "WHERE C.accesslevel_id = '".$accesslvl."' ".
        "group by A.id, nama_menu";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function menuDetail($id){
        $sql = "SELECT * FROM menu where id = '".$id."'";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            return $result->getRow();
        }
        return false;
    }

    public function delByID($id)
    {
        $sql="DELETE FROM menu WHERE id = '".$id."'";
        if ($this->db->query($sql))
        {
            return TRUE;
        }
            return FALSE;

    }

}

?>