<?php

namespace App\services\workshop;

use App\services\workshop\entity\WorkshopEntity;
use App\services\workshop\models\WorkshopModel;
use App\services\workshop\repository\WorkshopRepository;
use CI_Controller;
use Exception;

class Workshop
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
     * @var WorkshopRepository
     */
    private $repository;
    
    /**
     * Workshop
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->ci = &get_instance();
        $this->repository = WorkshopRepository::get();
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
    public function save(WorkshopEntity $item)
    {
        try {
            $this->uploadItemFiles($item);
            $validator = new validators\WorkshopValidator();
           
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
     * @return WorkshopRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return WorkshopModel
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
        $item['start_date_formated'] = '';
        
        if ((int) $item['start_date_disable'] === 1) {
            $item['start_date'] = '';
        } else {
            $item['start_date_formated'] = getDateStartFormated($item['start_date']);
        }
        
        if (isset($item['packages'])) {
            $item['packages'] = json_decode($item['packages'], true);
        }
        
        if (isset($item['program'])) {
            $item['program'] = json_decode($item['program'], true);
        }
        
        if (isset($item['note']) && empty($item['note']) === false) {
            $note = explode('#', $item['note']);
            
            if (count($note) === 1) {
                $note[1] = '';
            }
            
            $item['note'] = $note;
        }
        
        return $item;
    }

    /**
     * @param WorkshopEntity $item
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
                    $this->ci->config->item(sprintf('workshop_%s', $field))
                );

                if ($file) {
                    $loadedFiles[] = $file;
                    $item->$key = $file;
                }
            }
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
