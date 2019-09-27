<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileModel extends APP_Model
{
	private const TABLE = 'files';

	public function getByID(int $id)
	{
		$binds = [':id' => (int) $id];
		$sql = 'SELECT * FROM '.self::TABLE.' WHERE id = :id';
		if($res = $this->query($sql, $binds))
		{
			if($row = $res->row_array())
				return $row;
		}

		return null;
	}
}