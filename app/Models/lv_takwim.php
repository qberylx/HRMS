<?php

namespace App\Models;

use CodeIgniter\Model;

class lv_takwim extends Model
{
    public function SenaraiSemua(){
        $sql = "SELECT * FROM lv_takwim A ".
        "LEFT JOIN  lv_takwimtype B on A.leave_type = B.code ".
        "ORDER BY leave_date";

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
        $sql = "SELECT * FROM lv_takwim where id = '".$val."' ORDER BY id";

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
       
        //chage date format to yyyy-mm-dd to save in database
        $dd = date("Y-m-d",strtotime($data['leave_date']));//date_format($data['leave_date'],"Y-m-d");
        //echo $dd;
        //die;
        //check if code exist
        $chksql = "SELECT * FROM lv_takwim WHERE leave_date = '".$dd."'";
        $chkresult = $this->db->query($chksql);
        if($chkresult->getNumRows() > 0){
            return FALSE;
        }else{
            $sql = "INSERT INTO lv_takwim(leave_date,leave_name,leave_type,create_by) VALUES(?,?,?,?)";

            $value = [$dd,$data['leave_name'],$data['leave_type'],$data['userid']];

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
        $sql="DELETE FROM lv_takwim WHERE id = '".$id."'";
        if ($this->db->query($sql))
        {
            return TRUE;
        }
            return FALSE;

    }

    public function countleave($data){
        //chage date format to yyyy-mm-dd to save in database
        $date1 = date("Y-m-d",strtotime($data['startdate']));//date_format($data['leave_date'],"Y-m-d");
        $date2 = date("Y-m-d",strtotime($data['enddate']));//date_format($data['leave_date'],"Y-m-d");
        
        $sql = "SELECT count(leave_date) as takwim_count FROM lv_takwim WHERE leave_date BETWEEN '".$date1."' AND '".$date2."'  ORDER BY id";
        $val = 0;
        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            //foreach ($result->getResult() as $row) {
                $val = $result->getResult();
            //}
            return $val;
        }
        return $val;
    }

}

?>