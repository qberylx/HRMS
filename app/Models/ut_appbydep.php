<?php

namespace App\Models;

use CodeIgniter\Model;

class ut_appbydep extends Model
{
    public function SelectAll()
    {
        $sql = "select A.approver_id, B.name_bi as applicant, C.name_bi as lvl1_approver, IFNULL(D.name_bi,'None') as lvl2_approver from ut_appbydep A ".
        "left join department_mst B ON B.id = A.apply_dep_id ".
        "left join department_mst C ON C.id = A.lvl1_approve_dep_id ".
        "left join department_mst D ON D.id = A.lvl2_approve_dep_id";
        $data = [];
        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return $data;
    }
    
    public function SelectWhereID($id)
    {
        $sql = "SELECT * FROM ut_appbydep where approver_id = '".$id."'";
        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            return $result->getRow();
        }
        return false;
    }

    public function InsertData($data)
    {
        $db = $this->db->table('ut_appbydep');
        $params = [
            'apply_dep_id' => $data['theapplicant'],
            'lvl1_approve_dep_id' => $data['lvl1approver'],
            'lvl2_approve_dep_id' => $data['lvl2approver']
        ];
        if ($db->insert($params)) {
            return true;
        }
            return false;
    }

    public function UpdateData($data,$id)
    {
        $db = $this->db->table('ut_appbydep');
        $params = [
            'apply_dep_id' => $data['theapplicant'],
            'lvl1_approve_dep_id' => $data['lvl1approver'],
            'lvl2_approve_dep_id' => $data['lvl2approver']
        ];
        $where = [
            'approver_id' =>$id
        ];
        if ($db->update($params,$where)) {
            return true;
        }
            return false;
    }

    public function delData($id)
    {
        $sql="DELETE FROM ut_appbydep WHERE approver_id = '".$id."'";
        if ($this->db->query($sql))
        {
            return TRUE;
        }
            return FALSE;
    }
    
}