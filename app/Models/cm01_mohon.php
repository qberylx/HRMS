<?php

namespace App\Models;

use CodeIgniter\Model;

class cm01_mohon extends Model
{
    public function mohon($data){
        $sql = "INSERT INTO cm01_mohon(cm01_userid,cm01_sysid,cm01_modulid,cm01_klasimodul,cm01_klasiproses,cm01_klasiskrin,cm01_klasibug,cm01_klasilaporan,cm01_ulasan) VALUES(?,?,?,?,?,?,?,?,?)";

        if (isset($data['klasimodul']) == true) {
            $klasimodul = 1;
        }else{
            $klasimodul = 0;
        }

        if (isset($data['klasiproses']) == true) {
            $klasiproses = 1;
        }else{
            $klasiproses = 0;
        }

        if (isset($data['klasiskrin']) == true) {
            $klasiskrin = 1;
        }else{
            $klasiskrin = 0;
        }

        if (isset($data['klasibug']) == true) {
            $klasibug = 1;
        }else{
            $klasibug = 0;
        }

        if (isset($data['klasilaporan']) == true) {
            $klasilaporan = 1;
        }else{
            $klasilaporan = 0;
        }

        $value = [1,$data['namaSistem'],$data['subModul'],$klasimodul,$klasiproses,$klasiskrin,$klasibug,$klasilaporan,$data['ulasan']];

        $this->db->query($sql,$value);

        if ($this->db->affectedRows() == '1')
        {
            return $this->db->insertID();
        }
            return FALSE;
    }

}

?>