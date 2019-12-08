<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo Html::label('Source message (category "' . $model->source->category .'"):'); ?>

    <?php echo Html::textInput('any_name', $model->source->message, ['class' => 'form-control', 'disabled' => 'disabled']); ?>

    <?php echo $form->field($model, 'language')->textInput(['disabled' => 'disabled']) ?>

    <?php echo $form->field($model, 'translation')->textarea(['rows' => 6]) ?>

    <div class="form-group pull-right">

        <?php echo Html::a('Cancel', ['message/index'], ['class' => 'btn btn-default']) ?>

        <?php echo Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
