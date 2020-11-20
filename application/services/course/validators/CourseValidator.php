<?php

namespace App\services\course\validators;

class CourseValidator extends \App\libraries\Validator
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
        'packages' => 'Пакеты',
        'packages.*.price' => 'Полная стоимость',
        'packages.*.partial_price' => 'Рассрочка',
        'img_big' => 'Изображение большое',
        'img_small' => 'Изображение малое',
        'for_whom.*.img' => 'Изображение "Кому подойдет курс"',
        'for_whom.*.title' => 'Заголовок "Кому подойдет курс"',
        'for_whom.*.description' => 'Описание "Кому подойдет курс"',
        'program.module_1_img' => 'Модуль 1: Изображение',
        'program.module_1_title' => 'Модуль 1: Заголовок',
        'program.module_1_description' => 'Модуль 1: Описание',
        'program.module_1_skills' => 'Модуль 1: Навыки',
        'program.module_1_skills_description' => 'Модуль 1: Навыки - описание',
        'program.module_2_img' => 'Модуль 2: Изображение',
        'program.module_2_title' => 'Модуль 2: Заголовок',
        'program.module_2_description' => 'Модуль 2: Описание',
        'program.module_2_skills' => 'Модуль 2: Навыки',
        'program.module_2_skills_description' => 'Модуль 2: Навыки - описание',
        'program.module_3_img' => 'Модуль 3: Изображение',
        'program.module_3_title' => 'Модуль 3: Заголовок',
        'program.module_3_description' => 'Модуль 3: Описание',
        'program.module_3_skills' => 'Модуль 3: Навыки',
        'program.module_3_skills_description' => 'Модуль 3: Навыки - описание',
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
        'packages.*.partial_price' => ['required', 'numeric', ['min', 0]],
        'img_big' => ['required'],
        'img_small' => ['required'],
        'for_whom.*.img' => ['required'],
        'for_whom.*.title' => ['required', ['lengthMin', 3]],
        'for_whom.*.description' => ['required', ['lengthMin', 10]],
        'program.module_1_img' => ['required'],
        'program.module_1_title' => ['required'],
        'program.module_1_description' => ['required'],
        'program.module_1_skills' => ['required'],
        'program.module_1_skills_description' => ['required'],
        'program.module_2_img' => ['required'],
        'program.module_2_title' => ['required'],
        'program.module_2_description' => ['required'],
        'program.module_2_skills' => ['required'],
        'program.module_2_skills_description' => ['required'],
        'program.module_3_img' => ['required'],
        'program.module_3_title' => ['required'],
        'program.module_3_description' => ['required'],
        'program.module_3_skills' => ['required'],
        'program.module_3_skills_description' => ['required']
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
