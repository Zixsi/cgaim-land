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
		$data['courses'] = $this->course->getList(4);

		$this->load->lview('main/index', $data);
	}

	public function terms()
	{
		$data = [];

		$this->load->lview('main/terms', $data);
	}

	public function privacyPolicy()
	{
		$data = [];

		$this->load->lview('main/privacy_policy', $data);
	}
}
