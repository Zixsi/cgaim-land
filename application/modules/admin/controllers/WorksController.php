<?php

use App\services\works\entity\WorksEntity;
use App\services\works\Works;

class WorksController extends APP_Controller
{
    /**
     * @param int $course
     * @return void
     */
    public function index($course = 0)
    {
        $data = [
            'items' => Works::get()->getModel()->getListByCourse($course),
            'course' => (int) $course
        ];
                
        $this->load->lview('works/index', $data);
    }
    
    /**
     * @param int $course
     * @return void
     */
    public function add($course = 0)
    {
        $item = WorksEntity::create();
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            $item->course = $course;
            
            if (Works::get()->save($item)) {
                redirect(sprintf('/admin/works/%s', ($course > 0)?$course:''));
            } else {
                $data['error'] = Works::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('works/item', $data);
    }
    
    /**
     * @param int $id
     */
    public function edit($id)
    {
        $item = Works::get()->getRepository()->getItem($id);
        
        if (empty($item)) {
            redirect('/admin/works/');
        }
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Works::get()->save($item)) {
                redirect(sprintf('/admin/works/edit/%s', $item->id));
            } else {
                $data['error'] = Works::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('works/item', $data);
    }
   
}
