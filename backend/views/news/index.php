<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <?php echo Html::a('Create News', ['create'], ['class' => 'btn btn-success pull-right']) ?>

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            [
                'label' => 'Category',
                'attribute' => 'category.title',
            ],
            'slug',
            'title',
            'description:ntext',
            //'enabled',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>


</div>
