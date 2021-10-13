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

    public function selectAll(){
        $sql = "select a.cm01_id, b.namasistem, c.namamodul, a.cm01_klasimodul, a.cm01_klasiproses, ".
        "a.cm01_klasiskrin, a.cm01_klasibug, a.cm01_klasilaporan, a.cm01_ulasan  from cm01_mohon a ".
        "left join cm_sistem b on b.id = a.cm01_sysid ".
        "left join cm_modul c on c.id = a.cm01_modulid;";
        $result = $this->db->query($sql);
        if ($result->getNumRows() > 0) {
            foreach ($result->getResult() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

}

?>