<?php

namespace frontend\controllers;

use frontend\models\News;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class NewsController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            // Example of Page cache for Index page
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['index'],
                'duration' => 360,
                'variations' => [
                    Yii::$app->request->get('per-page'),
                    Yii::$app->request->get('page'),
                ],
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => 'SELECT COUNT(*) FROM ' . News::tableName(),
//                    'sql' => News::find()->select('COUNT(*)')->createCommand()->getRawSql(),
                ],
            ],

            // Example of Page cache for View page
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['view'],
                'duration' => 360,
                'variations' => [\Yii::$app->request->get('id')],
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => News::find()->select('slug')
                        ->where(['id' => \Yii::$app->request->get('id')])
                        ->createCommand()->getRawSql(),
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $title = Yii::t('frontend', 'You are on News/Index page');

        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->innerJoinWith('category'),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'title' => $title,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = News::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
