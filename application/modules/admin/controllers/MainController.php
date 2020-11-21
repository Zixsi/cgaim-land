<?php

class MainController extends APP_Controller
{

    public function index()
    {
        $data = [];

        $this->load->lview('main/index', $data);
    }

}
