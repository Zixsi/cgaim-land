<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkshopModel extends APP_Model
{
	const TABLE = 'workshop';

	private $types = [
		'webinar' => 'Вебинар',
		'collection' => 'Коллекция'
	];

	public function getItem($id)
	{
		return $this->getByField('id', $id);
	}

	public function getByField($key, $value)
	{
		return $this->db
		->from(self::TABLE)
		->where($key, $value)
		->get()->row_array();
	}

	public function getList($filter = [])
	{
		$result = [];
		$filterParams = $this->parseListFilter($filter);
		$binds = $filterParams['binds'];

		$sql = 'SELECT * FROM '.self::TABLE.' ';
		if(count($filterParams['where']))
			$sql .= ' WHERE '.implode(' AND ', $filterParams['where']);

		if($res = $this->query($sql, $binds)->result_array())
		{
			$result = $res;
		}		

		return $result;
	}

	public function getTypes()
	{
		return $this->types;
	}

	public function parseListFilter($params = [])
	{
		$result = [
			'binds' => [],
			'where' => [],
			'offset' => 0,
			'limit' => 9999
		];

		if(isset($params['id']) && empty($params['id']) === false)
		{
			if(is_array($params['id']))
				$result['where'][] = 'id IN('.implode(',', $params['id']).')';
			else
			{
				$result['binds'][':id'] = $params['id'];
				$result['where'][] = 'id = :id';
			}
		}

		if(isset($params['ignore']) && empty($params['ignore']) === false)
		{
			if(is_array($params['ignore']))
				$result['where'][] = 'id NOT IN('.implode(',', $params['ignore']).')';
			else
			{
				$result['binds'][':ignore'] = $params['ignore'];
				$result['where'][] = 'id != :ignore';
			}
		}

		if(isset($params['status']))
		{
			$result['binds'][':status'] = ($params['status'])?1:0;
			$result['where'][] = 'status = :status';
		}

		return $result;
	}
}