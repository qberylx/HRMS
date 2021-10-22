<?php

namespace App\Models;

use CodeIgniter\Model;

class login_session extends Model
{
    public function InsertData($userid,$sessionid){
        $sql = "INSERT INTO login_session(user_id,session_id) VALUES ('".$userid."','".$sessionid."')";

        $this->db->query($sql);

        if ($this->db->affectedRows() == '1')
        {
            return TRUE;
        }
            return FALSE;
    }

    public function delSessionID($userid){
        $sql = "DELETE FROM login_session WHERE user_id = '".$userid."'";
        $this->db->query($sql);
        if ($this->db->affectedRows() > 0)
        {
            return TRUE;
        }
            return FALSE;
    }

    public function SelectSessionID($userid){
        $sql="SELECT * FROM login_session where user_id = '".$userid."'";
        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            $data = $result->getRow();

            return $data;
        }
        return false;
    }


}

?>