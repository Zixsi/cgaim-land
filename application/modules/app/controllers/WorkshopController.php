<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkshopController extends APP_Controller
{
	public function index()
	{
		$data = [];
		$data['items'] = $this->workshop->getList(['status' => true]);
		$data['page_header_title'] = 'Мастерская';
		$data['page_header_text'] = 'В этом разделе коллекции видео, вебинары, референсы, для помощи в развитии ваших навыков.';

		$this->load->layout = 'list';
		$this->load->lview('workshop/index', $data);
	}

	public function item($code)
	{
		$data = [];
		if(empty($data['item'] = $this->workshop->getItemByCode($code)))
			header('Location: ../');

		$data['pageMetaKeyword'] = ($data['item']['meta_keyword'] ?? '');
		$data['pageMetaDescription'] = ($data['item']['meta_description'] ?? '');

		$data['schoolUrl'] = $this->config->item('school_url');
		$data['teacher'] = $this->UserModel->getByID($data['item']['teacher']);

		// debug($data); die();
		$this->load->layout = 'item';
		$this->load->lview('workshop/item', $data);
	}
}
