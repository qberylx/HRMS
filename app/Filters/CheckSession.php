<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CheckSession implements FilterInterface
{

    /**
     * Check loggedIn to redirect page
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = \Config\Services::session();
        $login_session = new \App\Models\login_session;
        if (!session('session_hash')) {
            return redirect()->to('/login/logout');
        }else{
            if (!password_verify($login_session->SelectSessionID(session('userid'))->session_id, session('session_hash'))) {
                //$session->destroy();
                //$session->setFlashdata('message', "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-ban'></i> Session</h4>Something is wrong.</div>");
                //return redirect()->to('login'); 
                return redirect()->to('/login/logout');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}