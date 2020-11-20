<?php

namespace App\services\block\repository;

use App\services\block\entity\BlockEntity;
use App\services\block\models\BlockModel;

class BlockRepository
{
    /**
     * @var BlockModel 
     */
    private $model;
    
    /**
     * BlockRepository
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->model = new BlockModel();
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
     * @param BlockEntity $item
     * @return bool
     */
    public function save(BlockEntity &$item)
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
     * @return BlockEntity|null
     */
    public function getItem(int $id): ?BlockEntity
    {
        $item = $this->model->getById($id);
        
        if($item === null) {
            return null;
        }
        
        return BlockEntity::create($item)->syncOriginal();
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->model->getLastInsertId();
    }
    
    /**
     * @return BlockEntity
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param BlockEntity $entity
     * @return array
     */
    private function getItemParams(BlockEntity $entity): array
    {
        $params = $entity->toArray();
        
        if ($params['type'] === 'TEXT') {
            $params['data']['list'] = [];
        } else {
            $params['data']['text'] = '';
        }
        
        $params['data'] = json_encode($params['data']);
        
        return $params;
    }
}
