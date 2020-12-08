<?php

namespace App\services\bonus\repository;

use App\services\bonus\entity\BonusEntity;
use App\services\bonus\models\BonusModel;

class BonusRepository
{
    /**
     * @var BonusModel 
     */
    private $model;
    
    /**
     * BonusRepository
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->model = new BonusModel();
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
     * @param BonusEntity $item
     * @return bool
     */
    public function save(BonusEntity &$item)
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
     * @return BonusEntity|null
     */
    public function getItem(int $id): ?BonusEntity
    {
        $item = $this->model->getById($id);
        
        if($item === null) {
            return null;
        }
        
        return BonusEntity::create($item)->syncOriginal();
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->model->getLastInsertId();
    }
    
    /**
     * @return BonusEntity
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param BonusEntity $entity
     * @return array
     */
    private function getItemParams(BonusEntity $entity): array
    {
        $params = $entity->toArray();
        
        return $params;
    }
}
