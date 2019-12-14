<?php

namespace api\controllers;

//use yii\rest\ActiveController;
use api\models\Tag;
use yii\data\ActiveDataFilter;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;

/**
 * Class TagController
 *
 * @package api\controllers
 */
class TagController extends Controller
{

    /**
     * Example of collection
     * @return ActiveDataProvider
     */
//    public function actionIndex()
//    {
//        return new ActiveDataProvider([
//            'query' => Tag::find(),
//        ]);
//    }

    /**
     * Example of collection with filter
     * @return ActiveDataFilter|ActiveDataProvider
     */
    public function actionIndex()
    {
        $filter = new ActiveDataFilter([
            'searchModel' => 'api\models\search\TagSearch'
        ]);

        $filterCondition = null;

        // You may load filters from any source. For example,
        // if you prefer JSON in request body,
        // use Yii::$app->request->getBodyParams() below:
        if ($filter->load(\Yii::$app->request->get())) {
            $filterCondition = $filter->build();
            if ($filterCondition === false) {
                // Serializer would get errors out of it
                return $filter;
            }
        }

        $query = Tag::find();
        if ($filterCondition !== null) {
            $query->andWhere($filterCondition);
        }

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }

    public function actions()
    {
        return [
            'options' => [
                'class' => 'yii\rest\OptionsAction',
                'collectionOptions' => ['GET', 'HEAD', 'OPTIONS'],
                'resourceOptions' => [],
            ],
        ];
    }
}
