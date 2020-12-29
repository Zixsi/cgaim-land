<?php

namespace App\services\subscription\entity;

use App\libraries\Entity;

/**
 * @property int $id
 * @property string $title
 * @property string $name
 * @property string $phone
 * @property array $comment
 * @property \DateTime $date
 */
class SubscriptionEntity extends Entity
{
    /**
     * @var array 
     */
    protected $attributes = [
        'id' => 0,
        'title' => null,
        'name' => null,
        'phone' => null,
        'comment' => null
    ];
    
    /**
     * @var array 
     */
    protected $casts = [
        'id' => 'int',
        'title' => '?string',
        'name' => 'string',
        'phone' => 'string',
        'comment' => '?string',
        'date' => 'datetime'
    ];
    
    
    /**
     * @var array 
     */
    protected $datamap = [
        'date'
    ];
    
    /**
     * @param array $data
     * @return self
     */
    public function __construct(array $data = [])
    {
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
}
