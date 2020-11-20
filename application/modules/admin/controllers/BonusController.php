<?php

use App\services\bonus\entity\BonusEntity;
use App\services\bonus\Bonus;

class BonusController extends APP_Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $data = [
            'items' => Bonus::get()->getModel()->getList()
        ];
                
        $this->load->lview('bonus/index', $data);
    }
    
    /**
     * @return void
     */
    public function add()
    {
        $item = BonusEntity::create();
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Bonus::get()->save($item)) {
                redirect('/admin/bonus/');
            } else {
                $data['error'] = Bonus::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('bonus/item', $data);
    }
    
    /**
     * @param int $id
     */
    public function edit($id)
    {
        $item = Bonus::get()->getRepository()->getItem($id);
        
        if (empty($item)) {
            redirect('/admin/bonus/');
        }
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Bonus::get()->save($item)) {
                redirect(sprintf('/admin/bonus/edit/%s', $item->id));
            } else {
                $data['error'] = Bonus::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('bonus/item', $data);
    }
   
}
