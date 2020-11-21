<?php

namespace App\services\review\models;

class ReviewModel extends \APP_Model
{
    const TABLE = 'reviews';

    /**
     * @param array $data
     * @return boolean
     */
    public function add($data = [])
    {
        unset($data['id']);
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
        unset($data['id']);
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
        $sql = sprintf('SELECT * FROM %s WHERE id = :id', self::TABLE);
        $res = $this->query($sql, [':id' => $id]);
        
        if (($row = $res->row_array())) {
            return $row;
        }

        return null;
    }
    
    /**
     * @return array
     */
    public function getList()
    {
        if (($res = $this->db->get(self::TABLE))) {
            return $res->result_array();
        }

        return [];
    }
    
    /**
     * @param int $id
     * @return type
     */
    public function getListByCourse($id = 0)
    {
        $sql = sprintf('SELECT * FROM %s WHERE course = :id', self::TABLE);
        $res = $this->query($sql, [':id' => $id]);
        
        if (($rows = $res->result_array())) {
            return $rows;
        }

        return [];
    }
}
