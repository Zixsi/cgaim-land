<?php

namespace App\services\course\entity;

class ForWhom implements \JsonSerializable
{
    /**
     * @var string 
     */
    private $img;
    
    /**
     * @var string 
     */
    private $title;
    
    /**
     * @var string 
     */
    private $description;
    
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
     * @param string $value
     * @return $this
     */
    public function setImg($value)
    {
        $this->img = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setTitle($value)
    {
        $this->title = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setDescription($value)
    {
        $this->description = $value;
        
        return $this;
    }
    
    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'img' => $this->img,
            'title' => $this->title,
            'description' => $this->description 
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
