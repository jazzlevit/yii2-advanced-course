<?php

namespace frontend\controllers;

use frontend\models\Category;
use yii\web\NotFoundHttpException;

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
        $title = 'You are on Category/Index page';

        return $this->render('index', ['title' => $title]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = Category::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException('Page not found');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
