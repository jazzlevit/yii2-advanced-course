<?php

namespace frontend\controllers;

class NewsController extends \yii\web\Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        return 'You are on News/Index page';
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        return 'You are on News/View page with ID: ' . $id;
    }
}
