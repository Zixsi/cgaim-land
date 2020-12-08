<?php

namespace App\services\works\validators;

class WorksValidator extends \App\libraries\Validator
{
    /**
     * @var array 
     */
    private $labels = [
        'title' => 'Название',
        'source' => 'Изображение'
    ];
    
     /**
     * @var array 
     */
    private $rules = [
        'title' => ['required', ['lengthMax', 255]],
        'source' => ['required']
    ];

    /**
     * @param array $data
     * @return bool
     */
    public function run($data)
    {                
        if (($data['type'] ?? 'IMG') === 'VIDEO') {
            $this->rules['source'] = ['required', ['lengthMin', 10]];   
            $this->labels['source'] = 'Видео';   
        }
        
        $this->labels($this->labels);
        $this->setData($data);
        $this->mapFieldsRules($this->rules);
        
        return $this->validate();
    }
}
