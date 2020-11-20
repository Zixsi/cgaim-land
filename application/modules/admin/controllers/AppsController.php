<?php

use App\services\apps\entity\AppsEntity;
use App\services\apps\Apps;

class AppsController extends APP_Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $data = [
            'items' => Apps::get()->getModel()->getList()
        ];
                
        $this->load->lview('apps/index', $data);
    }
    
    /**
     * @return void
     */
    public function add()
    {
        $item = AppsEntity::create();
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Apps::get()->save($item)) {
                redirect('/admin/apps/');
            } else {
                $data['error'] = Apps::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('apps/item', $data);
    }
    
    /**
     * @param int $id
     */
    public function edit($id)
    {
        $item = Apps::get()->getRepository()->getItem($id);
        
        if (empty($item)) {
            redirect('/admin/apps/');
        }
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Apps::get()->save($item)) {
                redirect(sprintf('/admin/apps/edit/%s', $item->id));
            } else {
                $data['error'] = Apps::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('apps/item', $data);
    }
   
}
