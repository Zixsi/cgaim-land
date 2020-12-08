<?php

namespace App\services\block\validators;

class BlockValidator extends \App\libraries\Validator
{
    /**
     * @var array 
     */
    private $labels = [
        'title' => 'Название',
        'img' => 'Изображение',
        'data.text' => 'Текст',
        'data.list' => 'Список',
        'data.list.*' => 'Строка',
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
        $data['type'] = ($data['type'] ?? 'TEXT');
        
        if ($data['type'] === 'LIST') {
            $this->rules['data.list'] = ['required'];   
            $this->rules['data.list.*'] = ['required', ['lengthMin', 3]];   
        } else {
            $this->rules['data.text'] = ['required', ['lengthMin', 10]];
        }
        
        $this->labels($this->labels);
        $this->setData($data);
        $this->mapFieldsRules($this->rules);
        
        return $this->validate();
    }
}
