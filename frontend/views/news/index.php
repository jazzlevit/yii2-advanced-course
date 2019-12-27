<?php
/**
 * @var string $title
 */

use yii\helpers\Html;
use yii\widgets\ListView;

echo Html::tag('h2', Html::encode($title));

if ($dataProvider->getCount() > 0) {
    echo ListView::widget([
        'id' => 'newsGrid',
        'dataProvider' => $dataProvider,
        'itemView' => '_news_item_short',
        'itemOptions' => ['tag' => null],
        'options' => ['class' => 'list-group'],
    ]);
}
