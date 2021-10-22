<?php 
namespace App\Controllers;
helper('form');
use App\Libraries\Password; // Import library
use App\Libraries\Email;
use App\Models\cm_sistem;
use App\Models\cm_modul;
use App\Models\menu;
use App\Models\employee_mst;
use App\Models\department_mst;
use App\Models\menu_level1;
 
use CodeIgniter\Controller;
 
class Peribadi extends Controller
{
    function __construct()
    {
        $this->encrypter = \Config\Services::encrypter(); // start the encryption service
        $this->session = \Config\Services::session();
        $this->session->start();
		$this->cm_sistem = new cm_sistem;
		$this->cm_modul = new cm_modul;
		$this->menu = new menu;
		$this->menu_level1 = new menu_level1;
		$this->employee_mst = new employee_mst;
		$this->department_mst = new department_mst;
		$this->encode = new Password();
        $this->email = new Email();
    }
    
    public function daftarstaf(){
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
            'senaraidept' => $this->department_mst->SenaraiSemua(),
            'userid' => $this->session->get('userid'),
            'senaraistaf' => $this->employee_mst->SenaraiSemua()
        ];
        return view('daftarstaf', $data);
    }

    public function application(){
        $values = $this->request->getPost();

        if ($lampiran = $this->request->getFileMultiple('lampiran')) {
            foreach($lampiran as $item) {
                if ($item->isValid() && !$item->hasMoved()) {
                    $newName = $item->getRandomName();
                    $item->move(ROOTPATH.'public/avatar', $newName);
                    $values['namadokumen'] = $newName;
                    $values['lokasi'] = ROOTPATH.'public/avatar';
                    /*$dataLampiran = array(
                        'mohonid' => $result,
                        'namadokumen' => $newName,
                        'lokasi' => '/public/avatar'
                    );*/
                    //$this->employee_mst->addLampiran($dataLampiran);
                }
            }
        }
        
        $temp_pass = $this->encode->generateRandomString(6);
        $values['pass'] = $this->encode->encode($temp_pass);
        $values['userid'] = '';//$this->session->get('userid');
        $result = $this->employee_mst->mohon($values);
        //var_dump($result);
        if ($result >= 1) {
			$this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Pendaftaran Staf telah berjaya. Terima kasih.</div>");
            //only sent email when data insert into database
            $to = $values['txt_emel'];
            $cc = '';
            $subject = 'Pendaftaran Staf';
            $body = "Salam Sejahtera.\n\n ".
                    "Sila gunakan Username dan Password yang diberi untuk log masuk ke homepage.\n". 
                    "Username : '".$values['txt_iduser']."'". 
                    "Password : '".$temp_pass."'\n\n\n". 
                    "Sekian, Terima Kasih.";

            $this->email->sendMail($to,$cc,$subject,$body) ;
            
		} else {
			$this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
		}

        
        
        
       
        return redirect()->to('peribadi/daftarstaf'); 
    }


}