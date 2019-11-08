<?php
/**
 * @var string $title
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

use yii\helpers\Html;
use yii\widgets\ListView;

echo Html::tag('h2', Html::encode($title));

if ($dataProvider->getCount() > 0) {
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_category_item',
        'itemOptions' => ['tag' => null],
        'options' => ['class' => 'list-group'],
    ]);
}
