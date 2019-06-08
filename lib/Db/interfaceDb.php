<?php
namespace app\lib\Db;

interface interfaceDb
{
    public function query(string $sql, array $params);

    public function row(string $sql, $params = []);

    public function column(string $sql, $params = []);

    public function addUpdate(string $sql, $params);
}
