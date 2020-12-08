<?php

namespace App\services\review\repository;

use App\services\review\entity\ReviewEntity;
use App\services\review\models\ReviewModel;

class ReviewRepository
{
    /**
     * @var ReviewModel 
     */
    private $model;
    
    /**
     * ReviewRepository
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->model = new ReviewModel();
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
     * @param ReviewEntity $item
     * @return bool
     */
    public function save(ReviewEntity &$item)
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
     * @return ReviewEntity|null
     */
    public function getItem(int $id): ?ReviewEntity
    {
        $item = $this->model->getById($id);
        
        if($item === null) {
            return null;
        }
        
        return ReviewEntity::create($item)->syncOriginal();
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->model->getLastInsertId();
    }
    
    /**
     * @return ReviewEntity
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param ReviewEntity $entity
     * @return array
     */
    private function getItemParams(ReviewEntity $entity): array
    {
        $params = $entity->toArray();
        
        return $params;
    }
}
