<?php

namespace App\modules\main\models;

class UserModel extends \APP_Model
{
    const TABLE = 'users';

    /**
     * @param array $data
     * @return boolean
     */
    public function add($data = [])
    {
        if ($this->db->insert(self::TABLE, $data)) {
            return true;
        }

        return false;
    }

    /**
     * @param int $id
     * @param array $data
     * @return boolean
     */
    public function update($id, $data = [])
    {
        $this->db->where('id', $id);
        
        if ($this->db->update(self::TABLE, $data)) {
            return true;
        }

        return false;
    }

    /**
     * @param int $id
     * @return ?array
     */
    public function getById($id)
    {
        return $this->getByField('id', (int) $id);
    }

    /**
     * 
     * @param string $login
     * @return ?array
     */
    public function getByLogin($login)
    {
        return $this->getByField('login', $login);
    }

    public function getByField($field, $value)
    {
        $sql = sprintf('SELECT * FROM %s WHERE %s = :value', self::TABLE, $field);
        $res = $this->query($sql, [':value' => $value]);
        
        if (($row = $res->row_array())) {
            return $row;
        }

        return null;
    }

    public function pwdHash($password, $salt = false)
    {
        return ($salt !== false) ? sha1($password . $salt) : sha1($password);
    }

    public function pwdSalt()
    {
        return sha1(microtime(true));
    }
}
