<?php 
namespace App\Controllers;
helper('form');
use App\Libraries\Password; // Import library
use App\Libraries\Encryption;
use App\Libraries\Email;
use App\Libraries\Userinterface;
use App\Models\cm_sistem;
use App\Models\cm_modul;
use App\Models\menu;
use App\Models\employee_mst;
use App\Models\department_mst;
use App\Models\menu_level1;
use App\Models\accesslevel_mst;
use App\Models\lv_takwim;
use App\Models\lv_takwimtype;
use App\Models\lv_empsetting;
use App\Models\lv_application;
use App\Models\lv_leavetype;
use \DateTime;
use \DateInterval;
use \DatePeriod;
 
use CodeIgniter\Controller;
 
class Cuti extends Controller
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
        $this->lv_takwim = new lv_takwim();
        $this->lv_takwimtype = new lv_takwimtype();
        $this->lv_application = new lv_application();
        $this->lv_leavetype = new lv_leavetype();
        $this->ui = new Userinterface;
        $this->lv_empsetting = new lv_empsetting();
        $this->uri = new \CodeIgniter\HTTP\URI();
        $this->uri = service('uri');
        $this->encryption = new Encryption;
        
    }
    
    public function takwimsetting(){
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
            'jenistakwim' => $this->lv_takwimtype->SenaraiSemua(),
            'userid' => $this->session->get('userid'),
            'senaraistaf' => $this->employee_mst->SenaraiSemua(),
            'acclvl_list' => $this->accesslevel_mst->SelectAll()
        ];
        return view('cuti/takwim-setting', $data);
    }

    public function takwimlist(){
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
            'senarai_staf' => $staff,
            'senarai_takwim' => $this->lv_takwim->SenaraiSemua()
        ];
        return view('cuti/takwim-list', $data);
    }

       
    public function application(){
        $values = $this->request->getPost();
        if ($this->request->getPost()) {
            $val = $this->validate([
               
                'leave_date' => [
                    'label'  => 'tarikh',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please choose the date.',
                    ],
                ],
                'leave_type' => [
                    'label'  => 'Jenis',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please choose the leave type.',
                    ],
                ],
                'leave_name' => [
                    'label'  => 'Nama',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please insert the leave name.',
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
                
                $values['userid'] = $this->session->get('userid');
                $result = $this->lv_takwim->InsertData($values);
                if ($result >= 1) {
                    $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Data telah disimpan.</div>");
                } else {
                    $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
                }
                
            }
               
        }

        return redirect()->to('cuti/takwimsetting'); 
    }

    public function delcuti($id)
    {
        if ($this->lv_takwim->delByID($id)) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data Deleted.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }
            return redirect()->to('cuti/takwimlist'); 
    }

    public function leave_setting()
    {
        $data = $this->ui->mainUI();
        $data['senaraidept'] = $this->department_mst->SenaraiSemua();
        
        $staf_list = $this->request->getGet("dept") !== NULL ? $this->employee_mst->SelectLeave($this->request->getGet("dept")) : [] ;

        foreach ($staf_list as $val) {
            $val->lv_setting = $this->lv_empsetting->SelectWhereIDUser($val->id_user,$this->request->getGet("year"));
        };
        $data['stafflist'] = $staf_list;
        $data['uri'] = $this->uri->getQuery();
        return view('cuti/employee_leave_setup', $data);
    }

    public function submit_leave_setting()
    {
        if ($this->lv_empsetting->InsertUpdate($this->request->getPost(), $this->request->getGet("year"))) {
            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success</h4>Data updated sucessfully.</div>");
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
        }

        return redirect()->to('cuti/leave_setting?'.$this->uri->getQuery());
    }

    public function leave_application()
    {
        $data = $this->ui->mainUI();
        if ($this->lv_empsetting->SelectWhereIDUser($this->session->get("userid"),date("Y"))){
            
            $data['senaraidept'] = $this->department_mst->SenaraiSemua();
            $data['curr_year'] = date("Y");
            $data['lv_entitlement'] = $this->lv_empsetting->SelectWhereIDUser($this->session->get("userid"),date("Y"));
            $data['staf'] = $this->employee_mst->SelectWhereUserID($this->session->get("userid"));
            $data['jeniscuti'] = $this->lv_leavetype->SenaraiSemua();
            $data['uri'] = $this->uri->getQuery();
            return view('cuti/leave-application', $data);
        }else{
            return view('cuti/alert-contact-admin', $data);
        }
        
    }

    public function submit_leave_application(){
        $values = $this->request->getPost();

        if ($this->request->getPost()) {
            $val = $this->validate([
                
                'reason' => [
                    'label'  => 'Sebab',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please insert the reason.',
                    ],
                ],
                'contactno' => [
                    'label'  => 'No Telefon',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please insert the contact number.',
                    ],
                ],
                'location' => [
                    'label'  => 'Lokasi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please insert the location.',
                    ],
                ],
                'enddate' => [
                    'label'  => 'tarikh akhir',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please choose the end date.',
                    ],
                ],
                'startdate' => [
                    'label'  => 'tarikh awal',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please choose the start date.',
                    ],
                ],
                
                'sel_leavetype' => [
                    'label'  => 'Jenis Cuti',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please choose the leave type.',
                    ],
                ],
                
            ]);

            if ($values['sel_leavetype']=="04"){
                $val = $this->validate([
                    'lampiran' => [
                        'label'  => 'Gambar MC',
                        'rules'  => 'uploaded[lampiran]|ext_in[lampiran,png,jpg,jpeg]',
                        'errors' => [
                            'uploaded' => 'Please select the file for MC.',
                            'ext_in' => 'Please select only png , jpg or jpeg format.'
                        ],
                    ],
                ]);
            }
            
           
    
            if (!$val) {
                foreach ($this->validator->getErrors() as $err) {
                $this->session->setFlashdata('message', "<div class='alert alert-danger' role='alert'>$err<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button></div>");
                }
            }else{
                
                $values['namadokumen'] = '';
                $values['lokasidoc'] = '';
                if ($values['sel_leavetype']=="04"){//for medical leave
                    if ($lampiran = $this->request->getFileMultiple('lampiran')) {
                        foreach($lampiran as $item) {
                            if ($item->isValid() && !$item->hasMoved()) {
                                $newName = $item->getRandomName();
                                $item->move(ROOTPATH.'public/cuti', $newName);
                                $values['namadokumen'] = $newName;
                                $values['lokasidoc'] = ROOTPATH.'public/cuti';
                                
                            }
                        }
                    }
                }
                
                
                $values['userid'] = $this->session->get('userid');
                $leavesetting = $this->lv_empsetting->SelectWhereIDUser($this->session->get("userid"),date("Y"));
                $total_applied_leave = $values['daysoff'] + $leavesetting->applied_leave;
                $values['total_applied_leave']  = $total_applied_leave;

                $result = $this->lv_application->InsertData($values);
                if ($result >= 1) {
                    $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Data telah disimpan.</div>");
                } else {
                    $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
                }
                
            }
               
        }

        return redirect()->to('cuti/leave_application'); 
    }

    public function ajaxKiraCuti()
    {
        
        $startdate = $this->request->getGet('startdate');
        $enddate = $this->request->getGet('enddate');
        $dates ['startdate'] = $startdate;
        $dates ['enddate'] = $enddate;
        $takwim = $this->lv_takwim->countleave($dates);
        //echo($takwim[0]->takwim_count) ;
        //die;
        $takwimcount = (int)$takwim[0]->takwim_count;
        
        //count difference of Start Date and End Date
        $date1      = date_create($startdate);
        $date2      = date_create($enddate);
        // $date1      = date_create($values['startdate']);
        // $date2      = date_create($values['enddate']);
        $diff       = date_diff($date1,$date2);
        $daysdiff   = $diff->format("%a")+1;
        //count end
        
        //count difference of Applied Date and Snd Date
        //$now = new DateTime();
        //$today = $now->format('Y-m-d'); 
        $today = date_create(date("Y-m-d"));
        $diff2  = date_diff($today,$date1);
        $applydiff = $diff2->format("%a")+0;
        //count end

        //function to check the date is on weekend or not
        function isWeekend($date) {
            //if saturday and sunday
            if (date('N', strtotime($date)) >= 6){
                return true;
            }else
                return false;
        }
        
        //to list all date between Start Date and End Date
        $begin = new DateTime($startdate);
        $end = new DateTime($enddate);
        // $begin = new DateTime($values['startdate']);
        // $end = new DateTime($values['enddate']);
        $end = $end->modify( '+1 day' );

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        $countweekend = 0;
        foreach ($period as $dt) {
            if(isWeekend($dt->format("Y-m-d"))){
                $countweekend++;
            }
                
        }
        
        if ($date1 > $date2) {
            $values['startdate_larger'] = TRUE;
        }else{
            $values['startdate_larger'] = FALSE;
        }

        //insert data needed in array
        $values['daysdiff'] = $daysdiff;
        $values['applydiff'] = $applydiff;
        $values['takwimcount'] = $takwimcount;
        $values['weekendcount'] = $countweekend;
        $values['daysoff'] = $daysdiff - $takwimcount - $countweekend;
        
        echo json_encode($values);
    }

    
    public function applicationlist()
    {
        $data = $this->ui->mainUI();
        //senarai mohon statusdoc = "01" (mohon)
        $user_info = $this->employee_mst->SelectWhereUserID($this->session->get('userid'));
        if ($user_info->accesslevel_id=="5"){// for access level = CEO
            $app_list = $this->lv_application->SenaraiPermohonanManager($user_info->accesslevel_id);
        }else{
            $app_list = $this->lv_application->SenaraiPermohonan($user_info->id_dept,$user_info->accesslevel_id);
        }
        

        if ($app_list == FALSE){
            $data['application_list'] = $app_list;
        }else{
            foreach ($app_list as $val) {
                $val->id_encode = $this->encryption->encode($val->id);
            }
            $data['application_list'] = $app_list;
        }
        
        
        
        $data['uri'] = $this->uri->getQuery();
        return view('cuti/application-list', $data);
    }

    public function applicationinfo(){
        
        $data = $this->ui->mainUI();
        $id_decode = $this->encryption->decode($this->request->getGet('id'));
        $app_info = $this->lv_application->SelectWhereID($id_decode);
        $staf = $this->employee_mst->SelectWhereUserID($app_info->id_user);
        $data['lv_entitlement'] = $this->lv_empsetting->SelectWhereIDUser($app_info->id_user,date("Y"));
        //$data['app_status']  = $this->lv_statusdoc->SenaraiStatusKelulusan();
        

        $data['appinfo'] = $app_info;
        $data['staf'] = $staf;
        $data['curr_year'] = date("Y");
           
        
        
        return view('cuti/application-info',$data);
    }

    public function submit_approve_application(){
        $values = $this->request->getPost();
        $id_encode = $this->encryption->encode($values['application_id']);
        if ($this->request->getPost()) {
            $val = $this->validate([
                
                'comment' => [
                    'label'  => 'Comment',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please write comment.',
                    ],
                ],
                'sel_status' => [
                    'label'  => 'Status',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please choose status.',
                    ],
                ],
                
                
                
            ]);
    
            if (!$val) {
                foreach ($this->validator->getErrors() as $err) {
                $this->session->setFlashdata('message', "<div class='alert alert-danger' role='alert'>$err<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button></div>");
                }
                return redirect()->to('cuti/applicationinfo?id='.$id_encode); 
            }else{

                $appinfo = $this->lv_application->SelectWhereID($values['application_id']);
                $appsetting = $this->lv_empsetting->SelectWhereIDUser($appinfo->id_user,date("Y"));
                
                
                $applied_daysoff =  (float)$appinfo->daysoff;
                
                $total_applied_daysoff = (float)$appsetting->applied_leave;
                $last_yr_bal = (float)$appsetting->last_yr_bal;
                $curr_yr_bal = (float)$appsetting->curr_yr_bal;

                if ($values['sel_status'] == "02"){//if status  = APPROVE
                    
                    if ($applied_daysoff > $last_yr_bal){
                        $total_applied_daysoff = $total_applied_daysoff - $applied_daysoff;
                        $applied_daysoff = $applied_daysoff - $last_yr_bal;
                        $curr_yr_bal = $curr_yr_bal - $applied_daysoff;
                        $last_yr_bal = 0;
                    
                    }else{
                        $total_applied_daysoff = $total_applied_daysoff - $applied_daysoff;
                        $last_yr_bal = $last_yr_bal - $applied_daysoff;
                        
                    }

                }else{//if status = NOT APPROVE (03)
                    $total_applied_daysoff = $total_applied_daysoff - $applied_daysoff;

                }
                
                $values['userid'] = $appinfo->id_user;//applicant
                $values['ses_userid'] = $this->session->get("userid");//approver
                $values['total_applied_daysoff'] = $total_applied_daysoff;
                $values['curr_yr_bal'] = $curr_yr_bal;
                $values['last_yr_bal'] = $last_yr_bal;

                $to =  $appinfo->email;
                $cc = '';
                $subject = 'Permohonan Cuti Staf';
                
                if ($values['sel_status'] == "02"){
                    $body = "Assalamualaikum/Greetings, <br> <br>".
                            "Name   : <b>".$appinfo->name."</b><br>". 
                            "User ID: <b>".$appinfo->id_user."</b><br>". 
                            "Leave Application Status : <b>APPROVED</b><br>".
                            "Comment : <b>".$values['comment']."</b> <br><br>". 
                            "Your Leave Application from <b>".date("d/m/Y",strtotime($appinfo->startdate))."</b> to <b>".date("d/m/Y",strtotime($appinfo->enddate))."</b> has already been <b>APPROVED</b>. <br><br><br><br>". 
                            "Thank You.";

                }else{
                    $body = "Assalamualaikum/Greetings, <br> <br>".
                            "Name   : <b>".$appinfo->name."</b><br>". 
                            "User ID: <b>".$appinfo->id_user."</b><br>". 
                            "Leave Application Status : <b>NOT APPROVED</b><br>".
                            "Comment : <b>".$values['comment']."</b> <br><br>". 
                            "Your Leave Application from <b>".date("d/m/Y",strtotime($appinfo->startdate))."</b> to <b>".date("d/m/Y",strtotime($appinfo->enddate))."</b> are <b>NOT APPROVED</b>. <br><br><br><br>". 
                            "Thank You.";

                }
                
                
                $result = $this->lv_application->UpdateData($values);
                if ($result >= 1) {
                    $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Data telah disimpan.</div>");

                    
        
                    $this->email->sendMail($to,$cc,$subject,$body) ;

                } else {
                    $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Something is wrong.</div>");
                }
                return redirect()->to('cuti/applicationlist'); 
            }
               
        }

        
    }

}