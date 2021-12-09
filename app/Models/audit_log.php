<?php

namespace App\Models;

use CodeIgniter\Model;

class audit_log extends Model
{
    public function InsertData($data){
        $session = \Config\Services::session();
        $session->setFlashdata("insertID",$this->db->insertID());
        $sql = "INSERT INTO audit_log(user_id,query,ip_address,user_agent) VALUES(?,?,?,?)";
        $value = [$data['user_id'],$data['query'],$this->get_client_ip(),$_SERVER['HTTP_USER_AGENT']];

        $this->db->query($sql,$value);
        if ($this->db->affectedRows() == '1')
        {
            //$query = $this->db->getLastQuery();
            return TRUE;
        }
            return FALSE;

    }

    public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}