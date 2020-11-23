<?php

namespace App\services\course\entity;

class Program implements \JsonSerializable
{
    /**
     * @var string 
     */
    private $module1Img;
    
    /**
     * @var string 
     */
    private $module1Title;
    
    /**
     * @var string 
     */
    private $module1Info;
    
    /**
     * @var string 
     */
    private $module1ShortDescription;
    
    /**
     * @var string 
     */
    private $module1Description;
    
    /**
     * @var array 
     */
    private $module1Skills = [];
    
    /**
     * @var string 
     */
    private $module1SkillsDescription;
    
    /**
     * @var string 
     */
    private $module2Img;
    
    /**
     * @var string 
     */
    private $module2Title;
    
    /**
     * @var string 
     */
    private $module2Description;
    
    /**
     * @var array 
     */
    private $module2Skills = [];
    
    /**
     * @var string 
     */
    private $module2SkillsDescription;
    
        /**
     * @var string 
     */
    private $module3Img;
    
    /**
     * @var string 
     */
    private $module3Title;
    
    /**
     * @var string 
     */
    private $module3Description;
    
    /**
     * @var array 
     */
    private $module3Skills = [];
    
    /**
     * @var string 
     */
    private $module3SkillsDescription;
    
    /**
     * @var array 
     */
    private $module4Apps = [];
    
    /**
     * @var int
     */
    private $module4Months = 0;
    
    /**
     * @var string
     */
    private $module4Type = 'MONTH';
    
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
    public function setModule1Img($value)
    {
        $this->module1Img = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule1Title($value)
    {
        $this->module1Title = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule1Info($value)
    {
        $this->module1Info = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule1ShortDescription($value)
    {
        $this->module1ShortDescription = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule1Description($value)
    {
        $this->module1Description = $value;
        
        return $this;
    }
    
    /**
     * @param array $value
     * @return $this
     */
    public function setModule1Skills($value)
    {
        $this->module1Skills = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule1SkillsDescription($value)
    {
        $this->module1SkillsDescription = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule2Img($value)
    {
        $this->module2Img = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule2Title($value)
    {
        $this->module2Title = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule2Description($value)
    {
        $this->module2Description = $value;
        
        return $this;
    }
    
    /**
     * @param array $value
     * @return $this
     */
    public function setModule2Skills($value)
    {
        $this->module2Skills = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule2SkillsDescription($value)
    {
        $this->module2SkillsDescription = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule3Img($value)
    {
        $this->module3Img = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule3Title($value)
    {
        $this->module3Title = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule3Description($value)
    {
        $this->module3Description = $value;
        
        return $this;
    }
    
    /**
     * @param array $value
     * @return $this
     */
    public function setModule3Skills($value)
    {
        $this->module3Skills = $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule3SkillsDescription($value)
    {
        $this->module3SkillsDescription = $value;
        
        return $this;
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
     * @param int $value
     * @return $this
     */
    public function setModule4Months($value)
    {
        $this->module4Months = (int) $value;
        
        return $this;
    }
    
    /**
     * @param string $value
     * @return $this
     */
    public function setModule4Type($value)
    {
        $this->module4Type = $value;
        
        return $this;
    }
    
    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'module_1_img' => $this->module1Img,
            'module_1_title' => $this->module1Title,
            'module_1_info' => $this->module1Info,
            'module_1_short_description' => $this->module1ShortDescription,
            'module_1_description' => $this->module1Description,
            'module_1_skills' => $this->module1Skills,
            'module_1_skills_description' => $this->module1SkillsDescription,
            'module_2_img' => $this->module2Img,
            'module_2_title' => $this->module2Title,
            'module_2_description' => $this->module2Description,
            'module_2_skills' => $this->module2Skills,
            'module_2_skills_description' => $this->module2SkillsDescription,
            'module_3_img' => $this->module3Img,
            'module_3_title' => $this->module3Title,
            'module_3_description' => $this->module3Description,
            'module_3_skills' => $this->module3Skills,
            'module_3_skills_description' => $this->module3SkillsDescription,
            'module_4_apps' => $this->module4Apps,
            'module_4_months' => $this->module4Months,
            'module_4_type' => $this->module4Type,
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
