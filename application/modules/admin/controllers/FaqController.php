<?php

use App\services\faq\entity\FaqEntity;
use App\services\faq\Faq;

class FaqController extends APP_Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $data = [
            'items' => Faq::get()->getModel()->getList()
        ];
                
        $this->load->lview('faq/index', $data);
    }
    
    /**
     * @return void
     */
    public function add()
    {
        $item = FaqEntity::create();
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Faq::get()->save($item)) {
                redirect('/admin/faq/');
            } else {
                $data['error'] = Faq::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('faq/item', $data);
    }
    
    /**
     * @param int $id
     */
    public function edit($id)
    {
        $item = Faq::get()->getRepository()->getItem($id);
        
        if (empty($item)) {
            redirect('/admin/faq/');
        }
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Faq::get()->save($item)) {
                redirect(sprintf('/admin/faq/edit/%s', $item->id));
            } else {
                $data['error'] = Faq::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('faq/item', $data);
    }
   
}
