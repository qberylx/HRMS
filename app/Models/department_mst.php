<?php

namespace App\Models;

use CodeIgniter\Model;

class department_mst extends Model
{
    public function SenaraiSemua(){
        $sql = "SELECT * FROM department_mst";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function SelectWhereid($val){
        $sql = "SELECT * FROM department_mst where id = '".$val."' ORDER BY code";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function InsertData($data){
        
        
        $sql = "INSERT INTO department_mst(name_bm,name_bi) VALUES(?,?)";

        $value = [$data['name_bm'],$data['name_bi']];

        $this->db->query($sql,$value);

        if ($this->db->affectedRows() == '1')
        {
            $query = $this->db->getLastQuery();
            return TRUE;
        }
            return FALSE;
       
    }


    public function delByID($id)
    {
        $sql="DELETE FROM department_mst WHERE id = '".$id."'";
        if ($this->db->query($sql))
        {
            return TRUE;
        }
            return FALSE;

    }

}

?>