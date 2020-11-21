<?php

namespace App\services\instructor\entity;

use App\libraries\Entity;

/**
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $photoBig
 * @property string $photoSmall
 * @property string $videoLink
 * @property string $quote
 * @property string $blocks
 */
class InstructorEntity extends Entity
{
    /**
     * @var array 
     */
    protected $attributes = [
        'id' => 0,
        'firstName' => null,
        'lastName' => null,
        'photoBig' => null,
        'photoSmall' => null,
        'videoLink' => null,
        'quote' => null,
        'blocks' => [],
    ];
    
    /**
     * @var array 
     */
    protected $casts = [
        'id' => 'int',
        'firstName' => 'string',
        'lastName' => 'string',
        'photoBig' => 'string',
        'photoSmall' => 'string',
        'videoLink' => 'string',
        'quote' => 'string',
        'blocks' => 'json-array'
    ];
    
    
    /**
     * @var array 
     */
    protected $datamap = [
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'photo_big' => 'photoBig',
        'photo_small' => 'photoSmall',
        'video_link' => 'videoLink'
    ];
    
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
    public function setBlocks($value)
    {
        if (is_array($value) || is_object($value)) {
            $value = json_encode($value);
        }
        
        $this->attributes['blocks'] = $value;
        
        return $this; 
    }
}
