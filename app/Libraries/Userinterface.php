<?php

namespace App\Libraries;
use App\Models;

class Userinterface
{
    function __construct()
    {

        $this->encrypter = \Config\Services::encrypter(); // start the encryption service
        $this->session = \Config\Services::session();
        $this->session->start();
		$this->menu = new Models\menu;
		$this->menu_level1 = new Models\menu_level1;
		$this->employee_mst = new Models\employee_mst;
    }

    public function mainUI()
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
                'menus' => $menu
            )),
            'headermenu' => view('header_menu', array(
                'userinfo' => $this->employee_mst->SelectWhereUserID($this->session->get("userid")),
                'id_encode' => bin2hex($this->encrypter->encrypt($this->session->get("userid")))
            ))
        ];;

        return $data;
    }
}

?>