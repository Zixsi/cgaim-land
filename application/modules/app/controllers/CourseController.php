<?php

use App\services\apps\Apps;
use App\services\block\Block;
use App\services\bonus\Bonus;
use App\services\course\Course;
use App\services\faq\Faq;
use App\services\instructor\Instructor;
use App\services\lecture\Lecture;
use App\services\skill\Skill;

class CourseController extends APP_Controller
{

    public function index()
    {
        $data = [
            'items' => Course::get()->getListPublished(1000)
        ];
        
        $this->load->lview('courses/index', $data);
    }

    public function item($code)
    {
        $item = Course::get()->getByCode($code);
        
        if (empty($item)) {
            header('Location: /courses/');
        }
        
        $data = [
            'item' => $item,
            'instructor' => Instructor::get()->getItem($item['instructor']),
            'skills' => Skill::get()->getModel()->getListMap(),
            'apps' => Apps::get()->getModel()->getListMap(),
            'bonuses' => Bonus::get()->getModel()->getListMap(),
            'lectures' => Lecture::get()->getCourseLectures($item['id']),
            'faq' => Faq::get()->getModel()->getListPublished(10),
            'moduleInfoBlock' => Block::get()->getModel()->getById(($item['program']['module_1_info'] ?? 0)),
            'courses' => Course::get()->getOther(3, $item['id']),
            'instructors' => Instructor::get()->getModel()->getListMap()
        ];
        
//        debug($data['moduleInfoBlock']); die();
        $this->load->lview('courses/item', $data);
    }

}
