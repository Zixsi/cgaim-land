<?php

namespace App\services\workshop\entity;

class Program implements \JsonSerializable
{
    /**
     * @var array 
     */
    private $module4Apps = [];
    
    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->fill($data);
    }
    
    /**
     * @param array $data
     * @return self
     */
    public static function create($data = [])
    {
        return new self($data);
    }
    
    /**
     * @param array $data
     * @return $this
     */
    public function fill($data = [])
    {
        foreach ($data as $key => $val) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));
            
            if (method_exists($this, $method)) {
                $this->$method($val);
            }
        }
    }
    
    /**
     * @param array $value
     * @return $this
     */
    public function setModule4Apps($value)
    {
        $this->module4Apps = clear_array($value);
        
        return $this;
    }
    
    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'module_4_apps' => $this->module4Apps
        ];
    }
    
    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this);
    }
    
    /**
     * @return array|mixed
     * @throws \Exception
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
