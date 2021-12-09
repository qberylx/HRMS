<?php

namespace App\Models;

use CodeIgniter\Model;

class menu_level1 extends Model
{
    public function addmenu($data){
        $session = \Config\Services::session();
        
        $sql_count = "SELECT MAX(menu_order) as total FROM menu_level1 WHERE parent = '".$data['parent']."'";
        $result = $this->db->query($sql_count);
        $next_order = $result->getRow()->total + 1;

        $sql = "INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(?,?,?,?)";

        $value = [$data['menu_name'],$data['parent'],$data['menu_url'],$next_order];

        $this->db->query($sql,$value);

        $menulvl1_id = $session->getFlashdata("insertID");

        $sql2 = "INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(?,?)";

        $value2 = [1,$menulvl1_id];

        $this->db->query($sql2,$value2);

        if ($this->db->affectedRows() == '1')
        {
            return TRUE;
        }
            return FALSE;
    }

    public function SelectWhereParent($id){
        $data = [];
        $sql = "SELECT * FROM menu_level1 where parent = '".$id."' order by menu_order";
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
        $data = [];
        $sql = "select * from menu_level1 A ".
        "left join groupaccess_mst B ON B.menu_id = A.id ".
        "WHERE B.accesslevel_id = '".$accesslvl."' AND parent = '".$parent_id."' order by menu_order";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return $data;
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

    public function UpdateOrder($data,$where)
    {
        
        $db = $this->db->table('menu_level1');
        $data = [
            'menu_order' => $data
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