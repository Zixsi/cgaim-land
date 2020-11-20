<?php

namespace App\services\lecture\repository;

use App\services\lecture\entity\LectureEntity;
use App\services\lecture\models\LectureModel;

class LectureRepository
{
    /**
     * @var LectureModel 
     */
    private $model;
    
    /**
     * LectureRepository
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->model = new LectureModel();
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
     * @param LectureEntity $item
     * @return bool
     */
    public function save(LectureEntity &$item)
    {   
        $fields = $this->getItemParams($item);
        
        if ($item->id === 0) {
            $this->model->add($fields);
        } else {
            $this->model->update($item->id, $fields);
        }
        
        $item->syncOriginal();
        
        return true;
    }
    
    /**
     * @param int $id
     * @return LectureEntity|null
     */
    public function getItem(int $id): ?LectureEntity
    {
        $item = $this->model->getById($id);
        
        if($item === null) {
            return null;
        }
        
        return LectureEntity::create($item)->syncOriginal();
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->model->getLastInsertId();
    }
    
    /**
     * @return LectureEntity
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param LectureEntity $entity
     * @return array
     */
    private function getItemParams(LectureEntity $entity): array
    {
        $params = $entity->toArray();
        $params['items'] = json_encode($params['items']);
        
        return $params;
    }
}
