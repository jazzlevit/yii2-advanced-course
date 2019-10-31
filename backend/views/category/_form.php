<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form kartik\form\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row"></div>

    <div class="row">
        <div class="col-md-8">
            <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?php echo $form->field($model, 'enabled')->radioButtonGroup([
        0 => 'No',
        1 => 'Yes'
    ]); ?>

    <div class="form-group pull-right">

        <?php echo Html::a('Cancel', ['category/index'], ['class' => 'btn btn-default']) ?>

        <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
