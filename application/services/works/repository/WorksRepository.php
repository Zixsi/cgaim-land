<?php

namespace App\services\works\repository;

use App\services\works\entity\WorksEntity;
use App\services\works\models\WorksModel;

class WorksRepository
{
    /**
     * @var WorksModel 
     */
    private $model;
    
    /**
     * WorksRepository
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->model = new WorksModel();
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
     * @param WorksEntity $item
     * @return bool
     */
    public function save(WorksEntity &$item)
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
     * @return WorksEntity|null
     */
    public function getItem(int $id): ?WorksEntity
    {
        $item = $this->model->getById($id);
        
        if($item === null) {
            return null;
        }
        
        return WorksEntity::create($item)->syncOriginal();
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->model->getLastInsertId();
    }
    
    /**
     * @return WorksEntity
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param WorksEntity $entity
     * @return array
     */
    private function getItemParams(WorksEntity $entity): array
    {
        $params = $entity->toArray();
        
        return $params;
    }
}
