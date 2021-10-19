<?php

namespace App\Controllers;
helper('form');
use App\Libraries\Password; // Import library
use App\Libraries\Email;

class Login extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->encode = new Password();
        $this->email = new Email();
    }

    public function index()
    {
        $message = '';
        $data = [
            'message' => $message,
            'head' => view('head'),
            'foot' => view('foot')
        ];
        return view('login', $data);
    }

    public function authentication()
    {
        $token= $this->encode->encode($this->request->getPost('password'));
        return redirect()->to('home?token='.$token."&session=".session_id()); 
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
                $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Katalaluan anda telah berjaya dikemaskini.</div>");
                return redirect()->to('home'); 
            }
        }

        
        $data = [
            'message' => $message,
            'head' => view('head'),
            'foot' => view('foot'),
            'pass1' => $pass1,
            'pass2' =>$pass2
        ];
        return view('change_password', $data);
    }

    public function forgotpassword()
    {
        $message = "";
        $email = "";
        if ($this->request->getPost()) {
            $val = $this->validate([
                'email' => [
                    'label'  => 'Email',
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'Please key in your email',
                        'valid_email' => 'Please key in valid email'
                    ],
                ]
            ]);

            if (!$val) {
                foreach ($this->validator->getErrors() as $err) {
                    $message .= '<div class="alert alert-danger" role="alert">'.$err.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>';
                }
            }else{
                $new_pass = $this->encode->generateRandomString(5);
                $message = '
                Dear sir/madam,<br />
                Your password for sign in at SPA has been changed after your request. Remember you can change your password in your Profile page.
                <br />
                You may now log in with your new password: <b><span style="font-size:18px">'.$new_pass.'</span></b><br />
                ';
                if ($this->email->sendMail($this->request->getPost('email'),'','Reset Password',$message)) {
                    $this->session->setFlashdata('message', "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Berjaya</h4>Katalaluan anda telah berjaya dikemaskini.</div>");
                    return redirect()->to('login'); 
                }else{
                    $this->session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Error</h4>Something went wrong.</div>");
                    return redirect()->to('login/forgotpassword'); 
                }
                
            }
        }
        
        $data = [
            'message' => $message,
            'head' => view('head'),
            'foot' => view('foot'),
            'email' => $email
        ];
        return view('reset_password', $data);
    }


}

?>