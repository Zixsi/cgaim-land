<?php

namespace App\modules\main\libraries;

use App\modules\main\models\UserModel;
use CI_Controller;
use Exception;
use function get_instance;

class Auth
{
    /**
     * @var CI_Controller
     */
    private $ci;
    
    /**
     * @var string
     */
    private $lastError;

    /**
     * Auth
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct() 
    {
        $this->ci = &get_instance();
    }

    /**
     * @return void
     */
    private function __clone() {}

    /**
     * @return self
     */
    public static function get()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }
    
    /**
     * @param type $email
     * @param type $password
     * @return boolean
     */
    public function login($email, $password)
    {
        try {
            $this->ci->load->library('form_validation');
            $this->ci->form_validation->reset_validation();
            $this->ci->form_validation->set_data(
                    [
                        'email' => $email,
                        'password' => $password
                    ]
                );

            if ($this->ci->form_validation->run('auth_login') === false) {
                throw new Exception($this->ci->form_validation->error_string());
            }

            $model = new UserModel();

            if (($user = $model->getByLogin($email)) === false) {
                throw new Exception('User not found');
            }
    
            if ($model->pwdHash($password) !== $user['password']) {
                throw new Exception('Wrong login or password');
            }
    
            unset($user['password']);    
            $user['last_update'] = time();
            $this->setUser($user);
            
            return true;
        } catch (Exception $e) {
            $this->lastError = $e->getMessage();
        }

        return false;
    }
    
    /**
     * @return ?string
     */
    public function getLastError()
    {
        return $this->lastError;
    }

    /**
     * @return void
     */
    public function logout()
    {
        $session_cookie_name = $this->ci->config->item('sess_cookie_name');
        
        if (empty($_COOKIE[$session_cookie_name]) === false) {
            $this->ci->session->sess_destroy();
        }
    }

    /**
     * @param array $user
     */
    private function setUser($user)
    {
        $this->ci->load->library('session');
        $this->ci->session->set_userdata('USER', $user);
    }

    /**
     * @return ?array
     */
    public function getUser()
    {
        if (isset($_SESSION) === false) {
            return null;
        }

        return $this->ci->session->userdata('USER');
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return (int) ($this->getUser()['id'] ?? 0);
    }

    /**
     * @return bool
     */
    public function check()
    {
        return (
                ($user = $this->getUser()) == false 
                || isset($user['id']) == false 
                || $user['id'] < 1
            ) ? false : true;
    }
}
