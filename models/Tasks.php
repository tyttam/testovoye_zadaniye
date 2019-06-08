<?php
namespace app\models;

use app\core\Model;

class Tasks extends Model
{
    protected function getTableName()
    {
        return 'tbl_' . parent::getTableName();
    }

    public function getTasks($id = '')
    {
        if ($id != '') {
            $withId = 'WHERE id=:id';
            $params = [
                'id' => current($id),
            ];
        } else {
            $withId = '';
            $params = [];
        }
        return $this->db->row('SELECT * FROM ' . $this->table_name . ' ' . $withId, $params);
    }

    public function addTask($post)
    {
        $sql = 'INSERT INTO ' . $this->table_name . ' (u_name, mail, task) VALUES (:u_name, :mail, :task)';
        $params = [
            'u_name' => $post['name'],
            'mail' => $post['mail'],
            'task' => $post['task'],
        ];
        $stmt = $this->db->addUpdate($sql, $params);
    }

    public function updateTask($post)
    {
        $sql = 'UPDATE ' . $this->table_name . ' SET u_name=:u_name, mail=:mail, task=:task, status=:status WHERE id=:id';
        $params = [
            'u_name' => $post['name'],
            'mail' => $post['mail'],
            'task' => $post['task'],
            'status' => $post['status'],
            'id' => $post['id'],
        ];
        $stmt = $this->db->addUpdate($sql, $params);
    }

}
