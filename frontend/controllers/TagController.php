<?php

namespace frontend\controllers;

use frontend\models\Tag;
use yii\web\NotFoundHttpException;

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
        $title = 'You are on Tag/Index page';

        return $this->render('index', ['title' => $title]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = Tag::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException('Page not found');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
