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

    public function SelectWhereIDUser($val){
        $sql = "SELECT * FROM employee_mst where ID_User = '".$val."' ORDER BY kod";

        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function mohon($data){
        $sql = "INSERT INTO employee_mst(id_user,name,ic,id_dept,mod_by,create_by,email,pwd,file_name,file_path) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $value = [$data['txt_iduser'],$data['txt_nama'],$data['txt_ic'],$data['sel_dept'],$data['userid'],$data['userid'],$data['txt_emel'],$data['pass'],$data['namadokumen'],$data['lokasi']];

        $this->db->query($sql,$value);

        if ($this->db->affectedRows() == '1')
        {
            return $this->db->insertID();
        }
            return $this->db->error();
    }

    public function SelectWhereUserID($userid){
        $data = [];
        $sql = "SELECT * FROM employee_mst A ".
        "LEFT JOIN department_mst B ON B.ID = A.id_dept ".
        "WHERE id_user = '".$userid."' and active_flag = 1";

        $result = $this->db->query($sql);

        if ($result->getNumRows() > 0) {
            $data = $result->getRow();

            return $data;
        }
        return false;
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
    
    
}

?>