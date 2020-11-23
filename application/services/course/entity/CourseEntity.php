<?php

namespace App\services\course\entity;

use App\libraries\Entity;

/**
 * @property int $id
 * @property string $title
 * @property string $type
 * @property string $code
 * @property string $startDate
 * @property bool $startDateDisable
 * @property int $instructor
 * @property ?string $note
 * @property ?string $video
 * @property string $description
 * @property string $purpose
 * @property array $packages
 * @property array $forWhom
 * @property array $program
 * @property array $bonuses
 */
class CourseEntity extends Entity
{
    /**
     * @var array 
     */
    protected $attributes = [
        'id' => 0,
        'title' => null,
        'code' => null,
        'type' => 'COURSE',
        'startDate' => null,
        'startDateDisable' => false,
        'instructor' => 0,
        'note' => null,
        'video' => null,
        'description' => null,
        'purpose' => null,
        'packages' => null,
        'imgBig' => null,
        'imgSmall' => null,
        'forWhom' => null,
        'program' => null,
        'bonuses' => null
    ];
    
    /**
     * @var array 
     */
    protected $casts = [
        'id' => 'int',
        'title' => 'string',
        'type' => 'string',
        'code' => 'string',
        'startDate' => 'string',
        'startDateDisable' => 'bool',
        'instructor' => 'int',
        'note' => '?string',
        'video' => '?string',
        'description' => 'string',
        'purpose' => 'string',
        'packages' => 'json-array',
        'imgBig' => 'string',
        'imgSmall' => 'string',
        'forWhom' => 'json-array',
        'program' => 'json-array',
        'bonuses' => 'json-array'
    ];
    
    
    /**
     * @var array 
     */
    protected $datamap = [
        'start_date' => 'startDate',
        'start_date_disable' => 'startDateDisable',
        'img_big' => 'imgBig',
        'img_small' => 'imgSmall',
        'for_whom' => 'forWhom'
    ];
    
    /**
     * @var array 
     */
    private $packagesMap = [
        'standart' => ['name' => 'Стандарт', 'code' => 'standart'],
        'advanced' => ['name' => 'Расширенный', 'code' => 'advanced'],
        'vip' => ['name' => 'Премиум', 'code' => 'vip']
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
    public function setPackages($value)
    {
        $this->attributes['packages'] = $this->convertValueToJsonArray($value);
        
        return $this;
    }
    
    /**
     * @param mixed $value
     * @return $this
     */
    public function setForWhom($value)
    {
        $this->attributes['forWhom'] = ForWhomCollection::create($this->convertValueToArray($value))->toJson();
        
        return $this;
    }
    
    /**
     * @return ForWhomCollection
     */
    public function getForWhomRaw()
    {
        return ForWhomCollection::create(json_decode($this->attributes['forWhom'], true));
    }
    
    /**
     * @param mixed $value
     * @return $this
     */
    public function setProgram($value)
    {
        $this->attributes['program'] = Program::create($this->convertValueToArray($value))->toJson();
        
        return $this;
    }
    
    /**
     * @param mixed $value
     * @return $this
     */
    public function setBonuses($value)
    {
        if (is_array($value)) {
            $value = clear_array($value);
        }
        
        $this->attributes['bonuses'] = $this->convertValueToJsonArray($value);
        
        return $this;
    }
    
    /**
     * @return Program
     */
    public function getProgramRaw()
    {
        return Program::create(json_decode($this->attributes['program'], true));
    }
    
    /**
     * @return array
     */
    public function getPackagesMap()
    {
        return $this->packagesMap;
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

    /**
     * @return void
     */
    private function setDefault()
    {
        $this->attributes['packages'] = '{"standart":{"available":"1","price":"0","partial_price":"0"},"advanced":{"available":"1","price":"0","partial_price":"0"},"vip":{"available":"1","price":"0","partial_price":"0"}}';
         
        $this->attributes['forWhom'] = ForWhomCollection::create()->toJson();
    }
}
