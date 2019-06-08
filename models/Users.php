<?php
namespace app\models;

use app\core\Model;

class Users extends Model
{
    public $userInfoDB;
    public $username;
    public $password;
    public $rank;

    private static $roles = [
        'admin' => 111,
        'user' => 100
    ];

    protected function getTableName()
    {
        return 'tbl_' . parent::getTableName();
    }

    public function __construct($post)
    {
        parent::__construct();
        $this->username = $post['username'];
        $this->password = $post['password'];
        $this->userInfoDB = current($this->getUserInfo());
    }

    public function authorizationUser()
    {
        // Проверка на совпадение паролей
        if ($this->checkPassword()) {
            // Проверяем, есть ли схожая роль с той что у юзера
            if (in_array($this->userInfoDB['rank'], self::$roles)) {
                $_SESSION['login_status'] = true;
                $_SESSION['username'] = $this->userInfoDB['username'];
                foreach (self::$roles as $role => $val) {
                    if ($val == $this->userInfoDB['rank']) {
                        $_SESSION['role'] = $role;
                    }
                }
            }
        } else {
            $_SESSION['login_status'] = false;
        }
    }

    public function checkPassword()
    {
        if ($this->userInfoDB['password'] === $this->password) {
            return true;
        }
        return false;
    }

    /**
     * [getUserInfo Получаем массив с данными юзера]
     * @return [array]
     */
    public function getUserInfo()
    {
        $params = [
            'username' => $this->username,
        ];

        return $this->db->row('SELECT * FROM ' . $this->table_name . ' WHERE username=:username', $params);
    }
}
