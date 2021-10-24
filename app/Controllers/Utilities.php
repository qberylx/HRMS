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
        $this->uri = new \CodeIgniter\HTTP\URI();
        $this->uri = service('uri');
		$this->cm_sistem = new Models\cm_sistem;
		$this->cm_modul = new Models\cm_modul;
		$this->menu = new Models\menu;
		$this->menu_level1 = new Models\menu_level1;
		$this->employee_mst = new Models\employee_mst;
		$this->accesslevel_mst = new Models\accesslevel_mst;
        $this->groupaccess_mst = new Models\groupaccess_mst;

    }

    public function menu()
    {
        $menu = $this->menu->SelectByAccessLvl($this->session->get('access_level'));
        foreach ($menu as $val) {
            $val->menulvl1 = $this->menu_level1->SelectByAccessLvl($val->id, $this->session->get("access_level"));
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
        $menu = $this->menu->SelectByAccessLvl($this->session->get('access_level'));
        foreach ($menu as $val) {
            $val->menulvl1 = $this->menu_level1->SelectByAccessLvl($val->id, $this->session->get("access_level"));
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
        if ($this->menu_level1->delByID($id)) {
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
            'parent' => $menu_id,
            'menu_url' => $this->request->getPost('menuURL')
        );

        if ($this->menu_level1->addmenu($data)) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data successfully inserted.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
            return redirect()->to('utilities/menu'); 

    }

    public function accesslevel()
    {
        $menu = $this->menu->SelectByAccessLvl($this->session->get('access_level'));
        foreach ($menu as $val) {
            $val->menulvl1 = $this->menu_level1->SelectByAccessLvl($val->id, $this->session->get("access_level"));
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
            'menu_detail' => $this->menu_level1->SelectWhereID($this->session->get("menulvl1")),
            'accesslvl_list' => $this->accesslevel_mst->SelectAll()
        ];
        return view('accesslevel', $data);
    }

    public function submit_accesslevel()
    {   
        $params = array(
            'access_name' => $this->request->getPost('accessName')
        );
        if ($this->accesslevel_mst->InsertData($params)) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data successfully inserted.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
        return redirect()->to('utilities/accesslevel');
    }

    public function del_accesslevel($id)
    {
        if ($id == 1) {
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Admin</h4>You can't delete admin access level.</div>");
        }else{
            if ($this->accesslevel_mst->delByID($id)) {
                $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data successfully deleted.</div>");
            }else{
                $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
            }
        }
        return redirect()->to('utilities/accesslevel');
    }

    public function groupaccess()
    {
        $menu = $this->menu->SelectByAccessLvl($this->session->get('access_level'));
        foreach ($menu as $val) {
            $val->menulvl1 = $this->menu_level1->SelectByAccessLvl($val->id, $this->session->get("access_level"));
        };
        $access_data = [];
        if ($this->request->getPost()) {
            $access_data = $this->menu->SenaraiSemua();
            foreach ($access_data as $val) {
                $val->menulvl1 = $this->menu_level1->SelectByAccessLvl($val->id, $this->session->get("access_level"));
                foreach ($val->menulvl1 as $sub) {
                    $sub->have_access = $this->groupaccess_mst->SelectWhereAcclvl($this->request->getPost('accesslevelID'),$sub->id);
                };
            };
        }
        
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
            'accesslvls' => $this->accesslevel_mst->SelectAll(),
            'groupaccess_data' => $access_data
        ];
        return view('groupaccess', $data);
    }

    public function update_groupaccess()
    {
        $param = array(
            'accesslevel_id' => $this->request->getPost('accesslevel_id'),
            'menu_id' => $this->request->getPost('menu_id')
        );

        echo json_encode($this->groupaccess_mst->InsertData($param));
    }

    public function delete_groupaccess()
    {
        echo json_encode($this->groupaccess_mst->delByaccIDmenuID($this->request->getPost('accesslevel_id'),$this->request->getPost('menu_id')));
    }
}
