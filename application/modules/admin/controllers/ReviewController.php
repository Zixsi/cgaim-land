<?php

use App\services\review\entity\ReviewEntity;
use App\services\review\Review;

class ReviewController extends APP_Controller
{
    /**
     * @param int $course
     * @return void
     */
    public function index($course = 0)
    {
        $data = [
            'items' => Review::get()->getModel()->getListByCourse($course),
            'course' => (int) $course
        ];
                
        $this->load->lview('review/index', $data);
    }
    
    /**
     * @param int $course
     * @return void
     */
    public function add($course = 0)
    {
        $item = ReviewEntity::create();
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            $item->course = $course;
            
            if (Review::get()->save($item)) {
                redirect(sprintf('/admin/review/%s', ($course > 0)?$course:''));
            } else {
                $data['error'] = Review::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('review/item', $data);
    }
    
    /**
     * @param int $id
     */
    public function edit($id)
    {
        $item = Review::get()->getRepository()->getItem($id);
        
        if (empty($item)) {
            redirect('/admin/review/');
        }
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Review::get()->save($item)) {
                redirect(sprintf('/admin/review/edit/%s', $item->id));
            } else {
                $data['error'] = Review::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('review/item', $data);
    }
   
}
