<?php

namespace App\Models;

use CodeIgniter\Model;

class lv_application extends Model
{
    public function SenaraiSemua(){
        $sql = "SELECT A.*, B.description as typedesc, C.description as statusdesc, D.name, D.email FROM lv_application A ".
        "LEFT JOIN  lv_leavetype B on A.leave_typecode = B.code ".
        "LEFT JOIN  lv_statusdoc C on A.leave_status = C.code ".
        "LEFT JOIN  employee_mst D on A.id_user = D.id_user ".
        "ORDER BY A.create_date";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function SelectWhereIDUser($val){
        $sql = "SELECT A.*, B.description as typedesc, C.description as statusdesc, D.name, D.email FROM lv_application A ".
        "LEFT JOIN  lv_leavetype B on A.leave_typecode = B.code ".
        "LEFT JOIN  lv_statusdoc C on A.leave_status = C.code ".
        "LEFT JOIN  employee_mst D on A.id_user = D.id_user ".
        "WHERE id_user = '".$val."' ORDER BY A.id";

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
        $date1 = date("Y-m-d",strtotime($data['startdate']));//date_format($data['leave_date'],"Y-m-d");
        $date2 = date("Y-m-d",strtotime($data['enddate']));//date_format($data['leave_date'],"Y-m-d");
        
        //check if date exist
        $chksql = "SELECT * FROM lv_application WHERE id_user = '".$data['userid']."' AND (('".$date1."' BETWEEN startdate AND enddate) OR  ('".$date2."' BETWEEN startdate AND enddate )) ";
        $chkresult = $this->db->query($chksql);
        if($chkresult->getNumRows() > 0){
            return FALSE;
        }else{
            
            $builder = $this->db->table('lv_application');
            $data_arr = [
                'id_user' => $data['userid'],
                'startdate'  => $date1,
                'enddate'  => $date2,
                'leave_typecode' => $data['sel_leavetype'],
                'contact_no'  => $data['contactno'],
                'location'  => $data['location'],
                'reason'  => $data['reason'],
                'daysoff'  => $data['daysoff'],
                'lv_file_name'=>$data['namadokumen'],
                'lv_file_path'=>$data['lokasidoc'],
                'create_by' => $data['userid'], 
                'create_date' => date('Y-m-d H:i:s'),
                'mod_by' => $data['userid'], 
                'mod_date' => date('Y-m-d H:i:s'),
                'leave_status' => '01'
            ];
            
            //$builder->where('id_user', $data['txt_iduser']);
            $builder->insert($data_arr);

            $builder2 = $this->db->table('lv_empsetting');
            $data_arr2 = [
                
                'applied_leave' => $data['total_applied_leave'],

            ];
            
            $builder2->where('id_user', $data['userid']);
            $builder2->where('year', date("Y"));
            $builder2->update($data_arr2);

            

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
        $sql="DELETE FROM lv_application WHERE id = '".$id."'";
        if ($this->db->query($sql))
        {
            return TRUE;
        }
            return FALSE;

    }

    public function SenaraiPermohonan($dept,$acclvl){
        $data = [];
        $sql = "SELECT A.*, B.description as typedesc, C.description as statusdesc, D.name, D.email, E.lvl1_approve_dep_id, F.lvl1_approve_accesslvl_id FROM lv_application A ".
        "LEFT JOIN  lv_leavetype B on A.leave_typecode = B.code ".
        "LEFT JOIN  lv_statusdoc C on A.leave_status = C.code ".
        "LEFT JOIN  employee_mst D on A.id_user = D.id_user ".
        "LEFT JOIN ut_appbydep E ON E.apply_dep_id = D.id_dept ".
        "LEFT JOIN ut_appbyacclvl F ON F.apply_accesslvl_id = D.accesslevel_id ".
        "WHERE leave_status	 = '01'  ".
        "ORDER BY A.create_date";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $app_flag = 0;
                if ($acclvl == 1) {
                    $data[] = $row;
                }else{
                    if ($row->lvl1_approve_dep_id) {
                        if ($row->lvl1_approve_dep_id == $dept) {
                            $app_flag++;
                        }else{
                            $app_flag--;
                        }
                    };
                    if ($row->lvl1_approve_accesslvl_id) {
                        if ($row->lvl1_approve_accesslvl_id == $acclvl) {
                            $app_flag++;
                        }else{
                            $app_flag--;
                        }
                    };
                    if ($app_flag > 0) {
                        $data[] = $row;
                    }
                }
            }
            return $data;
        }
        return $data;
    }

    public function SelectWhereID($val){
        $sql = "SELECT A.*, B.description as typedesc, C.description as statusdesc, D.name, D.email FROM lv_application A ".
        "LEFT JOIN  lv_leavetype B on A.leave_typecode = B.code ".
        "LEFT JOIN  lv_statusdoc C on A.leave_status = C.code ".
        "LEFT JOIN  employee_mst D on A.id_user = D.id_user ".
        "WHERE A.id = '".$val."' ";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            return $result->getRow();
        }
        return FALSE;
    }

    public function UpdateData($data){
        
        $builder = $this->db->table('lv_application');
        $data_arr = [
            
            'mod_by' => $data['ses_userid'], 
            'mod_date' => date('Y-m-d H:i:s'),
            'approve_by' => $data['ses_userid'], 
            'comment' => $data['comment'], 
            'approve_date' => date('Y-m-d H:i:s'),
            'leave_status' => $data['sel_status']

        ];
        
        $builder->where('id', $data['application_id']);
        $builder->update($data_arr);

        $builder2 = $this->db->table('lv_empsetting');
        $data_arr2 = [
            
            'applied_leave' => $data['total_applied_daysoff'],
            'curr_yr_bal' => $data['curr_yr_bal'],
            'last_yr_bal' => $data['last_yr_bal']

        ];
        
        $builder2->where('id_user', $data['userid']);
        $builder2->where('year', date("Y"));
        $builder2->update($data_arr2);

        if ($this->db->affectedRows() == '1')
        {
            return true;
        }
            return false; //return $this->db->error();
        
    }


    public function SenaraiPermohonanManager($acclvl){
        $data = [];
        $sql = "SELECT A.*, B.description as typedesc, C.description as statusdesc, D.name, D.email,  F.lvl1_approve_accesslvl_id FROM lv_application A ".
        "LEFT JOIN  lv_leavetype B on A.leave_typecode = B.code ".
        "LEFT JOIN  lv_statusdoc C on A.leave_status = C.code ".
        "LEFT JOIN  employee_mst D on A.id_user = D.id_user ".
        "LEFT JOIN ut_appbyacclvl F ON F.apply_accesslvl_id = D.accesslevel_id ".
        "WHERE leave_status	 = '01'  ".
        "ORDER BY A.create_date";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $app_flag = 0;
                if ($acclvl == 1) {
                    $data[] = $row;
                }else{
                    
                    if ($row->lvl1_approve_accesslvl_id) {
                        if ($row->lvl1_approve_accesslvl_id == $acclvl) {
                            $app_flag++;
                        }else{
                            $app_flag--;
                        }
                    };
                    if ($app_flag > 0) {
                        $data[] = $row;
                    }
                }
            }
            return $data;
        }
        return $data;
    }

}

?>