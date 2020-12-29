<?php

namespace App\services\subscription\validators;

class SubscriptionValidator extends \App\libraries\Validator
{
    /**
     * @var array 
     */
    private $labels = [
        'name' => 'Имя',
        'phone' => 'Телефон'
    ];
    
     /**
     * @var array 
     */
    private $rules = [
        'name' => ['required', ['lengthMax', 100]],
        'phone' => ['required', ['lengthMax', 20]]
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
