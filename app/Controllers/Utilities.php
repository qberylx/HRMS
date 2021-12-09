<?php

namespace App\Controllers;
use App\Models;
helper('array');
helper('form');
use App\Libraries;

class Utilities extends BaseController
{
    function __construct()
    {

        $this->encrypter = \Config\Services::encrypter(); // start the encryption service
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
        $this->ui = new Libraries\Userinterface;
        $this->encryption = new Libraries\Encryption;
        $this->ut_appbyacclvl  = new Models\ut_appbyacclvl;
        $this->department_mst = new Models\department_mst;
        $this->ut_appbydep = new Models\ut_appbydep;
    }

    public function menu()
    {
        $data = $this->ui->mainUI();
        $data['senaraimenu'] = $this->menu->SenaraiSemua();

        return view('ut_menu', $data);
    }

    public function menulvl1($id)
    {
        $data = $this->ui->mainUI();
        $data['senaraimenu'] = $this->menu_level1->SelectWhereParent($id);
        $data['menu_detail'] = $this->menu->menuDetail($id);

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
        $data = $this->ui->mainUI();
        $data['menu_detail'] = $this->menu_level1->SelectWhereID($this->session->get("menulvl1"));
        $data['accesslvl_list'] = $this->accesslevel_mst->SelectAll();

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
        $access_data = array();
        if ($this->request->getPost()) {
            $access_data = $this->menu->SenaraiSemua();
            foreach ($access_data as $val) {
                $val->menulvl1 = $this->menu_level1->SelectByAccessLvl($val->id, $this->session->get("access_level"));
                foreach ($val->menulvl1 as $sub) {
                    $sub->have_access = $this->groupaccess_mst->SelectWhereAcclvl($this->request->getPost('accesslevelID'),$sub->id);
                };
            };
        }
        
        $data = $this->ui->mainUI();
        $data['accesslvls'] = $this->accesslevel_mst->SelectAll();
        $data['groupaccess_data'] = $access_data;

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

    public function department()
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
                'userinfo' => $this->employee_mst->SelectWhereUserID($this->session->get("userid")),
                'id_encode' => bin2hex($this->encrypter->encrypt($this->session->get("userid")))
            )),
            'senaraidept' => $this->department_mst->SenaraiSemua()
        ];
        return view('department', $data);
    }

    public function submit_department()
    {   
        $params =  $this->request->getPost();

        if ($this->department_mst->InsertData($params)) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data successfully inserted.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Code alredy exist in database.</div>");
        }
        return redirect()->to('utilities/department');
    }


    public function deldepartment($id)
    {
        if ($this->department_mst->delByID($id)) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data Deleted.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
            return redirect()->to('utilities/department'); 
    }

    public function approver_by_access_level()
    {
        $approver_list = $this->ut_appbyacclvl->SelectAll();
        foreach ($approver_list as $key) {
            $key->encode_id = $this->encryption->encode($key->approver_id);
        }

        $data = $this->ui->mainUI();
        $data['accesslvls'] = $this->accesslevel_mst->SelectAll();
        $data['approver_list'] = $approver_list;

        if ($this->request->getGET('id')) {
            $data['get'] = $this->ut_appbyacclvl->SelectWhereID($this->encryption->decode($this->request->getGET('id')));
        };
        return view('approverbyaccesslvl', $data);
    }

    public function submit_approver_by_access_level()
    {
        if ($this->ut_appbyacclvl->InsertData($this->request->getPost())) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data inserted successfully.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
        return redirect()->to('utilities/approver_by_access_level'); 
    }

    public function del_approver_by_access_level($id)
    {
        if ($this->ut_appbyacclvl->delData($id)) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data Deleted.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
            return redirect()->to('utilities/approver_by_access_level'); 
    }

    public function update_approver_by_access_level()
    {
        if ($this->ut_appbyacclvl->UpdateData($this->request->getPost(),$this->encryption->decode($this->request->getGET('id')))) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data updated successfully.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
        return redirect()->to('utilities/approver_by_access_level'); 
    }

    public function approver_by_department()
    {
        
        $approver_list = $this->ut_appbydep->SelectAll();
        foreach ($approver_list as $key) {
            $key->encode_id = $this->encryption->encode($key->approver_id);
        }
        $data = $this->ui->mainUI();
        $data['senaraidept'] = $this->department_mst->SenaraiSemua();
        $data['approver_list'] = $approver_list;

        if ($this->request->getGET('id')) {
            $data['get'] = $this->ut_appbydep->SelectWhereID($this->encryption->decode($this->request->getGET('id')));
        };
        return view('approverbydep', $data);
    }

    public function submit_approver_by_department()
    {
        if ($this->ut_appbydep->InsertData($this->request->getPost())) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data inserted successfully.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
        return redirect()->to('utilities/approver_by_department'); 
    }

    public function del_approver_by_departmen($id)
    {
        if ($this->ut_appbydep->delData($id)) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data Deleted.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
            return redirect()->to('utilities/approver_by_department'); 
    }

    public function update_approver_by_department()
    {
        if ($this->ut_appbydep->UpdateData($this->request->getPost(),$this->encryption->decode($this->request->getGET('id')))) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data updated successfully.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
        return redirect()->to('utilities/approver_by_department'); 
    }

    public function menu_up($id)
    {
        $result = $this->menu->menuDetail($id);

        if ($result->urutan == 1) {
            $urutan = 1;
        }else{
            $urutan = $result->urutan - 1;
        }


        if ($this->menu->UpdateOrder($urutan,$id)) {
            return redirect()->to('utilities/menu'); 
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
    }

    public function menu_down($id)
    {
        $result = $this->menu->menuDetail($id);

        $urutan = $result->urutan + 1;

        if ($this->menu->UpdateOrder($urutan,$id)) {
            return redirect()->to('utilities/menu'); 
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
    }

    public function menulvl1_up($id)
    {
        $result = $this->menu_level1->SelectWhereID($id);
        
        if ($result->menu_order == 1) {
            $urutan = 1;
        }else{
            $urutan = $result->menu_order - 1;
        }


        if ($this->menu_level1->UpdateOrder($urutan,$id)) {
            return redirect()->to('utilities/menulvl1/'.$result->parent); 
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
    }

    public function menulvl1_down($id)
    {
        $result = $this->menu_level1->SelectWhereID($id);

        $urutan = $result->menu_order + 1;

        if ($this->menu_level1->UpdateOrder($urutan,$id)) {
            return redirect()->to('utilities/menulvl1/'.$result->parent); 
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
    }

}
