<?php

namespace App\services\course;

use App\services\course\entity\CourseEntity;
use App\services\course\models\CourseModel;
use App\services\course\repository\CourseRepository;
use CI_Controller;
use Exception;

class Course
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
     * @var CourseRepository
     */
    private $repository;
    
    /**
     * Course
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->ci = &get_instance();
        $this->repository = CourseRepository::get();
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
    public function save(CourseEntity $item)
    {
        try {
            $this->uploadItemFiles($item);
            $validator = new validators\CourseValidator();
           
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
     * @return CourseRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return CourseModel
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
     * @param int $limit
     * @return array
     */
    public function getListPublished($limit = 10)
    {
        $items = $this->getModel()->getListPublished($limit);
        
        foreach ($items as &$row) {
            $row = $this->prepareItem($row);
        }
        
        return $items;
    }
    
    /**
     * @param int $limit
     * @return array
     */
    public function getListPublishedRandom($limit = 10)
    {
        $items = $this->getModel()->getListPublishedRandom($limit);
        
        foreach ($items as &$row) {
            $row = $this->prepareItem($row);
        }
        
        return $items;
    }
    
    /**
     * @param int $limit
     * @param int $ignore
     * @return array
     */
    public function getOther($limit = 10, $ignore = 0)
    {
        $items = $this->getModel()->getListOther($limit, $ignore);
        
        foreach ($items as &$row) {
            $row = $this->prepareItem($row);
        }
        
        return $items;
    }
    
    
    /**
     * @param string $code
     * @return ?array
     */
    public function getByCode($code)
    {
        $item = $this->getModel()->getByCode($code);
        
        if (empty($item)) {
            return null;
        }
        
        return $this->prepareItem($item);
    }

    /**
     * @param array $item
     * @return array
     */
    private function prepareItem($item)
    {
        $item['start_date_formated'] = 'сразу';
        
        if ((int) $item['start_date_disable'] === 1) {
            $item['start_date'] = '';
        } else {
            $item['start_date_formated'] = getDateStartFormated($item['start_date']);
        }
        
        if (isset($item['packages'])) {
            $item['packages'] = json_decode($item['packages'], true);
        }
        
        if (isset($item['for_whom'])) {
            $item['for_whom'] = json_decode($item['for_whom'], true);
        }
        
        if (isset($item['program'])) {
            $item['program'] = json_decode($item['program'], true);
        }
        
        if (isset($item['bonuses'])) {
            $item['bonuses'] = json_decode($item['bonuses'], true);
        }
        
        if (isset($item['note'])) {
            $note = explode('#', $item['note']);
            
            if (count($note) === 1) {
                $note[1] = '';
            }
            
            $item['note'] = $note;
        }
        
        if (isset($item['title'])) {            
            $item['title_splited'] = str_replace('#', '<br>', $item['title']);
            $item['title'] = str_replace('#', '', $item['title']);
        }
        
        return $item;
    }

    /**
     * @param CourseEntity $item
     */
    private function uploadItemFiles(&$item)
    {
        try {
            $loadedFiles = [];
            $fieldsMap = [
                'imgBig' => 'img_big',
                'imgSmall' => 'img_small'
            ];

            $this->ci->load->config('upload');
            $this->ci->load->library('upload');

            foreach ($fieldsMap as $key => $field) {
                $file = $this->uploadFile(
                    $field, 
                    $this->ci->config->item(sprintf('course_%s', $field))
                );

                if ($file) {
                    $loadedFiles[] = $file;
                    $item->$key = $file;
                }
            }

            $configForWhomImg = $this->ci->config->item('course_for_whom_img');
            $forWhom = $item->getForWhomRaw();

            for ($i = 0; $i < 4; $i++) {
                $forWhomImgField = sprintf('for_whom_img_%d', $i);       
                $file = $this->uploadFile(
                    $forWhomImgField, 
                    $configForWhomImg
                );

                if ($file) {
                    $loadedFiles[] = $file;
                    $forWhom->get($i)->setImg($file);
                }
            }            

            $item->forWhom = $forWhom->toArray();

            $program = $item->getProgramRaw();
            
            for ($i = 1; $i <= 3; $i++) {
                $moduleImgMethod = sprintf('setModule%dImg', $i);  
                     
                $file = $this->uploadFile(
                    sprintf('module_%d_img', $i), 
                    $this->ci->config->item(sprintf('course_module_img_%d', $i))
                );

                if ($file) {
                    $loadedFiles[] = $file;
                    
                    $program->$moduleImgMethod($file);
                }
            }
            
            $item->program = $program->toArray();
            
        } catch (Exception $e) {
//            foreach ($loadedFiles as $val) {
//                removeUploadedFile($val);
//            }
            
            throw $e;
        }
    }
    
    /**
     * @param string $field
     * @param array $config
     * @return string
     * @throws Exception
     */
    private function uploadFile($field, $config)
    {
        if (isset($_FILES[$field]) === false || empty($_FILES[$field]['tmp_name'])) {
            return false;
        }
        
        $this->ci->upload->initialize($config);

        if($this->ci->upload->do_upload($field) == false) {
            throw new Exception($this->ci->upload->display_errors(), 1);
        }
        
        $file = $this->ci->upload->data();
        
        return UPLOADS_PATH_PUBLIC . $file['file_name'];
    }
}
