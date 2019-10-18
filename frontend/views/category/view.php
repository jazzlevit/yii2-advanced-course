<?php
/**
 * @var \frontend\models\Category $model
 */

use yii\helpers\Html;

echo Html::tag('h1', 'Category name - ' . $model->title);

echo Html::tag('h3', 'Below will be list of news related to the category');
