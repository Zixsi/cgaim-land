<?php

namespace App\services\bonus\validators;

class BonusValidator extends \App\libraries\Validator
{
    /**
     * @var array 
     */
    private $labels = [
        'title' => 'Название',
        'description' => 'Описание',
        'img' => 'Иконка',
        'price' => 'Стоимость'
    ];
    
     /**
     * @var array 
     */
    private $rules = [
        'title' => ['required', ['lengthMax', 255]],
        'description' => ['required', ['lengthMin', 10]],
        'img' => ['required'],
        'price' => ['required', 'numeric', ['min', 1]]
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
