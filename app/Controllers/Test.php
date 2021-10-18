<?php 
namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Test extends Controller
{
    public function index()
    {    
         return view('contact',);
    }
 
    public function create()
    {  
 
    helper(['form', 'url']);
         
        $val = $this->validate([
            'name' => [
                'label'  => 'Rules.username',
                'rules'  => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Name : Kepale bapak ko',
                ],
            ],
            'email' => 'required',
            'message'  => 'required',
        ]);
 
        //$model = new ContactModel();
 
        if (!$val)
        {
 
            echo view('contact', [
                   'validation' => $this->validator
            ]);
 
        }
        else
        { 
       /*
            $model->save([
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
                'message'  => $this->request->getVar('message'),
            ]);
 */
            echo view('success');
        }
    }
}