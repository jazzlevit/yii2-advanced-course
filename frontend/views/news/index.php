<?php
/**
 * @var string $title
 */

use yii\helpers\Html;

echo Html::tag('h2', Html::encode($title));

echo Html::a('Go to view page', ['news/view', 'id' => 1]);
