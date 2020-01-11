<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VideoHelper extends APP_Model
{
	public function prepareVideoList(&$data)
	{
		if(is_array($data))
		{
			foreach($data as &$row)
			{
				if(isset($row['duration']))
					$row['duration_f'] = time2hours($row['duration']);
			}
		}
	}

	public function getTotalDuration($data)
	{
		$result = 0;
		if(is_array($data))
		{
			foreach($data as $row)
			{
				if(isset($row['duration']))
					$result += (int) $row['duration'];
			}
		}

		return $result;
	}
}