<?php

namespace App\services\works;

use App\services\works\entity\WorksEntity;
use App\services\works\models\WorksModel;
use App\services\works\repository\WorksRepository;
use App\services\works\validators\WorksValidator;
use CI_Controller;
use Exception;

class Works
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
     * @var WorksRepository
     */
    private $repository;
    
    /**
     * Works
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->ci = &get_instance();
        $this->repository = WorksRepository::get();
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
    public function save(WorksEntity $item)
    {
        try {
            if ($item->type === 'IMG') {
                $this->uploadItemFiles($item);
            }
            
            $validator = new WorksValidator();
           
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
     * @return WorksRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return WorksModel
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
     * @param WorksEntity $item
     */
    private function uploadItemFiles(&$item)
    {       
        $this->ci->load->config('upload');
        $this->ci->load->library('upload');
        
        if (isset($_FILES['img']) === false || empty($_FILES['img']['tmp_name'])) {
            return;
        }
            
        $config = $this->ci->config->item('works_img');
        $this->ci->upload->initialize($config);
                
        if($this->ci->upload->do_upload('img') == false) {
            throw new Exception($this->ci->upload->display_errors(), 1);
        } else {
            $file = $this->ci->upload->data();
            $item->source = UPLOADS_PATH_PUBLIC . $file['file_name'];
        }
    }
}
