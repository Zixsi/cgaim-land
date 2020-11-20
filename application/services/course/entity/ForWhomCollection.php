<?php

namespace App\services\course\entity;

class ForWhomCollection implements \JsonSerializable
{
    /**
     * @var ForWhom[]
     */
    private $list;
    
    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->init();
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
     * @return void
     */
    private function init()
    {
        for ($i = 0; $i < 4; $i++) {
            $this->list[$i] = ForWhom::create();
        }
    }
    
    /**
     * @param array $data
     * @return $this
     */
    public function fill($data = [])
    {
        $items = array_slice(array_values($data), 0, 4);
        
        foreach ($items as $key => $value) {
            $this->get($key)->fill($value);
        }    
        
        return $this;
    }
    
    /**
     * @param int $index
     * @return ?ForWhom
     */
    public function get($index)
    {
        if (array_key_exists($index, $this->list)) {
            return $this->list[$index];
        }
        
        return null;
    }
    
    /**
     * @return array
     */
    public function toArray()
    {
        return array_map(
            function ($item) {
                return $item->toArray();
            }, 
            $this->list
        );
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
