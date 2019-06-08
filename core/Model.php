<?php
namespace app\core;

use app\lib\Db;

abstract class Model
{
    public $db;
    public $table_name;

    public function __construct()
    {
        $this->db = new Db;
        $this->table_name = $this->getTableName();
    }

    protected function getTableName()
    {
        $class = get_class($this);
        if ($pos = strrpos($class, '\\')) return lcfirst(substr($class, $pos + 1));
        return lcfirst($pos);
    }
}
