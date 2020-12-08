<?php

use App\services\instructor\entity\InstructorEntity;
use App\services\instructor\Instructor;

class InstructorController extends APP_Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $data = [
            'items' => Instructor::get()->getModel()->getListForSelect()
        ];
                
        $this->load->lview('instructor/index', $data);
    }
    
    /**
     * @return void
     */
    public function add()
    {
        $data = [
            'error' => null
        ];
        
        $item = InstructorEntity::create();
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Instructor::get()->save($item)) {
                redirect('/admin/instructor/');
            } else {
                $data['error'] = Instructor::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('instructor/item', $data);
    }
    
    /**
     * @param int $id
     */
    public function edit($id)
    {
        $item = Instructor::get()->getRepository()->getItem($id);
        
        if (empty($item)) {
            redirect('/admin/instructor/');
        }
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Instructor::get()->save($item)) {
                redirect(sprintf('/admin/instructor/edit/%s', $item->id));
            } else {
                $data['error'] = Instructor::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('instructor/item', $data);
    }
}
