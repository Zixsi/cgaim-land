<?php

namespace App\services\lecture\entity;

class LectureItemCollection implements \JsonSerializable
{
    /**
     * @var LectureItem[]
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
        for ($i = 0; $i < 2; $i++) {
            $this->list[$i] = LectureItem::create();
        }
    }
    
    /**
     * @param array $data
     * @return $this
     */
    public function fill($data = [])
    {
        $items = array_values($data);
        
        foreach ($items as $key => $value) {
            $item = $this->get($key);
            
            if (empty($item)) {
                $item = LectureItem::create();
                $this->list[] = $item;
            }
                
            $item->fill($value);
        }    
        
        return $this;
    }
    
    /**
     * @param int $index
     * @return ?LectureItem
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
