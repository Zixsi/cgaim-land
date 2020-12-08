<?php

namespace App\services\block\entity;

use App\libraries\Entity;

/**
 * @property int $id
 * @property string $title
 * @property string $type
 * @property string $img
 * @property array $data
 */
class BlockEntity extends Entity
{
    /**
     * @var array 
     */
    protected $attributes = [
        'id' => 0,
        'title' => null,
        'type' => 'TEXT',
        'img' => null,
        'data' => null
    ];
    
    /**
     * @var array 
     */
    protected $casts = [
        'id' => 'int',
        'title' => 'string',
        'type' => 'string',
        'img' => 'string',
        'data' => 'json-array'
    ];
    
    
    /**
     * @var array 
     */
    protected $datamap = [

    ];
    
    /**
     * @param array $data
     * @return self
     */
    public function __construct(array $data = [])
    {
        $this->setDefault();
        
        parent::__construct($data);
    }
    
    /**
     * @param array $data
     * @return self
     */
    public static function create(array $data = [])
    {
        return new self($data);
    }
    
     /**
     * @param mixed $value
     * @return $this
     */
    public function setData($value)
    {
        $this->attributes['data'] = $this->convertValueToJsonArray($value);
        
        return $this;
    }
    
    /**
     * @param mixed $value
     * @return string
     */
    private function convertValueToJsonArray($value)
    {
        if (is_array($value) || is_object($value)) {
            $value = json_encode($value);
        }
        
        return $value;
    }
    
    /**
     * @return void
     */
    private function setDefault()
    {
        $this->attributes['data'] = '{"text":"", "list": []}';
    }
}
