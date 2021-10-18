<?php

namespace App\Controllers;

use App\Models;
//use App\Models\cm02_lampiran;
//use App\Models\ut_menu;

class Submit extends BaseController
{
    public function __construct(){
		$this->cm01_mohon = new Models\cm01_mohon;
		$this->cm02_lampiran = new Models\cm02_lampiran;
		$this->ut_menu = new Models\ut_menu;
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function application(){
        $result = $this->cm01_mohon->mohon($this->request->getPost());

        if ($result >= 1) {
			$this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Aduan anda telah berjaya dihantar untuk semakan. Terima kasih.</div>");
		} else {
			$this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
		}

        if ($lampiran = $this->request->getFileMultiple('lampiran')) {
            foreach($lampiran as $item) {
                if ($item->isValid() && !$item->hasMoved()) {
                    $newName = $item->getRandomName();
                    $item->move('/public/uploads', $newName);
                    $dataLampiran = array(
                        'mohonid' => $result,
                        'namadokumen' => $newName,
                        'lokasi' => '/public/uploads'
                    );
                    $this->cm02_lampiran->addLampiran($dataLampiran);
                }
            }
        }

        return redirect()->to('home'); 
    }

    public function mainmenu(){
        if ($this->ut_menu->addmenu($this->request->getPost()) == true) {
			$this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Aduan anda telah berjaya dihantar untuk semakan. Terima kasih.</div>");
		} else {
			$this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
		}

        return redirect()->to('utilities/menu'); 

    }
}

?>