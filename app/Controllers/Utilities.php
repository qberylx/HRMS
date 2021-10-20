<?php

namespace App\Controllers;
use App\Models;
helper('array');
helper('form');


class Utilities extends BaseController
{
    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();
		$this->cm_sistem = new Models\cm_sistem;
		$this->cm_modul = new Models\cm_modul;
		$this->ut_menu = new Models\ut_menu;
		$this->employee_mst = new Models\employee_mst;

    }

    public function menu()
    {
        $data = [
            'alert' => $this->session->getFlashdata('message'),
            'head' => view('head'),
            'foot' => view('foot'),
            'control_sidebar' => view('control_sidebar'),
            'sidemenu' => view('sidemenu', array(
                'userinfo' => $this->employee_mst->SelectWhereUserID($this->session->get("userid")),
                'senaraimenulvl0' => $this->ut_menu->SenaraiLvl0(),
                'senaraimenulvl1' => $this->ut_menu->senaraisemua(),
                'uripath' => $this->request->getPath()
            )),
            'headermenu' => view('header_menu', array(
                'userinfo' => $this->employee_mst->SelectWhereUserID($this->session->get("userid"))
            )),
            'senaraimenu' => $this->ut_menu->SenaraiSemua(),
            'senarailvl0' => $this->ut_menu->SenaraiLvl0()
        ];
        return view('ut_menu', $data);
    }
}
