<?php

class DocController extends APP_Controller
{

	public function index()
	{
		$this->load->lview('doc/index');
	}

	public function tableAnaliz()
	{
		$this->load->lview('doc/tableAnaliz');
	}
	
	public function tableByudzhet()
	{
		$this->load->lview('doc/tableByudzhet');
	}
	
	public function tableMediaplan()
	{
		$this->load->lview('doc/tableMediaplan');
	}
	
	public function tablePlanRk()
	{
		$this->load->lview('doc/tablePlanRk');
	}
}
