<?php

use backend\helpers\EnabledHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel backend\models\searches\NewsSearch */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <?php echo Html::a('Create News', ['create'], ['class' => 'btn btn-success pull-right']) ?>

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            // example of related record value
            [
                'label' => 'Category',
                'attribute' => 'category_id',
                'value' => 'category.title',
            ],
            'title',
            // example of callable function for value
            [
                'attribute' => 'description',
                'value' => function ($model, $key, $index, $column) {
                    return StringHelper::truncateWords($model->description, 40);
                },
            ],
            // example of filter and custom helper
            [
                'attribute' => 'enabled',
                'value' => function ($model) {
                    return EnabledHelper::getEnabledView($model->enabled);
                },
                'filter' => EnabledHelper::getEnabledFilter(),
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>


</div>
