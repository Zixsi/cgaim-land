<?php

use App\services\skill\entity\SkillEntity;
use App\services\skill\Skill;

class SkillController extends APP_Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $data = [
            'items' => Skill::get()->getModel()->getList()
        ];
                
        $this->load->lview('skill/index', $data);
    }
    
    /**
     * @return void
     */
    public function add()
    {
        $item = SkillEntity::create();
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Skill::get()->save($item)) {
                redirect('/admin/skill/');
            } else {
                $data['error'] = Skill::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('skill/item', $data);
    }
    
    /**
     * @param int $id
     */
    public function edit($id)
    {
        $item = Skill::get()->getRepository()->getItem($id);
        
        if (empty($item)) {
            redirect('/admin/skill/');
        }
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Skill::get()->save($item)) {
                redirect(sprintf('/admin/skill/edit/%s', $item->id));
            } else {
                $data['error'] = Skill::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('skill/item', $data);
    }
   
}
