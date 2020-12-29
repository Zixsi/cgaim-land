<?php

use App\services\subscription\entity\SubscriptionEntity;
use App\services\subscription\Subscription;

class AjaxController extends APP_Controller
{
    public function index() {}
    
    /**
     * @return void
     */
    public function subscription()
    {
        $item = SubscriptionEntity::create();
        $item->fill($this->input->post());
        if (Subscription::get()->save($item)) {
            sendAjaxSuccess();
        }
        
        sendAjaxError(
            Subscription::get()->getLastError()
        );
    }
}
