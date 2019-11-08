<?php

use backend\helpers\CategoryHelper;
use backend\helpers\EnabledHelper;
use backend\helpers\TagHelper;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'category_id')->dropDownList(CategoryHelper::getAvailableCategories()) ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'enabled')->radioButtonGroup(EnabledHelper::getEnabledFilter()); ?>

    <?php echo Html::tag('h4', 'Tags'); ?>

    <?php echo $form->field($model, 'formTag')->widget(Select2::class, [
        'data' => TagHelper::getAvailableTags(),
        'options' => ['placeholder' => 'Select a tag ...', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
//            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 128
        ],
    ])->label(false);
    ?>

    <div class="form-group pull-right">

        <?php echo Html::a('Cancel', ['news/index'], ['class' => 'btn btn-default']) ?>

        <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
