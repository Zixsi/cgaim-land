<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseModel extends APP_Model
{
	const TABLE = 'courses';
	const TABLE_GROUPS = 'courses_groups';
	const TABLE_LECTURES = 'lectures';

	public function getList($filter = [])
	{
		$result = [];

		$binds = [];
		$sql = 'SELECT 
					c.id, c.code, c.name, c.description, c.img 
				FROM 
					'.self::TABLE.' as c 
				WHERE 
					c.active = 1 
				ORDER BY 
					c.id DESC';

		if(isset($filter['limit']))
			$sql.= ' LIMIT '.$filter['limit'];

		if(($res = $this->query($sql, $binds)))
		{
			if($rows = $res->result_array())
				$result = $rows;
		}
		
		return $result;
	}

	public function getItemByCode($code)
	{
		$binds = [
			':code' => (string) $code
		];
		$sql = 'SELECT 
					c.*, lect.cnt as lectures_count 
				FROM 
					'.self::TABLE.' as c 
				LEFT JOIN 
					(SELECT course_id, count(*) as cnt FROM '.self::TABLE_LECTURES.' WHERE type = 0 GROUP BY course_id ) as lect ON(lect.course_id = c.id) 
				WHERE 
					c.code = :code';
		if($res = $this->query($sql, $binds))
		{
			if($row = $res->row_array())
				return $row;
		}

		return null;
	}

	public function listOffersForCourse($course)
	{
		$result = [];
		$now = new DateTime('now');
		$now->setTime(0, 0, 0);

		$before_start_mod = '+12 weeks';
		$after_start_mod = '-2 weeks';

		$start_ts = clone $now;
		$start_ts->modify($after_start_mod); // за n недель после старта
		$end_ts = clone $now;
		$end_ts->modify($before_start_mod); // за n недель до старта

		$bind = [
			':course' => $course, 
			':start_ts' => $start_ts->format('Y-m-d 00:00:00'), 
			':end_ts' => $end_ts->format('Y-m-d 00:00:00'), 
			':now_ts' => $now->format('Y-m-d 00:00:00'),
			':type' => 'standart'
		];

		$sql = 'SELECT 
					* 
				FROM 
					'.self::TABLE_GROUPS.' 
				WHERE 
					course_id = :course AND 
					deleted = 0 AND 
					( ts > :start_ts AND ts < :end_ts ) AND 
					ts_end > :now_ts AND 
					type = :type 
				ORDER BY 
					ts ASC';

		if($res = $this->query($sql, $bind))
		{
			$rows = $res->result_array();
			if(is_array($rows))
				$result = $rows;

			foreach($result as &$val)
			{
				$val['ts_timestamp'] = strtotime($val['ts']);
				$val['ts_f'] = date(DATE_FORMAT_SHORT, $val['ts_timestamp']);
			}
		}

		return $result;
	}

	public function getLectures($id)
	{
		$result = [];
		$binds = [
			':id' => $id
		];
		$sql = 'SELECT * FROM '.self::TABLE_LECTURES.' WHERE course_id = :id ORDER BY type DESC, sort ASC, id ASC';
		if($res = $this->query($sql, $binds))
		{
			if($res = $res->result_array())
				$result = $res;
		}

		return $result;
	}
}