<?php

namespace frontend\controllers;

/**
 * Class CategoryController
 *
 * @package frontend\controllers
 */
class CategoryController extends \yii\web\Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        return 'You are on Category/Index page';
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        return 'You are on Category/View page with ID: ' . $id;
    }
}
