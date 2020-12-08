<?php

namespace App\services\instructor\repository;

use App\services\instructor\entity\InstructorEntity;
use App\services\instructor\models\InstructorModel;

class InstructorRepository
{
    /**
     * @var InstructorModel 
     */
    private $model;
    
    /**
     * InstructorRepository
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->model = new InstructorModel();
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
     * @param InstructorEntity $item
     * @return bool
     */
    public function save(InstructorEntity &$item)
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
     * @return InstructorEntity|null
     */
    public function getItem(int $id): ?InstructorEntity
    {
        $item = $this->model->getById($id);
        
        if($item === null) {
            return null;
        }
        
        return InstructorEntity::create($item)->syncOriginal();
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->model->getLastInsertId();
    }
    
    /**
     * @return InstructorModel
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param InstructorEntity $entity
     * @return array
     */
    private function getItemParams(InstructorEntity $entity): array
    {
        $params = $entity->toArray();
        $params['blocks'] = json_encode($params['blocks']);
        
        return $params;
    }
}
