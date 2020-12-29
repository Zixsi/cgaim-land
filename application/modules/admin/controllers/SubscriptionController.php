<?php

use App\services\subscription\Subscription;

class SubscriptionController extends APP_Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $data = [
            'items' => Subscription::get()->getModel()->getList()
        ];
                
        $this->load->lview('subscription/index', $data);
    }
    
    /**
     * @param int $id
     */
    public function edit($id)
    {
        $item = Subscription::get()->getRepository()->getItem($id);
        
        if (empty($item)) {
            redirect('/admin/subscription/');
        }
        
        $data = [
            'error' => null
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Subscription::get()->save($item)) {
                redirect('/admin/subscription/');
            } else {
                $data['error'] = Subscription::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('subscription/item', $data);
    }
   
}
