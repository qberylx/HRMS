<?php

namespace App\Controllers;

use App\Models;

class Navigation extends BaseController
{
    public function __construct(){
        $this->session = \Config\Services::session();
        $this->session->start();
		$this->menu_level1 = new Models\menu_level1;
    }

    public function navigate($menu,$submenu)
    {
        
        if ($result = $this->menu_level1->SelectWhereID($submenu)) {
            $param = [
                'menu' => $menu,
                'menulvl1' => $submenu
            ];
            $this->session->set($param);
            return redirect()->to($result->menu_url); 
        }else{
            return redirect()->to('home'); 
        }
    }
}

?>