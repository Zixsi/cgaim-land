<?php

namespace App\services\bonus\entity;

use App\libraries\Entity;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $img
 * @property float $price
 */
class BonusEntity extends Entity
{
    /**
     * @var array 
     */
    protected $attributes = [
        'id' => 0,
        'title' => null,
        'description' => null,
        'img' => null,
        'price' => null
    ];
    
    /**
     * @var array 
     */
    protected $casts = [
        'id' => 'int',
        'title' => 'string',
        'description' => 'string',
        'img' => 'string',
        'price' => 'float',
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
