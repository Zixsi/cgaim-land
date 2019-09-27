<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseController extends APP_Controller
{
	public function index()
	{
		$data = [];
		$data['courses'] = $this->course->getList();

		$this->load->lview('courses/index', $data);
	}

	public function item($code)
	{
		$data = [];
		if(empty($data['item'] = $this->course->getItemByCode($code)))
			header('Location: ../');

		$data['pageMetaKeyword'] = ($data['item']['meta_keyword'] ?? '');
		$data['pageMetaDescription'] = ($data['item']['meta_description'] ?? '');

		$data['schoolUrl'] = $this->config->item('school_url');
		$data['offers'] = $this->CourseModel->listOffersForCourse($data['item']['id']);
		$data['lectures'] = $this->CourseModel->getLectures($data['item']['id']);
		$data['teacher'] = $this->UserModel->getByID($data['item']['teacher']);
		// debug($data['offers']); die();

		$this->load->lview('courses/item', $data);
	}
}
