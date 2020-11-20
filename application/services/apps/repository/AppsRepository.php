<?php

namespace App\services\apps\repository;

use App\services\apps\entity\AppsEntity;
use App\services\apps\models\AppsModel;

class AppsRepository
{
    /**
     * @var AppsModel 
     */
    private $model;
    
    /**
     * AppsRepository
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->model = new AppsModel();
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
     * @param AppsEntity $item
     * @return bool
     */
    public function save(AppsEntity &$item)
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
     * @return AppsEntity|null
     */
    public function getItem(int $id): ?AppsEntity
    {
        $item = $this->model->getById($id);
        
        if($item === null) {
            return null;
        }
        
        return AppsEntity::create($item)->syncOriginal();
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->model->getLastInsertId();
    }
    
    /**
     * @return AppsEntity
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param AppsEntity $entity
     * @return array
     */
    private function getItemParams(AppsEntity $entity): array
    {
        $params = $entity->toArray();
        
        return $params;
    }
}
