<?php

namespace frontend\controllers;

/**
 * Class TagController
 *
 * @package frontend\controllers
 */
class TagController extends \yii\web\Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        return 'You are on Tag/Index page';
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        return 'You are on Tag/View page with ID: ' . $id;
    }
}
