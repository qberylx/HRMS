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


}

?>