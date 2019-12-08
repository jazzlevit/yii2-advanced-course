<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?php echo Html::encode($this->title) ?></h1>


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'source.category',
            'source.message:ntext',
            'language',
            'translation:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}'
            ],
        ],
    ]); ?>

</div>