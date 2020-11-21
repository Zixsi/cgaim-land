<?php

class SystemHook
{

    public $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function profiler()
    {
        $this->CI->output->enable_profiler(false);
    }

    public function initOptions()
    {
        date_default_timezone_set('Europe/Moscow');
        // setlocale(LC_ALL, 'ru_RU.UTF-8');
    }

    public function sessionStart()
    {
        $session_cookie_name = $this->CI->config->item('sess_cookie_name');
        
        if (empty($_COOKIE[$session_cookie_name]) === false) {
            $this->CI->load->library('session');
        }
    }

    public function checkAuth()
    {
        $ci = &get_instance();
        
        if (is_cli() == true || $ci->uri->segment(1) !== 'admin') {
            return;
        }
        
        $c = $ci->router->fetch_class();
        $a = $ci->router->fetch_method();
        $check = App\modules\main\libraries\Auth::get()->check();
        
        if ($check === false && $c !== 'LoginController') {
            redirect('admin/login/');
        }
    }

}
