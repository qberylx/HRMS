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
use App\Models\accesslevel_mst;
 
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
		$this->pass = new Password();
        $this->email = new Email();
        $this->accesslevel_mst = new accesslevel_mst();
    }
    
    public function daftarstaf(){
        //var_dump($this->session->get()); //tengok list session
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
            'senaraidept' => $this->department_mst->SenaraiSemua(),
            'userid' => $this->session->get('userid'),
            'senaraistaf' => $this->employee_mst->SenaraiSemua(),
            'acclvl_list' => $this->accesslevel_mst->SelectAll()
        ];
        return view('daftarstaf', $data);
    }

    public function senaraistaf(){
        $menu = $this->menu->SelectByAccessLvl($this->session->get('access_level'));
        foreach ($menu as $val) {
            $val->menulvl1 = $this->menu_level1->SelectByAccessLvl($val->id, $this->session->get("access_level"));
        };

        $staff = $this->employee_mst->SenaraiSemua();
        foreach ($staff as $val) {
            $val->id_encode = bin2hex($this->encrypter->encrypt($val->id_user));
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
            'senarai_staf' => $staff
        ];
        return view('senarai_staf', $data);
    }

    public function maklumat_staf(){
        $menu = $this->menu->SelectByAccessLvl($this->session->get('access_level'));
        foreach ($menu as $val) {
            $val->menulvl1 = $this->menu_level1->SelectByAccessLvl($val->id, $this->session->get("access_level"));
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
                'uripath' => "/peribadi/senaraistaf"
            )),
            'headermenu' => view('header_menu', array(
                'userinfo' => $this->employee_mst->SelectWhereUserID($this->session->get("userid")),
                'id_encode' => bin2hex($this->encrypter->encrypt($this->session->get("userid")))
            )),
            'senaraidept' => $this->department_mst->SenaraiSemua(),
            'staf' => $this->employee_mst->SelectWhereUserID($decode_id),
            'acclvl_list' => $this->accesslevel_mst->SelectAll(),
            'lampiran' =>'',// $this->cm02_lampiran->SelWheremohonID($decode_id),
            'status_tindakan' =>''// $this->cm_statusdok->SelWhereKodIn()
        ];
        return view('maklumat_staf', $data);
    }

    public function userprofile(){
        $menu = $this->menu->SelectByAccessLvl($this->session->get('access_level'));
        foreach ($menu as $val) {
            $val->menulvl1 = $this->menu_level1->SelectByAccessLvl($val->id, $this->session->get("access_level"));
        };
        
        $decode_id = $this->encrypter->decrypt(hex2bin($this->request->getGet('id')));
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
            )),
            'senaraidept' => $this->department_mst->SenaraiSemua(),
            'staf' => $this->employee_mst->SelectWhereUserID($decode_id),
            'userid' => $this->session->get('userid')
            
        ];
        return view('user_profile', $data);
    }

    public function fileupload(){
        $image = $this->request->getFile('file');

        $_SESSION['imageName'] = $image->getRandomName();
        
        $image->move(ROOTPATH.'public/avatar', $_SESSION['imageName'] );
        
    }

    public function application(){
        $values = $this->request->getPost();
        if ($this->request->getPost()) {
            $val = $this->validate([
                'txt_emel' => [
                    'label'  => 'Email',
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'Please key in the email',
                        'valid_email' => 'Please key in valid email'
                    ],
                ],
                'txt_iduser' => [
                    'label'  => 'iduser',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please key in ID User',
                    ],
                ],
                
            ]);
    
            if (!$val) {
                foreach ($this->validator->getErrors() as $err) {
                $this->session->setFlashdata('message', "<div class='alert alert-danger' role='alert'>$err<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button></div>");
                }
            }else{
                /*
                if ($lampiran = $this->request->getFileMultiple('lampiran')) {
                    foreach($lampiran as $item) {
                        if ($item->isValid() && !$item->hasMoved()) {
                            $newName = $item->getRandomName();
                            $item->move(ROOTPATH.'public/avatar', $newName);
                            $values['namadokumen'] = $newName;
                            $values['lokasi'] = ROOTPATH.'public/avatar';
                        }
                        else{
                            $values['namadokumen'] = '';
                            $values['lokasi'] = '';
                        }}
                        
                }*/
                
                
                /*
                $imageUpload = new ImageUpload();
                
                $data = [
                "filename" => $imageName
                ];

                $imageUpload->insert($data);

                return json_encode(array(
                    "status" => 1,
                    "filename" => $imageName
                ));
                */
                $values['namadokumen'] = ''; 
                $values['lokasi'] = '';

                $values['namadokumen'] = $_SESSION['imageName']; 
                $values['lokasi'] = ROOTPATH.'public/avatar';
                        
                    /*if(!empty($_FILES['file']['name'])){
                    //set preferences
                    $config['upload_path'] = 'public/avatar';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $_FILES['file']['name'];
        
                    //load upload library
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); 
        
                    //File Upload
                    if($this->upload->do_upload('file')){
                        //get about data file
                        $uploadData = $this->upload->data();
                        $values['namadokumen'] = $uploadData['file_name']; 
                        $values['lokasi'] = $uploadData[ROOTPATH.'public/avatar']; 
                    }*/
        
                
                $temp_pass = $this->pass->generateRandomString(6);
                $values['pass'] = $this->pass->encode($temp_pass);
                $values['userid'] = $this->session->get('userid');
                $result = $this->employee_mst->mohon($values);
                //var_dump($result);
                if ($result >= 1) {
                    $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Pendaftaran Staf telah berjaya. Terima kasih.</div>");
                    //only sent email when data insert into database
                    $to = $values['txt_emel'];
                    $cc = '';
                    $subject = 'Pendaftaran Staf';
                    $body = "Salam Sejahtera. <br> <br>".
                            "Sila gunakan Username dan Password yang diberi untuk log masuk ke homepage.<br>". 
                            "Username : '".$values['txt_iduser']."'<br>". 
                            "Password : '".$temp_pass."'<br><br><br>". 
                            "Sekian, Terima Kasih.";
        
                    $this->email->sendMail($to,$cc,$subject,$body) ;
                    
                } else {
                    $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
                }
            }
               
        }

        return redirect()->to('peribadi/daftarstaf'); 
    }

    public function update_application(){
        $values = $this->request->getPost();
        $staff = $this->employee_mst->SelectWhereUserID($values['txt_iduser']);
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
                }else{
                    $values['namadokumen'] = $staff->file_name;
                    $values['lokasi'] = $staff->file_path;
                }
            }
        }
        
        $values['userid'] = $this->session->get('userid');
        $id_encode = bin2hex($this->encrypter->encrypt($values['txt_iduser']));
        //email validation
        if (!filter_var($values['txt_emel'], FILTER_VALIDATE_EMAIL)) {
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error occured.</h4>Email is not valid.</div>");
            return redirect()->to('peribadi/maklumat_staf?id='.$id_encode);
        }else{
            //update
            $result = $this->employee_mst->update_mohon($values);
            //var_dump($result);
            if ($result >= 1) {
                $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Pendaftaran Staf telah berjaya. Terima kasih.</div>");
                
            } else {
                $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
            }
            return redirect()->to('peribadi/maklumat_staf?id='.$id_encode);
        }

        //return redirect()->to('peribadi/senaraistaf'); 
    }



    public function update_userprofile(){
        $values = $this->request->getPost();
        $staff = $this->employee_mst->SelectWhereUserID($this->session->get("userid"));
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
                }else{
                    $values['namadokumen'] = $staff->file_name;
                    $values['lokasi'] = $staff->file_path;
                }
            }
        }
        
        $values['userid'] = $this->session->get('userid');
        $id_encode = bin2hex($this->encrypter->encrypt($values['txt_iduser']));
        //email validation
        if (!filter_var($values['txt_emel'], FILTER_VALIDATE_EMAIL)) {
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error occured.</h4>Email is not valid.</div>");
            return redirect()->to('peribadi/userprofile?id='.$id_encode);
        }else{
            //update
            $result = $this->employee_mst->update_userinfo($values);
            //var_dump($result);
            if ($result >= 1) {
                $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Pendaftaran Staf telah berjaya. Terima kasih.</div>");
                
            } else {
                $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
            }
            return redirect()->to('peribadi/userprofile?id='.$id_encode);
        }
  
    }

    public function changepassword(){
        $menu = $this->menu->SelectByAccessLvl($this->session->get('access_level'));
        foreach ($menu as $val) {
            $val->menulvl1 = $this->menu_level1->SelectByAccessLvl($val->id, $this->session->get("access_level"));
        };
        $id_encode = bin2hex($this->encrypter->encrypt($this->session->get("userid")));
        $staff = $this->employee_mst->SelectWhereUserID($this->session->get("userid"));
        $oldpass= "";
        $pass1 = "";
        $pass2 = "";
        $message = "";
        if ($this->request->getPost()) {
            $oldpass = $this->request->getPost("oldpass");
            $val_op = $this->validate([
                'oldpass' => [
                    'label'  => 'OldPassword',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please key in your current password',
                    ],
                ],
            ]);

            if (!$val_op) {
                foreach ($this->validator->getErrors() as $err) {
                    $message .= '<div class="alert alert-danger" role="alert">'.$err.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>';
                }
            }elseif (password_verify($oldpass, $staff->pwd)) {
                $pass1 = $this->request->getPost("password1");
                $pass2 = $this->request->getPost("password2");

                $val = $this->validate([
                    'password1' => [
                        'label'  => 'Password1',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Please key in your new password',
                        ],
                    ],
                    'password2' => [
                        'label'  => 'Password2',
                        'rules'  => 'matches[password1]',
                        'errors' => [
                            'matches' => 'Your Confirm Password didn\'t match',
                        ],
                    ],
                ]);
                if (!$val) {
                    foreach ($this->validator->getErrors() as $err) {
                        $message .= '<div class="alert alert-danger" role="alert">'.$err.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>';
                    }
                }else{
                    if ($this->employee_mst->updatePassword($this->session->get("userid"),$this->pass->encode($this->request->getPost("password1")))) {
                        $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Katalaluan anda telah berjaya dikemaskini.</div>");
                        return redirect()->to('peribadi/userprofile?id='.$id_encode); 
                    }else{
                        //$this->session->destroy();
                        $this->session->setFlashdata('message',"<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Wrong input. Please try again.</div>");
                        return redirect()->to('peribadi/userprofile?id='.$id_encode); 
                    }
                }
            }else{
                $message .= '<div class="alert alert-danger" role="alert"></i> Error</h4>Your input on current password is wrong. Please try again.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>';
                // $this->session->setFlashdata('message',"<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Your input on current password is wrong. Please try again.</div>");
                // return redirect()->to('peribadi/change_password'); 
            }
        }

        
        $data = [
            'message' => $message,
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
            )),
            'oldpass' => $oldpass,
            'pass1' => $pass1,
            'pass2' =>$pass2
        ];
        return view('user_profile_change_password', $data);
    }
    


}