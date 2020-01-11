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

// $route['(.*)'] = 'app/$1';