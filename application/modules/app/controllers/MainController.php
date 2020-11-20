<?php

use App\services\course\Course;
use App\services\instructor\Instructor;

class MainController extends APP_Controller
{
    public function index()
    {
        $data = [
            'courses' => Course::get()->getListPublished(3),
            'instructors' => Instructor::get()->getModel()->getListMap()
        ];
        
        $this->load->lview('main/index', $data);
    }

    public function terms()
    {
        $data = [];
        
        $this->load->layout = 'compact';
        $this->load->lview('main/terms', $data);
    }

    public function privacyPolicy()
    {
        $data = [];
        
        $this->load->layout = 'compact';
        $this->load->lview('main/privacy_policy', $data);
    }

}
