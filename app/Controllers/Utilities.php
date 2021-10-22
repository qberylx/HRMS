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
		$this->menu = new Models\menu;
		$this->menu_level1 = new Models\menu_level1;
		$this->employee_mst = new Models\employee_mst;

    }

    public function menu()
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
            'senaraimenu' => $this->menu->SenaraiSemua()
        ];
        return view('ut_menu', $data);
    }

    public function menulvl1($id)
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
            'senaraimenu' => $this->menu_level1->SelectWhereParent($id),
            'menu_detail' => $this->menu->menuDetail($id)
        ];
        return view('menulvl1', $data);
    }

    public function delmenu($id)
    {
        if ($this->menu->delByID($id)) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data Deleted.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
            return redirect()->to('utilities/menu'); 
    }

    public function delmenulvl1($id)
    {
        if ($this->menu_lvl1->delByID($id)) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data Deleted.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
            return redirect()->to('utilities/menu'); 
    }

    public function submit_menulvl1($menu_id)
    {
        $data = array(
            'menu_name' => $this->request->getPost('namamenu'),
            'parent' => $this->request->getPost($menu_id),
            'menu_url' => $this->request->getPost('menuURL')
        );
    }
}
