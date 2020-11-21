<?php

namespace App\services\apps\entity;

use App\libraries\Entity;

/**
 * @property int $id
 * @property string $title
 * @property string $img
 */
class AppsEntity extends Entity
{
    /**
     * @var array 
     */
    protected $attributes = [
        'id' => 0,
        'title' => null,
        'img' => null,
    ];
    
    /**
     * @var array 
     */
    protected $casts = [
        'id' => 'int',
        'title' => 'string',
        'img' => 'string'
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
