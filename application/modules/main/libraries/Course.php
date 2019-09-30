<?php

class Course
{
	private $ci;

	public function __construct()
	{
		$this->ci = & get_instance();
	}

	/**
	* список курсов
	*
	* @param int $limit ограничение на кол-во
	* @return array
	**/
	public function getList(int $limit = 10)
	{
		$filter = [
			'limit' => $limit
		];
		$items = $this->ci->CourseModel->getList($filter);
		$this->prepareItems($items, true);

		return $items;
	}

	/**
	* курс по коду
	*
	* @param string $code
	* @return array
	**/
	public function getItemByCode(string $code)
	{
		if(($item = $this->ci->CourseModel->getItemByCode($code)))
			$this->prepareItem($item);

		return $item;
	}
	
	/**
	* подготовить элементы
	*
	* @param int $items
	**/
	public function prepareItems(array &$items = [], $short = false)
	{
		foreach($items as &$item)
		{
			$this->prepareItem($item, $short);
		}
	}

	/**
	* подготовить элемент
	*
	* @param int $item
	**/
	public function prepareItem(array &$item = [], $short = false)
	{
		if(isset($item['img']) && $item['img'] > 0 && ($img = $this->ci->FileModel->getByID($item['img'])))
			$item['img'] = getSchoolFileUrl($img['full_path']);
		else
			$item['img'] = getDefaultFileUrl();

		if(isset($item['name']))
			$item['name'] = htmlspecialchars($item['name']);

		if(isset($item['description']))
		{
			if($short)
			{
				$item['description'] = strip_tags($item['description']);
				$item['description'] = character_limiter($item['description'], 200);
			}
		}

		$item['trailer_code'] = null;
		if(isset($item['trailer_url']) && empty($item['trailer_url']) === false)
			$item['trailer_code'] = getVideoId($item['trailer_url']);

		$item['examples_code'] = null;
		if(isset($item['examples_url']) && empty($item['examples_url']) === false)
			$item['examples_code'] = getVideoId($item['examples_url']);

		if(isset($item['price']) && is_array($item['price']) === false)
		{
			$item['price'] = json_decode($item['price'], true);
			foreach($item['price'] as &$value)
			{
				$value['month'] = (float) $value['month'];
				$value['full'] = (float) $value['full'];
			}
		}

		if(isset($item['only_standart']))
			$item['only_standart'] = ((int) $item['only_standart']?true:false);
	}
}