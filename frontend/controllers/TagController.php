<?php

namespace frontend\controllers;

use frontend\models\Tag;
use yii\data\ActiveDataProvider;
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

        $model = Tag::find();

        return $this->render('index', [
            'title' => $title,
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = Tag::findOne($id);

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getNews(),
            'pagination' => false,
        ]);

        if ($model === null) {
            throw new NotFoundHttpException('Page not found');
        }

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
