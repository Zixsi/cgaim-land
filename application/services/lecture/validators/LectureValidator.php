<?php

namespace App\services\lecture\validators;

class LectureValidator extends \App\libraries\Validator
{
    /**
     * @var array 
     */
    private $labels = [
        'month' => 'Месяц',
        'img' => 'Изображение',
        'items' => 'Лекции',
        'items.*.title' => 'Заголовок лекции',
        'items.*.description' => 'Описание лекции',
    ];
    
     /**
     * @var array 
     */
    private $rules = [
        'month' => ['required', ['min', 1]],
        'img' => ['required'],
        'items' => ['required'],
        'items.*.title' => ['required', ['lengthMax', 255]],
        'items.*.description' => ['required', ['lengthMax', 1000]]
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
