<?php

use App\services\course\Course;
use App\services\instructor\Instructor;
use App\services\review\Review;
use App\services\works\Works;
use App\services\workshop\Workshop;

class MainController extends APP_Controller
{
    public function index()
    {
        $data = [
            'courses' => Course::get()->getListPublished(3),
            'workshop' => Workshop::get()->getListPublished(3),
            'instructors' => Instructor::get()->getModel()->getListMap(),
            'reviews' => Review::get()->getModel()->getListByCourse(0),
            'works' => Works::get()->getModel()->getListByCourse(0),
        ];
        
        $this->load->lview('main/index', $data);
    }

    public function terms()
    {
        $this->load->lview('main/terms', []);
    }

    public function privacyPolicy()
    {
        $this->load->lview('main/privacy_policy', []);
    }

}
