<?php

namespace App\Controllers;
use App\Models;
use App\Libraries;
helper('form');


class Home extends BaseController
{
    function __construct()
    {
        $this->encrypter = \Config\Services::encrypter(); // start the encryption service
        $this->session = \Config\Services::session();
        $this->session->start();
		$this->cm_sistem = new Models\cm_sistem;
		$this->cm_modul = new Models\cm_modul;
		$this->menu = new Models\menu;
		$this->menu_level1 = new Models\menu_level1;
		$this->cm01_mohon = new Models\cm01_mohon;
		$this->cm02_lampiran = new Models\cm02_lampiran;
		$this->cm_statusdok = new Models\cm_statusdok;
		$this->employee_mst = new Models\employee_mst;
    }

    public function index()
    {
        $menu = $this->menu->SenaraiSemua();
        foreach ($menu as $val) {
            $val->menulvl1 = $this->menu_level1->SelectWhereParent($val->id);
        };

        $data = [
            'alert' => $this->session->getFlashdata('message'),
            'head' => view('head'),
            'foot' => view('foot'),
            'control_sidebar' => view('control_sidebar'),
            'sidemenu' => view('sidemenu', array(
                'userinfo' => $this->employee_mst->SelectWhereUserID($this->session->get("userid")),
                'menus' => $menu,
                'uripath' => $this->request->getPath()
            )),
            'headermenu' => view('header_menu', array(
                'userinfo' => $this->employee_mst->SelectWhereUserID($this->session->get("userid"))
            )),
            'senaraisistem' => $this->cm_sistem->senaraisemua()
        ];
        return view('form', $data);
    }

    public function senaraiaduan(){
        $menu = $this->menu->SenaraiSemua();
        foreach ($menu as $val) {
            $val->menulvl1 = $this->menu_level1->SelectWhereParent($val->id);
        };

        $complaints = $this->cm01_mohon->selectAll();
        foreach ($complaints as $val) {
            $val->id_encode = bin2hex($this->encrypter->encrypt($val->cm01_id));
        };

        $data = [
            'alert' => $this->session->getFlashdata('message'),
            'head' => view('head'),
            'foot' => view('foot'),
            'control_sidebar' => view('control_sidebar'),
            'sidemenu' => view('sidemenu', array(
                'userinfo' => $this->employee_mst->SelectWhereUserID($this->session->get("userid")),
                'menus' => $menu,
                'uripath' => $this->request->getPath()
            )),
            'headermenu' => view('header_menu', array(
                'userinfo' => $this->employee_mst->SelectWhereUserID($this->session->get("userid"))
            )),
            'senarai_aduan' => $complaints
        ];
        return view('senarai_aduan', $data);
    }

    public function complaint(){
        $menu = $this->menu->SenaraiSemua();
        foreach ($menu as $val) {
            $val->menulvl1 = $this->menu_level1->SelectWhereParent($val->id);
        };

        $decode_id = $this->encrypter->decrypt(hex2bin($this->request->getGet('id')));
        $data = [
            'alert' => $this->session->getFlashdata('message'),
            'head' => view('head'),
            'foot' => view('foot'),
            'control_sidebar' => view('control_sidebar'),
            'sidemenu' => view('sidemenu', array(
                'userinfo' => $this->employee_mst->SelectWhereUserID($this->session->get("userid")),
                'menus' => $menu,
                'uripath' => "/home/senaraiaduan"
            )),
            'headermenu' => view('header_menu', array(
                'userinfo' => $this->employee_mst->SelectWhereUserID($this->session->get("userid"))
            )),
            'aduan' => $this->cm01_mohon->selWhereID($decode_id),
            'lampiran' => $this->cm02_lampiran->SelWheremohonID($decode_id),
            'status_tindakan' => $this->cm_statusdok->SelWhereKodIn()
        ];
        return view('perincian_aduan', $data);
    }
}
