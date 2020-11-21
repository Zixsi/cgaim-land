<?php

use App\services\lecture\entity\LectureEntity;
use App\services\lecture\Lecture;

class LectureController extends APP_Controller
{
    /**
     * @param int $course
     */
    public function index($course)
    {
        $data = [
            'course' => $course,
            'items' => Lecture::get()->getModel()->getListForCourse($course)
        ];
                
        $this->load->lview('lecture/index', $data);
    }
    
    /**
     * @param int $course
     */
    public function add($course)
    {
        $item = LectureEntity::create();
        $item->course = $course;
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Lecture::get()->save($item)) {
                redirect(sprintf('/admin/lecture/%s', $course));
            } else {
                $data['error'] = Lecture::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('lecture/item', $data);
    }
    
    /**
     * @param int $course
     * @param int $id
     */
    public function edit($course, $id)
    {
        $item = Lecture::get()->getRepository()->getItem($id);
        
        if (empty($item)) {
            redirect(sprintf('/admin/lecture/%s', $course));
        }
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Lecture::get()->save($item)) {
                redirect(sprintf('/admin/lecture/%s/edit/%s', $course, $item->id));
            } else {
                $data['error'] = Lecture::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('lecture/item', $data);
    }
   
}
