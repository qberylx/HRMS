<?php

namespace App\Controllers;
helper('form');
use App\Libraries\Password; // Import library
use App\Libraries\Email;
use App\Models;

class Login extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->encode = new Password();
        $this->email = new Email();
        $this->login_session = new Models\login_session;
        $this->employee_mst = new Models\employee_mst;
    }

    public function index()
    {
        $message = '';
        $data = [
            'message' => $this->session->getFlashdata('message'),
            'head' => view('head'),
            'foot' => view('foot_login')
        ];
        return view('login', $data);
    }

    public function authentication()
    {   
        $userid = $this->request->getPost("userid");
        $pass = $this->request->getPost("password");

        if ($result = $this->employee_mst->SelectWhereUserID($userid)) {
            if (password_verify($pass, $result->pwd)) {
                $param = [
                    'userid' => $result->id_user,
                    'id' => $result->id_employee
                ];
                $this->session->set($param);
                $this->login_session->InsertData($this->request->getPost("userid"),session_id());
                if ($result->chg_pwd_flag == FALSE) {
                    return redirect()->to('login/changepassword'); 
                }else{
                    return redirect()->to('home'); 
                }
            }else{
                $this->session->setFlashdata('message',"<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Wrong input. Please try again.</div>");
                return redirect()->to('login'); 
            }
        }else{
            $this->session->setFlashdata('message',"<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Wrong input. Please try again.</div>");
            return redirect()->to('login'); 
        }
        //$result = $this->employee_mst->checkLogin($userid);

        //$this->login_session->InsertData($this->request->getPost("userid"),session_id());
        //$token= $this->encode->encode($this->request->getPost('password'));
        //return redirect()->to('home?token='.$token."&session=".session_id()); 
    }

    public function changepassword()
    {
        $pass1 = "";
        $pass2 = "";
        $message = "";
        if ($this->request->getPost()) {
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
                if ($this->employee_mst->updatePassword($this->session->get("id"),$this->encode->encode($this->request->getPost("password1")))) {
                    $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Katalaluan anda telah berjaya dikemaskini.</div>");
                    return redirect()->to('home'); 
                }else{
                    $this->session->setFlashdata('message',"<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Error</h4>Wrong input. Please try again.</div>");
                    return redirect()->to('login'); 
                }
            }
        }

        
        $data = [
            'message' => $message,
            'head' => view('head'),
            'foot' => view('foot_login'),
            'pass1' => $pass1,
            'pass2' =>$pass2
        ];
        return view('change_password', $data);
    }

    public function forgotpassword()
    {
        $message = "";
        $email = "";
        $userid = "";
        if ($this->request->getPost()) {
            $val = $this->validate([
                'email' => [
                    'label'  => 'Email',
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'Please key in your email',
                        'valid_email' => 'Please key in valid email'
                    ],
                ],
                'userid' => [
                    'label'  => 'Username',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please key in your Username'
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
                if ($this->employee_mst->checkForgotPass($this->request->getPost("userid"),$this->request->getPost("email"))) {

                    $new_pass = $this->encode->generateRandomString(6);
                    if ($this->employee_mst->updatePassword($this->request->getPost("userid"),$this->encode->encode($new_pass))) {
                        $message = '
                        Dear sir/madam,<br />
                        Your password for sign in at SPA has been changed after your request. Remember you can change your password in your Profile page.
                        <br />
                        You may now log in with your new password: <b><span style="font-size:18px">'.$new_pass.'</span></b><br />
                        ';
                        if ($this->email->sendMail($this->request->getPost('email'),'','Reset Password',$message)) {
                            $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Katalaluan anda telah berjaya dikemaskini.</div>");
                            return redirect()->to('login');
                            die;
                        }else{
                            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Error</h4>Something went wrong.</div>");
                        }
                    }else{
                        $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Error</h4>Something went wrong.</div>");
                    }
                }else{
                    $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Error</h4>Something went wrong.</div>");
                }
                
            }
        }
        
        $data = [
            'message' => $message,
            'head' => view('head'),
            'foot' => view('foot_login'),
            'email' => $email,
            'userid' => $userid
        ];
        return view('reset_password', $data);
    }

    public function logout(){
        if ($this->login_session->delSessionID($this->session->get("userid"))) {
            $this->session->destroy();
            return redirect()->to('login'); 
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Error</h4>Something went wrong.</div>");
            return redirect()->to('home'); 
        }
        
    }

    public function idle(){
        if ($this->login_session->delSessionID($this->session->get("userid"))) {
            $this->session->destroy();
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Idle</h4>You idle for too long.</div>");
            return redirect()->to('login'); 
        }else{
            $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Error</h4>Something went wrong.</div>");
            return redirect()->to('home'); 
        }
        
    }


}

?>