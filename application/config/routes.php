<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// (:any), (:num)

$route['default_controller'] = 'app/MainController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['courses'] = 'app/CourseController/index';
$route['courses/(:any)'] = 'app/CourseController/item/$1';
$route['workshop'] = 'app/WorkshopController/index';
$route['workshop/(:any)'] = 'app/WorkshopController/item/$1';
$route['terms'] = 'app/MainController/terms';
$route['policy'] = 'app/MainController/privacyPolicy';

$route['admin'] = 'admin/MainController/index';
$route['admin/login'] = 'admin/LoginController/index';
$route['admin/logout'] = 'admin/LoginController/logout';
$route['admin/instructor'] = 'admin/InstructorController/index';
$route['admin/instructor/add'] = 'admin/InstructorController/add';
$route['admin/instructor/edit/(:num)'] = 'admin/InstructorController/edit/$1';

$route['admin/course'] = 'admin/CourseController/index';
$route['admin/course/add'] = 'admin/CourseController/add';
$route['admin/course/edit/(:num)'] = 'admin/CourseController/edit/$1';
$route['admin/course/publish/(:num)/(:num)'] = 'admin/CourseController/publish/$1/$2';

$route['admin/skill'] = 'admin/SkillController/index';
$route['admin/skill/add'] = 'admin/SkillController/add';
$route['admin/skill/edit/(:num)'] = 'admin/SkillController/edit/$1';

$route['admin/apps'] = 'admin/AppsController/index';
$route['admin/apps/add'] = 'admin/AppsController/add';
$route['admin/apps/edit/(:num)'] = 'admin/AppsController/edit/$1';

$route['admin/bonus'] = 'admin/BonusController/index';
$route['admin/bonus/add'] = 'admin/BonusController/add';
$route['admin/bonus/edit/(:num)'] = 'admin/BonusController/edit/$1';

$route['admin/lecture/(:num)'] = 'admin/LectureController/index/$1';
$route['admin/lecture/(:num)/add'] = 'admin/LectureController/add/$1';
$route['admin/lecture/(:num)/edit/(:num)'] = 'admin/LectureController/edit/$1/$2';

$route['admin/faq'] = 'admin/FaqController/index';
$route['admin/faq/add'] = 'admin/FaqController/add';
$route['admin/faq/edit/(:num)'] = 'admin/FaqController/edit/$1';

$route['admin/block'] = 'admin/BlockController/index';
$route['admin/block/add'] = 'admin/BlockController/add';
$route['admin/block/edit/(:num)'] = 'admin/BlockController/edit/$1';