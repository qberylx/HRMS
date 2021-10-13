<?php

namespace App\Models;

use CodeIgniter\Model;

class ut_menu extends Model
{
    public function addmenu($data){
        var_dump($data);
        $sql = "INSERT INTO ut_menu(nama_menu,parent,urutan,menu_url,menu_level) VALUES(?,?,?,?,?)";

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
        $sql = "SELECT * FROM ut_menu";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function SenaraiLvl0(){
        $sql = "SELECT * FROM ut_menu where menu_level = 0";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

}

?>