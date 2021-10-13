<?php

namespace App\Controllers;
use App\Models\cm_sistem;
use App\Models\cm_modul;
use App\Models\ut_menu;
helper('array');
helper('form');


class Home extends BaseController
{
    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();
		$this->cm_sistem = new cm_sistem;
		$this->cm_modul = new cm_modul;
		$this->ut_menu = new ut_menu;


    }

    public function index()
    {
        $data = [
            'alert' => $this->session->getFlashdata('message'),
            'head' => view('head'),
            'foot' => view('foot'),
            'control_sidebar' => view('control_sidebar'),
            'sidemenu' => view('sidemenu', array(
                'senaraimenulvl0' => $this->ut_menu->SenaraiLvl0(),
                'senaraimenulvl1' => $this->ut_menu->senaraisemua(),
                'uripath' => $this->request->getPath()
            )),
            'headermenu' => view('header_menu'),
            'senaraisistem' => $this->cm_sistem->senaraisemua()
        ];
        return view('form', $data);
    }
}
