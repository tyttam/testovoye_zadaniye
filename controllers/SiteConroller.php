<?php
namespace app\controllers;

use app\core\Controller;

use app\models\Tasks;
use app\models\Users;

class SiteConroller extends Controller
{
    public function actionIndex()
    {
        $model = new Tasks();
        $model = $model->getTasks();
        $this->view->render('index', ['tasks' => $model]);
    }

    public function actionLogin()
    {
        if (isset($_POST['login_btn'])) {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $user = new Users($_POST);
                $user = $user->authorizationUser();

                $this->referer('/');
            } else {
                $_SESSION['login_status'] = false;
            }
        }
        $this->view->render('login');
    }
    public function actionLogout()
    {
        session_destroy();
        $this->referer('/');
    }

    public function actionCreatetask()
    {
        $this->view->render('create-task');
    }
    public function actionUpdatetask()
    {
        $model = new Tasks();

        if (isset($_POST['update_btn'])) {
            $model->updateTask($_POST);
            $this->referer('/');
        }

        $model = current($model->getTasks($this->url_params));
        $this->view->render('update-task', ['task_upd' => $model]);
    }

    public function actionAddnewtask()
    {
        if (isset($_POST['add_btn'])) {
            $model = new Tasks();
            $model = $model->addTask($_POST);
        }
        $this->referer('/');
    }
}
