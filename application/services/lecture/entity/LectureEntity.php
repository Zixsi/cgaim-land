<?php

namespace App\services\lecture\entity;

use App\libraries\Entity;

/**
 * @property int $id
 * @property int $course
 * @property int $month
 * @property string $img
 * @property array $items
 */
class LectureEntity extends Entity
{
    /**
     * @var array 
     */
    protected $attributes = [
        'id' => 0,
        'course' => 0,
        'month' => 0,
        'img' => null,
        'items' => []
    ];
    
    /**
     * @var array 
     */
    protected $casts = [
        'id' => 'int',
        'course' => 'int',
        'month' => 'int',
        'img' => 'string',
        'items' => 'json-array'
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
    public function setItems($value)
    {
        $this->attributes['items'] = LectureItemCollection::create($this->convertValueToArray($value))->toJson();
        
        return $this;
    }
    
    /**
     * @return LectureItemCollection
     */
    public function getItemsRaw()
    {
        return LectureItemCollection::create(json_decode($this->attributes['items'], true));
    }
    
    /**
     * @return void
     */
    private function setDefault()
    {
        $this->attributes['items'] = LectureItemCollection::create()->toJson();
    }
    
    /**
     * @param mixed $value
     * @return array
     */
    private function convertValueToArray($value)
    {
        if (empty($value)) {
            $value = [];
        } elseif (is_string($value)) {
            $value = json_decode($value, true);
        } elseif (is_object($value)) {
            $value = json_decode(json_encode($value), true);
        }
        
        return $value;
    }
}
