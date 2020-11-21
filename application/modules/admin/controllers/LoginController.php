<?php

use App\modules\main\libraries\Auth;

class LoginController extends APP_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->layout = 'auth';
    }

    public function index()
    {
        $data = [
            'error' => null,
            'email' => $this->input->post('email')
        ];
        
        if ($this->input->post()) {
            $res = Auth::get()->login(
                $this->input->post('email'), 
                $this->input->post('password')
            );
            
            if ($res === false) {
                $data['error'] = Auth::get()->getLastError();
            } else {
                redirect('/admin/');
            }
        }
        
        $this->load->lview('login/login', $data);
    }

    public function logout()
    {
        Auth::get()->logout();
        redirect('/admin/');
    }
}
