<?php
/**
 * @var \frontend\models\News $model
 */

use yii\helpers\Html;

echo Html::tag('h1', $model->title);

echo Html::tag('p', $model->description);
