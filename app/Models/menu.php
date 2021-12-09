<?php

namespace App\Models;

use CodeIgniter\Model;

class menu extends Model
{
    public function addmenu($data){
        $sql_count = "SELECT MAX(urutan) as total FROM menu";
        $result = $this->db->query($sql_count);
        $next_order = $result->getRow()->total + 1;

        $sql = "INSERT INTO menu(nama_menu,urutan) VALUES(?,?)";

        $value = [$data['namamenu'],$next_order];

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
        $data = [];
        $sql = "select A.id, nama_menu from menu A ".
        "left join menu_level1 B ON B.parent = A.id ".
        "left join groupaccess_mst C ON C.menu_id = B.id ".
        "WHERE C.accesslevel_id = '".$accesslvl."' ".
        "group by A.id, nama_menu order by A.urutan";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return $data;
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

    public function UpdateOrder($data,$where)
    {
        
        $db = $this->db->table('menu');
        $data = [
            'urutan' => $data
        ];
        $where = [
            'id' => $where
        ];

        if ($db->update($data,$where)) {
            return true;
        }
            return false;
    }

}

?>