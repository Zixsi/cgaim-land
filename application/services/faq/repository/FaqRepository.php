<?php

namespace App\services\faq\repository;

use App\services\faq\entity\FaqEntity;
use App\services\faq\models\FaqModel;

class FaqRepository
{
    /**
     * @var FaqModel 
     */
    private $model;
    
    /**
     * FaqRepository
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->model = new FaqModel();
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
     * @param FaqEntity $item
     * @return bool
     */
    public function save(FaqEntity &$item)
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
     * @return FaqEntity|null
     */
    public function getItem(int $id): ?FaqEntity
    {
        $item = $this->model->getById($id);
        
        if($item === null) {
            return null;
        }
        
        return FaqEntity::create($item)->syncOriginal();
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->model->getLastInsertId();
    }
    
    /**
     * @return FaqEntity
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param FaqEntity $entity
     * @return array
     */
    private function getItemParams(FaqEntity $entity): array
    {
        $params = $entity->toArray();
        
        return $params;
    }
}
