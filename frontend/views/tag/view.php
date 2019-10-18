<?php
/**
 * @var \frontend\models\Tag $model
 */

use yii\helpers\Html;

echo Html::tag('h1', 'Tag name - ' . $model->title);

echo Html::tag('h3', 'Below will be list of news related to the category');
