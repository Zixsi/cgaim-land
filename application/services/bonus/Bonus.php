<?php

namespace App\services\bonus;

use App\services\bonus\entity\BonusEntity;
use App\services\bonus\models\BonusModel;
use App\services\bonus\repository\BonusRepository;
use App\services\bonus\validators\BonusValidator;
use CI_Controller;
use Exception;

class Bonus
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
     *
     * @var BonusRepository
     */
    private $repository;
    
    /**
     * Bonus
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->ci = &get_instance();
        $this->repository = BonusRepository::get();
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
     * @return boolean
     */
    public function save(BonusEntity $item)
    {
        try {
            $this->uploadItemFiles($item);
            $validator = new BonusValidator();
           
            if ($validator->run($item->toArray()) === false) {
                throw new Exception($validator->getError());
            }
            
            $this->repository->save($item);
            
            return true;
        } catch (Exception $e) {
            $this->lastError = $e->getMessage();
        }

        return false;
    }
    
    /**
     * @return BonusRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return BonusModel
     */
    public function getModel()
    {
        return $this->repository->getModel();
    }

    /**
     * @return ?string
     */
    public function getLastError()
    {
        return $this->lastError;
    }
    
    /**
     * @param BonusEntity $item
     */
    private function uploadItemFiles(&$item)
    {       
        $this->ci->load->config('upload');
        $this->ci->load->library('upload');
        
        if (isset($_FILES['img']) === false || empty($_FILES['img']['tmp_name'])) {
            return;
        }
            
        $config = $this->ci->config->item('bonus_img');
        $this->ci->upload->initialize($config);
                
        if($this->ci->upload->do_upload('img') == false) {
            throw new Exception($this->ci->upload->display_errors(), 1);
        } else {
            $file = $this->ci->upload->data();
            $item->img = UPLOADS_PATH_PUBLIC . $file['file_name'];
        }
    }
}
