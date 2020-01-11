<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [];
		$data['courses'] = $this->course->getList(12);
		if(count($data['courses']))
			$data['courses'] = array_pad($data['courses'], 3, $data['courses'][0]);
		$data['workshop'] = $this->workshop->getList(['limit' => 12, 'status' => true]);
		if(count($data['workshop']))
			$data['workshop'] = array_pad($data['workshop'], 3, $data['workshop'][0]);
		// debug($data['workshop']); die();

		$this->load->lview('main/index', $data);
	}

	public function terms()
	{
		$data = [];
		$this->load->layout = 'compact';
		$this->load->lview('main/terms', $data);
	}

	public function privacyPolicy()
	{
		$data = [];
		$this->load->layout = 'compact';
		$this->load->lview('main/privacy_policy', $data);
	}
}
