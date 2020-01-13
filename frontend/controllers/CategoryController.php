<?php

namespace frontend\controllers;

use frontend\models\Category;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

/**
 * Class CategoryController
 *
 * @package frontend\controllers
 */
class CategoryController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            // Example of Http cache (header Last Modified)
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['index'],
//                'cacheControlHeader' => 'public, max-age=5',
                'lastModified' => function ($action, $params) {
                    return time();
                },
            ],

            // Example of Http cache (header ETag serializes `slug` and `title`)
            [
                'class' => 'yii\filters\HttpCache',
                'sessionCacheLimiter' => 'public',
                'only' => ['view'],
                'etagSeed' => function ($action, $params) {
                    $model = Category::findOne(\Yii::$app->request->get('id'));
                    return serialize([$model->slug, $model->title]);
                },
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $title = Yii::t('frontend', 'You are on Category/Index page');

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

        if ($model === null) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getNews(),
            'pagination' => false,
        ]);

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
