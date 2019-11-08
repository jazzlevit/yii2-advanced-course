<?php
/**
 * @var \frontend\models\Tag $model
 */

use yii\helpers\Html;
use yii\widgets\ListView;

echo Html::tag('h1', 'Tag name - "' . $model->title . '"');

if ($dataProvider->getCount() > 0) {

    echo Html::tag('h3', 'List of news related to the tag');

    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '//news/_news_item_short',
        'itemOptions' => ['tag' => null],
        'options' => ['class' => 'list-group'],
    ]);
}

echo Html::tag(
    'p',
    Html::a('Go back', ['tag/index'], ['class' => 'btn btn-default']),
    ['class' => 'text-right']
);
