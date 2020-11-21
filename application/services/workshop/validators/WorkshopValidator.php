<?php

namespace App\services\workshop\validators;

class WorkshopValidator extends \App\libraries\Validator
{
    /**
     * @var array 
     */
    private $labels = [
        'title' => 'Название',
        'code' => 'Код',
        'start_date' => 'Дата начала',
        'instructor' => 'Преподаватель',
        'note' => 'Заметка',
        'video' => 'Промо видео (ссылка)',
        'description' => 'Описание',
        'purpose' => 'Цель курса',
        'packages' => 'Стоимость',
        'packages.*.price' => 'Стоимость',
        'img_big' => 'Изображение большое',
        'img_small' => 'Изображение малое'
    ];
    
     /**
     * @var array 
     */
    private $rules = [
        'title' => ['required', ['lengthMax', 255]],
        'code' => ['required', ['lengthMax', 100], 'slug'],
        'start_date' => ['required', ['dateFormat', 'Y-m-d']],
        'instructor' => ['required', 'integer', ['min', 1]],
        'note' => ['optional', ['lengthMax', 40]],
        'video' => ['optional', ['lengthMax', 255], 'url'],
        'description' => ['required', ['lengthMin', 10]],
        'purpose' => ['required', ['lengthMin', 10]],
        'packages.*' => ['required', 'array'],
        'packages.*.price' => ['required', 'numeric', ['min', 0]],
        'img_big' => ['required'],
        'img_small' => ['required']
    ];

    /**
     * @param array $data
     * @return bool
     */
    public function run($data)
    {
        if (isset($data['note']) && empty($data['note'])) {
            unset($data['note']);
        }
        
        if (isset($data['video']) && empty($data['video'])) {
            unset($data['video']);
        }
        
        $this->labels($this->labels);
        $this->setData($data);
        $this->mapFieldsRules($this->rules);
        
        return $this->validate();
    }
}
