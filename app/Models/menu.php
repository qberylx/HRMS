<?php

namespace App\Models;

use CodeIgniter\Model;

class menu extends Model
{
    public function addmenu($data){
        var_dump($data);
        $sql = "INSERT INTO menu(nama_menu,parent,urutan,menu_url,menu_level) VALUES(?,?,?,?,?)";

        if ($data['menuParent'] == 0) {
            $menulvl = 0;
        }else{
            $menulvl = 1;
        }

        $value = [$data['namamenu'],$data['menuParent'],'99',$data['menuURL'],$menulvl];

        $this->db->query($sql,$value);

        if ($this->db->affectedRows() == '1')
        {
            return TRUE;
        }
            return FALSE;
    }

    public function SenaraiSemua(){
        $sql = "SELECT * FROM menu";

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