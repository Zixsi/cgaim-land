<?php

namespace App\services\skill;

use App\services\skill\entity\SkillEntity;
use App\services\skill\models\SkillModel;
use App\services\skill\repository\SkillRepository;
use App\services\skill\validators\SkillValidator;
use CI_Controller;
use Exception;

class Skill
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
     * @var SkillRepository
     */
    private $repository;
    
    /**
     * Skill
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->ci = &get_instance();
        $this->repository = SkillRepository::get();
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
    public function save(SkillEntity $item)
    {
        try {
            $this->uploadItemFiles($item);
            $validator = new SkillValidator();
           
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
     * @return SkillRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return SkillModel
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
     * @param SkillEntity $item
     */
    private function uploadItemFiles(&$item)
    {       
        $this->ci->load->config('upload');
        $this->ci->load->library('upload');
        
        if (isset($_FILES['img']) === false || empty($_FILES['img']['tmp_name'])) {
            return;
        }
            
        $config = $this->ci->config->item('skill_img');
        $this->ci->upload->initialize($config);
                
        if($this->ci->upload->do_upload('img') == false) {
            throw new Exception($this->ci->upload->display_errors(), 1);
        } else {
            $file = $this->ci->upload->data();
            $item->img = UPLOADS_PATH_PUBLIC . $file['file_name'];
        }
    }
}
