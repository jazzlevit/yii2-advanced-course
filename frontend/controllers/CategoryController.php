<?php

namespace frontend\controllers;

use frontend\models\Category;
use yii\data\ActiveDataProvider;
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

        $dataProvider = new ActiveDataProvider([
            'query' => Category::find()->innerJoinWith('news'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', ['title' => $title, 'dataProvider' => $dataProvider]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = Category::findOne($id);

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
