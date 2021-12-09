<?php

namespace App\Models;

use CodeIgniter\Model;

class ut_appbyacclvl extends Model
{
    public function SelectAll()
    {
        $sql = "select A.approver_id, B.access_name as applicant, C.access_name as lvl1_approver, IFNULL(D.access_name,'None') as lvl2_approver from ut_appbyacclvl A ".
        "left join accesslevel_mst B ON B.id = A.apply_accesslvl_id ".
        "left join accesslevel_mst C ON C.id = A.lvl1_approve_accesslvl_id ".
        "left join accesslevel_mst D ON D.id = A.lvl2_approve_accesslvl_id";
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

    public function InsertData($data)
    {
        $db = $this->db->table('ut_appbyacclvl');
        $params = [
            'apply_accesslvl_id' => $data['theapplicant'],
            'lvl1_approve_accesslvl_id' => $data['lvl1approver'],
            'lvl2_approve_accesslvl_id' => $data['lvl2approver']
        ];
        if ($db->insert($params)) {
            return true;
        }
            return false;
    }

    public function SelectWhereID($id)
    {
        $sql = "SELECT * FROM ut_appbyacclvl where approver_id = '".$id."'";
        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            return $result->getRow();
        }
        return false;
    }

    public function UpdateData($data,$id)
    {
        $db = $this->db->table('ut_appbyacclvl');
        $params = [
            'apply_accesslvl_id' => $data['theapplicant'],
            'lvl1_approve_accesslvl_id' => $data['lvl1approver'],
            'lvl2_approve_accesslvl_id' => $data['lvl2approver']
        ];

        $where = [
            'approver_id' => $id
        ];

        if ($db->update($params,$where)) {
            return true;
        }
            return false;
    }

    public function delData($id)
    {
        $sql="DELETE FROM ut_appbyacclvl WHERE approver_id = '".$id."'";
        if ($this->db->query($sql))
        {
            return TRUE;
        }
            return FALSE;
    }
    
}