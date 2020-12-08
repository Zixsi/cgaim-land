<?php

namespace App\services\lecture;

use App\services\lecture\entity\LectureEntity;
use App\services\lecture\models\LectureModel;
use App\services\lecture\repository\LectureRepository;
use App\services\lecture\validators\LectureValidator;
use CI_Controller;
use Exception;

class Lecture
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
     * @var LectureRepository
     */
    private $repository;
    
    /**
     * Lecture
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->ci = &get_instance();
        $this->repository = LectureRepository::get();
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
    public function save(LectureEntity $item)
    {
        try {
            $this->uploadItemFiles($item);
            $validator = new LectureValidator();
           
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
     * @return LectureRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return LectureModel
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
     * @param int $course
     * @return array
     */
    public function getCourseLectures($course)
    {
        $items = $this->getModel()->getListForCourse($course);
        
        foreach ($items as &$row) {
            $row['items'] = json_decode($row['items'], true);
        }
        
        return $items;
    }
    
    /**
     * @param LectureEntity $item
     */
    private function uploadItemFiles(&$item)
    {       
        $this->ci->load->config('upload');
        $this->ci->load->library('upload');
        
        if (isset($_FILES['img']) === false || empty($_FILES['img']['tmp_name'])) {
            return;
        }
            
        $config = $this->ci->config->item('lecture_img');
        $this->ci->upload->initialize($config);
                
        if($this->ci->upload->do_upload('img') == false) {
            throw new Exception($this->ci->upload->display_errors(), 1);
        } else {
            $file = $this->ci->upload->data();
            $item->img = UPLOADS_PATH_PUBLIC . $file['file_name'];
        }
    }
}
