<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class WorkshopController extends APP_Controller
{

    public function index()
    {
        $data = [];

        $this->load->lview('workshop/index', $data);
    }

    public function item($code)
    {
        $data = [];
//		if(empty($data['item'] = $this->workshop->getItemByCode($code)))
//			header('Location: ../');

        $this->load->lview('workshop/item', $data);
    }

}
