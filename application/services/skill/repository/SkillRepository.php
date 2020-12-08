<?php

namespace App\services\skill\repository;

use App\services\skill\entity\SkillEntity;
use App\services\skill\models\SkillModel;

class SkillRepository
{
    /**
     * @var SkillModel 
     */
    private $model;
    
    /**
     * SkillRepository
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->model = new SkillModel();
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
     * @param SkillEntity $item
     * @return bool
     */
    public function save(SkillEntity &$item)
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
     * @return SkillEntity|null
     */
    public function getItem(int $id): ?SkillEntity
    {
        $item = $this->model->getById($id);
        
        if($item === null) {
            return null;
        }
        
        return SkillEntity::create($item)->syncOriginal();
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->model->getLastInsertId();
    }
    
    /**
     * @return SkillEntity
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param SkillEntity $entity
     * @return array
     */
    private function getItemParams(SkillEntity $entity): array
    {
        $params = $entity->toArray();
        
        return $params;
    }
}
