<?php

namespace App\services\apps\validators;

class AppsValidator extends \App\libraries\Validator
{
    /**
     * @var array 
     */
    private $labels = [
        'title' => 'Название',
        'img' => 'Иконка'
    ];
    
     /**
     * @var array 
     */
    private $rules = [
        'title' => ['required', ['lengthMax', 255]],
        'img' => ['required']
    ];

    /**
     * @param array $data
     * @return bool
     */
    public function run($data)
    {        
        $this->labels($this->labels);
        $this->setData($data);
        $this->mapFieldsRules($this->rules);
        
        return $this->validate();
    }
}
