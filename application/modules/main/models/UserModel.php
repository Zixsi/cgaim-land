<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends APP_Model
{
	const TABLE = 'users';

	public function getByID($id)
	{
		return $this->getByField('id', (int) $id);
	}

	public function getByField($field, $value)
	{
		$sql = 'SELECT *, CONCAT_WS(\' \', name, lastname) as full_name FROM '.self::TABLE.' WHERE '.$field.' = ?';
		$res = $this->db->query($sql, [$value]);
		if($row = $res->row_array())
		{
			$this->prepareUser($row);
			return $row;
		}

		return false;
	}

	public function prepareUser(&$data)
	{
		if(empty($data['img']))
			$data['img'] = 'templates/assets/profile_icon_male2.png';
	}
}