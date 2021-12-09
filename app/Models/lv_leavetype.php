<?php

namespace App\Models;

use CodeIgniter\Model;

class lv_leavetype extends Model
{
    public function SenaraiSemua(){
        $sql = "SELECT * FROM lv_leavetype";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function SelectWherecode($val){
        $sql = "SELECT * FROM lv_leavetype where code = '".$val."' ORDER BY id";

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
        //check if code exist
        $chksql = "SELECT * FROM lv_leavetype WHERE code = '".$data['code']."'";
        $chkresult = $this->db->query($chksql);
        if($chkresult->getNumRows() > 0){
            return FALSE;
        }else{
            $sql = "INSERT INTO lv_leavetype(code,description) VALUES(?,?)";

            $value = [$data['code'],$data['description']];

            $this->db->query($sql,$value);

            if ($this->db->affectedRows() == '1')
            {
                $query = $this->db->getLastQuery();
                return TRUE;
            }
                return FALSE;
        }
    }


    public function delByID($id)
    {
        $sql="DELETE FROM lv_leavetype WHERE id = '".$id."'";
        if ($this->db->query($sql))
        {
            return TRUE;
        }
            return FALSE;

    }

}

?>