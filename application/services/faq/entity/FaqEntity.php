<?php

namespace App\services\faq\entity;

use App\libraries\Entity;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $active
 */
class FaqEntity extends Entity
{
    /**
     * @var array 
     */
    protected $attributes = [
        'id' => 0,
        'title' => null,
        'description' => null,
        'active' => 0
    ];
    
    /**
     * @var array 
     */
    protected $casts = [
        'id' => 'int',
        'title' => 'string',
        'description' => 'string',
        'active' => 'int'
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
    public static function create(array $data = [])
    {
        return new self($data);
    }
}
