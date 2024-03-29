<?php

use App\services\apps\Apps;
use App\services\block\Block;
use App\services\bonus\Bonus;
use App\services\faq\Faq;
use App\services\instructor\Instructor;
use App\services\lecture\Lecture;
use App\services\review\Review;
use App\services\skill\Skill;
use App\services\workshop\Workshop;

class WorkshopController extends APP_Controller
{

    public function index()
    {
        $data = [
            'items' => Workshop::get()->getListPublished(1000),
            'instructors' => Instructor::get()->getModel()->getListMap()
        ];
        
        $this->load->lview('workshop/index', $data);
    }

    public function item($code)
    {
        $item = Workshop::get()->getByCode($code);
        
        if (empty($item) || ((int) $item['published'] === 0 && ((bool) $_GET['preview'] ?? false) === false)) {
            header('Location: /workshop/');
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
            'courses' => Workshop::get()->getOther(3, $item['id']),
            'instructors' => Instructor::get()->getModel()->getListMap(),
            'reviews' => Review::get()->getModel()->getListByCourse($item['id'])
        ];
        
//        debug($data['moduleInfoBlock']); die();
        $this->load->lview('workshop/item', $data);
    }

}
