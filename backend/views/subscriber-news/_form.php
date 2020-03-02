<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SubscriberNews */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="subscriber-news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'phone_number')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'prefix' => '+51 ',
                'groupSeparator' => ' ',
                'digits' => 9   ,
                'rightAlign' => false
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'is_active')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
