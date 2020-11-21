<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config = [];

$config['auth_login'] = [
    [
        'field' => 'email',
        'label' => 'E-mail',
        'rules' => 'required|valid_email'
    ],
    [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'trim|required'
    ]
];

$config['instructor'] = [
    [
        'field' => 'photo_big',
        'label' => 'Фото большое',
        'rules' => 'trim|required'
    ],
    [
        'field' => 'photo_small',
        'label' => 'Фото малое',
        'rules' => 'trim|required'
    ],
    [
        'field' => 'last_name',
        'label' => 'Фамилия',
        'rules' => 'trim|required'
    ],
    [
        'field' => 'first_name',
        'label' => 'Имя',
        'rules' => 'trim|required'
    ],
    [
        'field' => 'video_link',
        'label' => 'Ссылка на деморил',
        'rules' => 'trim|required'
    ],
    [
        'field' => 'quote',
        'label' => 'Цитата',
        'rules' => 'trim|required'
    ],
    [
        'field' => 'blocks[0]',
        'label' => 'Блок 1',
        'rules' => 'trim|required'
    ],
    [
        'field' => 'blocks[1]',
        'label' => 'Блок 2',
        'rules' => 'trim|required'
    ],
    [
        'field' => 'blocks[2]',
        'label' => 'Блок 3',
        'rules' => 'trim|required'
    ],
    [
        'field' => 'blocks[3]',
        'label' => 'Блок 4',
        'rules' => 'trim|required'
    ],
    [
        'field' => 'blocks[4]',
        'label' => 'Блок 5',
        'rules' => 'trim|required'
    ],
    [
        'field' => 'blocks[5]',
        'label' => 'Блок 6',
        'rules' => 'trim|required'
    ],
];

$config['course'] = [
    [
        'field' => 'last_name',
        'label' => 'Фамилия',
        'rules' => 'trim|required'
    ]
];