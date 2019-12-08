<?php

namespace frontend\controllers;

use frontend\models\Tag;
use Yii;
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
        $title = Yii::t('frontend', 'You are on Tag/Index page');

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
