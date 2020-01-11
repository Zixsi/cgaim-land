<?php

class Workshop
{
	private $ci;

	public function __construct()
	{
		$this->ci = & get_instance();
	}

	/**
	* список курсов
	*
	* @param array $filter фильтр
	* @return array
	**/
	public function getList(array $filter = [])
	{
		$items = $this->ci->WorkshopModel->getList($filter);
		$this->prepareItems($items, true);

		return $items;
	}

	// /**
	// * курс по коду
	// *
	// * @param string $code
	// * @return array
	// **/
	public function getItemByCode(string $code)
	{
		if(($item = $this->ci->WorkshopModel->getByField('code', $code)))
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
		if(isset($item['img']) && empty($item['img']) === false)
			$item['img'] = getSchoolFileUrl($item['img']);
		else
			$item['img'] = getDefaultFileUrl();

		if(isset($item['img_land_bg']) && empty($item['img_land_bg']) === false)
			$item['img_land_bg'] = getSchoolFileUrl($item['img_land_bg']);
		else
			$item['img_land_bg'] = getDefaultFileUrl();

		if(isset($item['title']))
		{
			$item['title'] = htmlspecialchars($item['title']);
			$item['name'] = $item['title'];
		}

		if(isset($item['description']))
		{
			if($short)
			{
				$item['description'] = strip_tags($item['description']);
				$item['description'] = character_limiter($item['description'], 45);
			}
		}

		$item['trailer_code'] = null;
		if(isset($item['video']) && empty($item['video']) === false)
			$item['trailer_code'] = getVideoId($item['video']);

		$videos = $this->ci->VideoModel->getList(['source_id' => $item['id'], 'source_type' => 'workshop']);
		$item['videosCount'] = count($videos);
		$item['totalDuration'] = $this->ci->VideoHelper->getTotalDuration($videos);
		$item['totalDurationHours'] = ((int) $item['totalDuration'] > 3600)?ceil($item['totalDuration'] / 3600):1;
	}
}