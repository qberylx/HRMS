<?php

namespace App\Models;

use CodeIgniter\Model;

class groupaccess_mst extends Model
{
    public function SelectWhereAcclvl($accesslvl_id,$menu_id)
    {
        $sql = "SELECT * FROM groupaccess_mst WHERE accesslevel_id = '".$accesslvl_id."' and menu_id = '".$menu_id."'";
        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            return true;
        }
        return false;
    }

    public function InsertData($data){
        $sql = "INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(?,?)";
        $value = [$data['accesslevel_id'],$data['menu_id']];

        $this->db->query($sql,$value);

        if ($this->db->affectedRows() == '1')
        {
            //$query = $this->db->getLastQuery();
            return TRUE;
        }
            return FALSE;
    }

    public function delByaccIDmenuID($accesslevel_id,$menu_id)
    {
        $sql="DELETE FROM groupaccess_mst WHERE accesslevel_id = '".$accesslevel_id."' AND menu_id = '".$menu_id."'";
        if ($this->db->query($sql))
        {
            return TRUE;
        }
            return FALSE;

    }
}