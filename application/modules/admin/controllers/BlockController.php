<?php

use App\services\block\entity\BlockEntity;
use App\services\block\Block;

class BlockController extends APP_Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $data = [
            'items' => Block::get()->getModel()->getList()
        ];
                
        $this->load->lview('block/index', $data);
    }
    
    /**
     * @return void
     */
    public function add()
    {
        $item = BlockEntity::create();
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Block::get()->save($item)) {
                redirect('/admin/block/');
            } else {
                $data['error'] = Block::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('block/item', $data);
    }
    
    /**
     * @param int $id
     */
    public function edit($id)
    {
        $item = Block::get()->getRepository()->getItem($id);
        
        if (empty($item)) {
            redirect('/admin/block/');
        }
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Block::get()->save($item)) {
                redirect(sprintf('/admin/block/edit/%s', $item->id));
            } else {
                $data['error'] = Block::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('block/item', $data);
    }
   
}
