<?php

namespace App\Models;

use CodeIgniter\Model;

class employee_mst extends Model
{
    public function SenaraiSemua(){
        $sql = "SELECT * FROM employee_mst";
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

    
    public function SelectWhereUserID($userid){
        $data = [];
        $sql = "SELECT A.*, B.*, C.access_name FROM employee_mst A ".
        "LEFT JOIN department_mst B ON B.id = A.id_dept ".
        "LEFT JOIN accesslevel_mst C ON C.id = A.accesslevel_id ".
        "WHERE id_user = '".$userid."' and active_flag = 1";

        $result = $this->db->query($sql);

        if ($result->getNumRows() > 0) {
            $data = $result->getRow();

            return $data;
        }
        return false;
    }

    public function mohon($data){
        //check if id exist
        $session = \Config\Services::session();
        
        $chksql = "SELECT * FROM employee_mst WHERE id_user = '".$data['txt_iduser']."'";
        $chkresult = $this->db->query($chksql);
        if($chkresult->getNumRows() > 0){
            return false;
        }else{

            $sql = "INSERT INTO employee_mst(id_user,name,ic,id_dept,mod_by,create_by,email,pwd,file_name,file_path,accesslevel_id) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            $value = [$data['txt_iduser'],$data['txt_nama'],$data['txt_ic'],$data['sel_dept'],$data['userid'],$data['userid'],$data['txt_emel'],$data['pass'],$data['namadokumen'],$data['lokasi'],$data['acc_level']];

            $this->db->query($sql,$value);

            if ($this->db->affectedRows() == '1')
            {
                return $session->getFlashdata("insertID");
            }
                return $this->db->error();
            
        }

        
    }

    public function update_mohon($data){
        
        //$sql = "UPDATE employee_mst set name = '".$data['txt_nama']."', ic = '".$data['txt_ic']."', id_dept = '".$data['sel_dept']."', mod_by = '".$data['userid']."', mod_date = now(), active_flag = '".$data['statusdok']."' where id_user = '".$data['txt_iduser']."'";
        

        //$this->db->query($sql);

        $builder = $this->db->table('employee_mst');
        $data_arr = [
            'name' => $data['txt_nama'],
            'ic'  => $data['txt_ic'],
            'contact_no'  => $data['txt_notel'],
            'id_dept' => $data['sel_dept'], 
            'mod_by' => $data['userid'], 
            'mod_date' => date('Y-m-d H:i:s'),
            'active_flag' => $data['statusdok'],
            'email'=>$data['txt_emel'],
            'file_name'=>$data['namadokumen'],
            'file_path'=>$data['lokasi'],
            'accesslevel_id' => $data['acc_level']

        ];
        
        $builder->where('id_user', $data['txt_iduser']);
        $builder->update($data_arr);

        if ($this->db->affectedRows() == '1')
        {
            return true;
        }
            return false; //return $this->db->error();
        
    }

    public function update_userinfo($data){
        $builder = $this->db->table('employee_mst');
        $data_arr = [
            'name' => $data['txt_nama'],
            'ic'  => $data['txt_ic'],
            'contact_no'  => $data['txt_notel'],
            'mod_by' => $data['userid'], 
            'mod_date' => date('Y-m-d H:i:s'),
            'email'=>$data['txt_emel'],
            'file_name'=>$data['namadokumen'],
            'file_path'=>$data['lokasi']
        ];
        
        $builder->where('id_user', $data['txt_iduser']);
        $builder->update($data_arr);
        // Produces:
        //
        //  UPDATE mytable
        //  SET title = '{$title}', name = '{$name}', date = '{$date}'
        //  WHERE id = $id

        /*
        $sql = "UPDATE employee_mst set name = '".$data['txt_nama']."', ic = '".$data['txt_ic']."', id_dept = '".$data['sel_dept']."', mod_by = '".$data['userid']."', mod_date = now(), active_flag = '".$data['statusdok']."' where id_user = '".$data['txt_iduser']."'";
        

        //$this->db->query($sql);
        */
        if ($this->db->affectedRows() == '1')
        {
            return true;
        }
            return false; //return $this->db->error();
        
    }

    public function updatePassword($user_id,$password){
        $sql = "UPDATE employee_mst set pwd = '".$password."', chg_pwd_flag = 1 where id_user = '".$user_id."'";
        $this->db->query($sql);
        if ($this->db->affectedRows() == '1')
        {
            return true;
        }
            return false;
    }

    public function checkForgotPass($userid,$email){
        $sql = "SELECT * FROM employee_mst WHERE id_user = '".$userid."' and email = '".$email."' and active_flag = 1";

        $result = $this->db->query($sql);

        if ($result->getNumRows() > 0) {
            return true;
        }
        return false;
    }

    public function SelectLeave($id_dept,)
    {
        $data = [];
        $sql = "SELECT * FROM employee_mst A ".
        "LEFT JOIN  department_mst C on C.id = a.id_dept ".
        "WHERE a.id_dept = '".$id_dept."' ORDER BY name";
        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return $data;
    }
    
}

?>