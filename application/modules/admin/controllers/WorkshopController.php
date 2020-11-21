<?php

use App\services\apps\Apps;
use App\services\block\Block;
use App\services\bonus\Bonus;
use App\services\workshop\Workshop;
use App\services\workshop\entity\WorkshopEntity;
use App\services\instructor\Instructor;
use App\services\skill\Skill;

class WorkshopController extends APP_Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $data = [
            'items' => Workshop::get()->getModel()->getList()
        ];
                
        $this->load->lview('workshop/index', $data);
    }
    
    /**
     * @return void
     */
    public function add()
    {
        $item = WorkshopEntity::create();
        
        $data = [
            'error' => null,
            'instructors' => Instructor::get()->getModel()->getListForSelect(),
            'apps' => Apps::get()->getModel()->getListMap()
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            $item->type = 'WORKSHOP';
            
            if (Workshop::get()->save($item)) {
                redirect('/admin/workshop/');
            } else {
                $data['error'] = Workshop::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('workshop/item', $data);
    }
    
    /**
     * @param int $id
     */
    public function edit($id)
    {
        $item = Workshop::get()->getRepository()->getItem($id);
        
        if (empty($item)) {
            redirect('/admin/workshop/');
        }
        
        $data = [
            'error' => null,
            'instructors' => Instructor::get()->getModel()->getListForSelect(),
            'apps' => Apps::get()->getModel()->getListMap()
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            $item->type = 'WORKSHOP';
            
            if (Workshop::get()->save($item)) {
                redirect(sprintf('/admin/workshop/edit/%s', $item->id));
            } else {
                $data['error'] = Workshop::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
        
        $this->load->lview('workshop/item', $data);
    }
    
    /**
     * @param int $id
     * @param int $status
     */
    public function publish($id, $status)
    {
        Workshop::get()->getModel()->update($id, ['published' => (((int) $status === 1)?1:0)]);
        redirect('/admin/workshop/');
    }
}
