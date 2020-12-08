<?php

namespace App\services\course\repository;

use App\services\course\entity\CourseEntity;
use App\services\course\models\CourseModel;

class CourseRepository
{
    /**
     * @var CourseModel 
     */
    private $model;
    
    /**
     * CourseRepository
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->model = new CourseModel();
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
     * @param CourseEntity $item
     * @return bool
     */
    public function save(CourseEntity &$item)
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
     * @return CourseEntity|null
     */
    public function getItem(int $id): ?CourseEntity
    {
        $item = $this->model->getById($id);
        
        if($item === null) {
            return null;
        }
        
        return CourseEntity::create($item)->syncOriginal();
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->model->getLastInsertId();
    }
    
    /**
     * @return CourseModel
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param CourseEntity $entity
     * @return array
     */
    private function getItemParams(CourseEntity $entity): array
    {
        $params = $entity->toArray();
        $params['packages'] = json_encode($params['packages']);
        $params['purpose'] = htmlspecialchars($params['purpose']);
        $params['for_whom'] = json_encode($params['for_whom']);
        $params['program'] = json_encode($params['program']);
        $params['bonuses'] = json_encode(($params['bonuses'] ?? []));
        
        return $params;
    }
}
