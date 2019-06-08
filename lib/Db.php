<?php
namespace app\lib;

use PDO;
use app\lib\Db\interfaceDb;

class Db implements interfaceDb
{
    protected $db;

    public function __construct()
    {
        $config = require 'config/db.php';
        $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' .
        $config['dbname'], $config['user'], $config['password']);
    }

    public function query(string $sql, array $params)
    {
        $stmt = $this->db->prepare($sql);
        // Используем дл язащиты от инъекций
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':' . $key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function row(string $sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column(string $sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

    public function addUpdate(string $sql, $params)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
    }
}
