<?php

namespace App\services\block;

use App\services\block\entity\BlockEntity;
use App\services\block\models\BlockModel;
use App\services\block\repository\BlockRepository;
use App\services\block\validators\BlockValidator;
use CI_Controller;
use Exception;

class Block
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
     * @var BlockRepository
     */
    private $repository;
    
    /**
     * Block
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->ci = &get_instance();
        $this->repository = BlockRepository::get();
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
    public function save(BlockEntity $item)
    {
        try {
            $this->uploadItemFiles($item);
            $validator = new BlockValidator();
           
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
     * @return BlockRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return BlockModel
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
     * @param BlockEntity $item
     */
    private function uploadItemFiles(&$item)
    {       
        $this->ci->load->config('upload');
        $this->ci->load->library('upload');
        
        if (isset($_FILES['img']) === false || empty($_FILES['img']['tmp_name'])) {
            return;
        }
            
        $config = $this->ci->config->item('block_img');
        $this->ci->upload->initialize($config);
                
        if($this->ci->upload->do_upload('img') == false) {
            throw new Exception($this->ci->upload->display_errors(), 1);
        } else {
            $file = $this->ci->upload->data();
            $item->img = UPLOADS_PATH_PUBLIC . $file['file_name'];
        }
    }
}
