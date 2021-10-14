<?php

namespace App\Controllers;
use App\Models\cm_sistem;
use App\Models\cm_modul;
use App\Models\ut_menu;
use App\Models\cm01_mohon;
use App\Models\cm02_lampiran;
use App\Models\cm_statusdok;
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
		$this->cm01_mohon = new cm01_mohon;
		$this->cm02_lampiran = new cm02_lampiran;
		$this->cm_statusdok = new cm_statusdok;


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

    public function senaraiaduan(){
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
            'senarai_aduan' => $this->cm01_mohon->selectAll()
        ];
        return view('senarai_aduan', $data);
    }

    public function complaint($id){
        $data = [
            'alert' => $this->session->getFlashdata('message'),
            'head' => view('head'),
            'foot' => view('foot'),
            'control_sidebar' => view('control_sidebar'),
            'sidemenu' => view('sidemenu', array(
                'senaraimenulvl0' => $this->ut_menu->SenaraiLvl0(),
                'senaraimenulvl1' => $this->ut_menu->senaraisemua(),
                'uripath' => "/home/senaraiaduan"
            )),
            'headermenu' => view('header_menu'),
            'aduan' => $this->cm01_mohon->selWhereID($id),
            'lampiran' => $this->cm02_lampiran->SelWheremohonID($id),
            'status_tindakan' => $this->cm_statusdok->SelWhereKodIn()
        ];
        return view('perincian_aduan', $data);
    }
}
