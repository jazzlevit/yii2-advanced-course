<?php
/**
 * @var \frontend\models\Category $model
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

use yii\helpers\Html;
use yii\widgets\ListView;

$title = Yii::t('frontend', 'Category name: "{name}"', ['name' => $model->title]);

echo Html::tag('h1', $title);

if ($dataProvider->getCount() > 0) {

    echo Html::tag('h3', Yii::t('frontend', 'List of news:'));

    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '//news/_news_item_short',
        'itemOptions' => ['tag' => null],
        'options' => ['class' => 'list-group'],
    ]);
}

echo Html::tag(
    'p',
    Html::a(Yii::t('frontend', 'Go back'), ['category/index'], ['class' => 'btn btn-default']),
    ['class' => 'text-right']
);
