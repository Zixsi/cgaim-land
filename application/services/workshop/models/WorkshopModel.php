<?php

namespace App\services\workshop\models;

class WorkshopModel extends \APP_Model
{
    const TABLE = 'courses';

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
        $sql = sprintf("SELECT * FROM %s WHERE id = :id AND type = 'WORKSHOP'", self::TABLE);
        $res = $this->query($sql, [':id' => $id]);
        
        if (($row = $res->row_array())) {
            return $row;
        }

        return null;
    }
    
    /**
     * @param string $code
     * @return ?array
     */
    public function getByCode($code)
    {
        $sql = sprintf("SELECT * FROM %s WHERE code = :code AND type = 'WORKSHOP'", self::TABLE);
        $res = $this->query($sql, [':code' => $code]);
        
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
        if (($res = $this->db->where(['type' => 'WORKSHOP'])->get(self::TABLE))) {
            return $res->result_array();
        }

        return [];
    }
    
    /**
     * @param int $limit
     * @return array
     */
    public function getListPublished($limit)
    {
        $sql = sprintf(
            "SELECT 
                id,
                title,
                code,
                start_date,
                start_date_disable,
                instructor,
                note,
                description,
                img_big,
                img_small
            FROM 
                %s 
            WHERE 
                type = 'WORKSHOP'
                AND published = 1
            ORDER BY 
                sort DESC, 
                id DESC
            LIMIT %d", 
            self::TABLE,
            $limit
        );
        $res = $this->query($sql);
        
        if (($row = $res->result_array())) {
            return $row;
        }

        return [];
    }
    
    /**
     * @param int $limit
     * @return array
     */
    public function getListPublishedRandom($limit)
    {
        $sql = sprintf(
            "SELECT 
                id,
                title,
                code,
                start_date,
                start_date_disable,
                instructor,
                note,
                description,
                img_big,
                img_small
            FROM 
                %s 
            WHERE 
                type = 'WORKSHOP'
                AND published = 1
            ORDER BY 
                RAND() 
            LIMIT %d", 
            self::TABLE,
            $limit
        );
        $res = $this->query($sql);
        
        if (($row = $res->result_array())) {
            return $row;
        }

        return [];
    }

    /**
     * @param int $limit
     * @param int $ignore
     * @return array
     */
    public function getListOther($limit, $ignore = 0)
    {
        $sql = sprintf(
            "SELECT 
                id,
                title,
                code,
                start_date,
                start_date_disable,
                instructor,
                note,
                description,
                img_big,
                img_small
            FROM 
                %s 
            WHERE 
                type = 'WORKSHOP'
                AND published = 1
                AND id != %d 
            ORDER BY 
                RAND() 
            LIMIT %d", 
            self::TABLE,
            $ignore,
            $limit
        );
        $res = $this->query($sql);
        
        if (($row = $res->result_array())) {
            return $row;
        }

        return [];
    }
}
