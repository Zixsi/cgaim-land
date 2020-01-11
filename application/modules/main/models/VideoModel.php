<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VideoModel extends APP_Model
{
	const TABLE = 'video';
	const VIDEO_TYPES = [
		'lecture', // лекция
		'review', // ревью 
		'workshop', // мастерская 
	];

	public function __construct()
	{
		parent::__construct();
	}

	public function getList(array $params = [])
	{
		$result = [];
		$filter = $this->prepareFilter($params);
		$binds = $filter['binds'];

		$sql = 'SELECT * FROM '.self::TABLE;
		if(count($filter['where']))
			$sql .= ' WHERE '.implode(' AND ', $filter['where']);

		$sql .= ' ORDER BY sort ASC, id ASC';

		if($res = $this->query($sql, $binds)->result_array())
		{
			$result = $res;
		}

		return $result;
	}

	private function prepareFilter(array $params)
	{
		$result = [
			'where' => [],
			'binds' => [],
			'limit' => 0,
			'offset' => 0
		];

		if(isset($params['source_id']) && (int) $params['source_id'] > 0)
		{
			$result['binds'][':source_id'] = (int) $params['source_id'];
			$result['where'][] = 'source_id = :source_id';
		}

		if(isset($params['source_type']) && empty($params['source_type']) === false)
		{
			$result['binds'][':source_type'] = $params['source_type'];
			$result['where'][] = 'source_type = :source_type';
		}

		return $result;
	}
}