<?php

namespace App\services\workshop\repository;

use App\services\workshop\entity\WorkshopEntity;
use App\services\workshop\models\WorkshopModel;

class WorkshopRepository
{
    /**
     * @var WorkshopModel 
     */
    private $model;
    
    /**
     * WorkshopRepository
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->model = new WorkshopModel();
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
     * @param WorkshopEntity $item
     * @return bool
     */
    public function save(WorkshopEntity &$item)
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
     * @return WorkshopEntity|null
     */
    public function getItem(int $id): ?WorkshopEntity
    {
        $item = $this->model->getById($id);
        
        if($item === null) {
            return null;
        }
        
        return WorkshopEntity::create($item)->syncOriginal();
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->model->getLastInsertId();
    }
    
    /**
     * @return WorkshopModel
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param WorkshopEntity $entity
     * @return array
     */
    private function getItemParams(WorkshopEntity $entity): array
    {
        $params = $entity->toArray();
        $params['packages'] = json_encode($params['packages']);
        $params['purpose'] = htmlspecialchars($params['purpose']);
        $params['program'] = json_encode($params['program']);
        
        return $params;
    }
}
