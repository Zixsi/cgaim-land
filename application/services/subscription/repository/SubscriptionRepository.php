<?php

namespace App\services\subscription\repository;

use App\services\subscription\entity\SubscriptionEntity;
use App\services\subscription\models\SubscriptionModel;

class SubscriptionRepository
{
    /**
     * @var SubscriptionModel 
     */
    private $model;
    
    /**
     * SubscriptionRepository
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->model = new SubscriptionModel();
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
     * @param SubscriptionEntity $item
     * @return bool
     */
    public function save(SubscriptionEntity &$item)
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
     * @return SubscriptionEntity|null
     */
    public function getItem(int $id): ?SubscriptionEntity
    {
        $item = $this->model->getById($id);
        
        if($item === null) {
            return null;
        }
        
        return SubscriptionEntity::create($item)->syncOriginal();
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->model->getLastInsertId();
    }
    
    /**
     * @return SubscriptionEntity
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param SubscriptionEntity $entity
     * @return array
     */
    private function getItemParams(SubscriptionEntity $entity): array
    {
        $params = $entity->toArray();
        
        return $params;
    }
}
