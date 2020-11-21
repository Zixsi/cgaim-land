<?php

namespace App\services\faq\validators;

class FaqValidator extends \App\libraries\Validator
{
    /**
     * @var array 
     */
    private $labels = [
        'title' => 'Вопрос',
        'description' => 'Ответ'
    ];
    
     /**
     * @var array 
     */
    private $rules = [
        'title' => ['required', ['lengthMax', 255]],
        'description' => ['required', ['lengthMin', 10]]
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
