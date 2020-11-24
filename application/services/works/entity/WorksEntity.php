<?php

namespace App\services\works\entity;

use App\libraries\Entity;

/**
 * @property int $id
 * @property string $title
 * @property string $type
 * @property string $source
 * @property int $course
 */
class WorksEntity extends Entity
{
    /**
     * @var array 
     */
    protected $attributes = [
        'id' => 0,
        'title' => null,
        'type' => 'IMG',
        'source' => null,
        'course' => 0
    ];
    
    /**
     * @var array 
     */
    protected $casts = [
        'id' => 'int',
        'title' => 'string',
        'type' => 'string',
        'source' => 'string',
        'course' => 'int'
    ];
    
    /**
     * @param array $data
     * @return self
     */
    public static function create(array $data = [])
    {
        return new self($data);
    }
}
