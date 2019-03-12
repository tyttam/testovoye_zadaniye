<?php
namespace app\controllers;

use app\core\Controller;

class SiteConroller extends Controller
{
    public function actionIndex()
    {
        $this->view->render('index');
    }

    public function actionSitemap()
    {
        echo "sitemap56";
    }

}
