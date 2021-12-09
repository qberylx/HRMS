<?php

namespace App\Models;

use CodeIgniter\Model;

class lv_empsetting extends Model
{
    public function SenaraiSemua()
    {
        $sql = "SELECT * FROM lv_empsetting A ".
        "LEFT JOIN  employee_mst B on A.id_user = B.id_user ".
        "LEFT JOIN  department_mst C on C.id = B.id_dept ".
        "ORDER BY name";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function SelectWhereIDUser($id_user,$year)
    {
        $data = [];
        $sql = "SELECT * FROM lv_empsetting A ".
        "WHERE A.id_user = '".$id_user."' AND A.year = '".$year."'";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            return $result->getRow();
        }
        return $data;
    }

    public function InsertUpdate($data,$year)
    {
        $this->db->transStart();
        $count = 0;
        foreach ($data['userid'] as $userid) {
            $db = $this->db->table('lv_empsetting');
            $db->where('id_user',$userid);
            $db->where('year',$year);

            $checker = $db->get();
            if ($checker->getNumRows() > 0) {
                $params = [
                    'leave_entitle' => $data['lv_entitle'][$count],
                    'last_yr_bal' => $data['lv_lbalance'][$count],
                    'curr_yr_bal' => $data['lv_curr'][$count]
                ];
                $where = [
                    'id_user' => $userid,
                    'year' => $year
                ];
                $db->update($params,$where);
            }else{
                $params = [
                    'id_user' => $userid,
                    'year' => $year,
                    'leave_entitle' => $data['lv_entitle'][$count],
                    'last_yr_bal' => $data['lv_lbalance'][$count],
                    'curr_yr_bal' => $data['lv_curr'][$count]
                ];
                $db->insert($params);
            }
            //$this->db->query("INSERT INTO lv_empsetting (id_user,year,leave_entitle,last_yr_bal,curr_yr_bal) VALUES ('".$userid."','".$year."','".$data['lv_entitle'][$count]."','".$data['lv_lbalance'][$count]."','".$data['lv_curr'][$count]."') ON DUPLICATE KEY UPDATE leave_entitle=VALUES(leave_entitle), last_yr_bal=VALUES(last_yr_bal), curr_yr_bal=VALUES(curr_yr_bal)");
            $count++;
        };
        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return false;
        } else {
            $this->db->transCommit();
            return true;
        }
    }

}

?>