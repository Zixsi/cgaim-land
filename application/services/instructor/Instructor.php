<?php

namespace App\services\instructor;

use App\services\instructor\entity\InstructorEntity;
use App\services\instructor\models\InstructorModel;
use App\services\instructor\repository\InstructorRepository;
use CI_Controller;
use Exception;

class Instructor
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
     * @var InstructorRepository
     */
    private $repository;
    
    /**
     * Instructor
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->ci = &get_instance();
        $this->repository = InstructorRepository::get();
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
    public function save(InstructorEntity $item)
    {
        try {
            $this->uploadItemFiles($item);
            
            $this->ci->load->library('form_validation');
            $this->ci->form_validation->reset_validation();
            $this->ci->form_validation->set_data($item->toArray());

            if ($this->ci->form_validation->run('instructor') === false) {
                throw new Exception($this->ci->form_validation->error_string());
            }
            
            $this->repository->save($item);
            
            return true;
        } catch (Exception $e) {
            $this->lastError = $e->getMessage();
        }

        return false;
    }
    
    /**
     * @return InstructorRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return InstructorModel
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
     * @param int $id
     * @return ?array
     */
    public function getItem($id)
    {
        $item = $this->getModel()->getById($id);
        $item['blocks'] = json_decode($item['blocks'], true);
        $item['full_name'] = sprintf("%s %s", $item['first_name'], $item['last_name']); 
        
        return $item; 
    }
    
    /**
     * @param InstructorEntity $item
     */
    private function uploadItemFiles(&$item)
    {
        $fieldsMap = [
            'photoBig' => 'photo_big',
            'photoSmall' => 'photo_small'
        ];
        
        $this->ci->load->config('upload');
        $this->ci->load->library('upload');
        
        foreach ($fieldsMap as $key => $field) {
            if (isset($_FILES[$field]) === false || empty($_FILES[$field]['tmp_name'])) {
                continue;
            }
            
            $config = $this->ci->config->item(sprintf('instructor_%s', $field));
            $this->ci->upload->initialize($config);
                
            if($this->ci->upload->do_upload($field) == false) {
                throw new Exception($this->ci->upload->display_errors(), 1);
            } else {
                $file = $this->ci->upload->data();
                $item->$key = UPLOADS_PATH_PUBLIC . $file['file_name'];
            }
        }
    }
}
