<?php

namespace App\Controllers;

use App\Models\cm_modul;

class Fetch extends BaseController
{
    public function __construct(){
		$this->cm_modul = new cm_modul;
    }

    public function ajaxModul()
    {
        $data = $this->request->getGet('sistemid');
        $result = $this->cm_modul->SelectWhereSistemID($data);
        echo json_encode($result);
    }
}

?>