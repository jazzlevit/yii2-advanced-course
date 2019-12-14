<?php

namespace api\controllers;

use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

/**
 * Class NewsController
 *
 * @package api\controllers
 */
class NewsController extends ActiveController
{

    public $modelClass = 'api\models\News';

    /**
     * {@inheritdoc}
     */
    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        // Example 1
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
                'collectionOptions' => ['GET', 'HEAD', 'OPTIONS'],
                'resourceOptions' => ['GET', 'HEAD', 'OPTIONS'],
            ],
        ];

        // Example 2
//        $parent = parent::actions();
//
//        ArrayHelper::remove($parent, 'create');
//        ArrayHelper::remove($parent, 'update');
//        ArrayHelper::remove($parent, 'delete');
//
//        return ArrayHelper::merge($parent, [
//            'options' => [
//                'class' => 'yii\rest\OptionsAction',
//                'collectionOptions' => ['GET', 'HEAD', 'OPTIONS'],
//                'resourceOptions' => ['GET', 'HEAD', 'OPTIONS'],
//            ],
//        ]);
    }
}
