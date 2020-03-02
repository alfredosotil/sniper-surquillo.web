<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Subscription */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="subscription-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'user_id')->widget(
        \kartik\select2\Select2::class,
        [
            'data' => \yii\helpers\ArrayHelper::map(
                \common\models\User::find()->all(),
                'id',
                'UsernameAndEmail'
            ),
            'options' => ['placeholder' => 'Select a User ...'],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]) ?>

    <?php echo $form->field($model, 'service_id')->widget(
        \kartik\select2\Select2::class,
        [
            'data' => \yii\helpers\ArrayHelper::map(
                \common\models\Service::find()->all(),
                'id',
                'NamePrinceAndDuration'
            ),
            'options' => ['placeholder' => 'Select a Service ...'],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]) ?>

    <?php echo $form->field($model, 'starts_at')->widget(
        \kartik\datecontrol\DateControl::class, [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'ajaxConversion' => true,
        'autoWidget' => true,
        'displayFormat' => 'php:d-F-Y h:i:s A',
        'saveFormat' => 'php:U',
        'readonly' => true,
        'widgetOptions' => [
            'pluginOptions' => [
                'autoclose' => true,
                'todayHighlight' => true,
                'todayBtn' => true,
            ]
        ],
    ]) ?>

    <?php echo $form->field($model, 'ends_at')->widget(
        \kartik\datecontrol\DateControl::class, [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'ajaxConversion' => true,
        'autoWidget' => true,
        'displayFormat' => 'php:d-F-Y h:i:s A',
        'saveFormat' => 'php:U',
        'readonly' => true,
        'widgetOptions' => [
            'pluginOptions' => [
                'autoclose' => true,
                'todayHighlight' => true,
                'todayBtn' => true,
            ]
        ],
    ]) ?>

    <?php /*echo $form->field($model, 'date_range')->widget(
        \kartik\daterange\DateRangePicker::class, [
        'convertFormat' => true,
        'pluginOptions' => [
            'autoApply' => true,
            'timePicker' => false,
            'timePickerIncrement' => 30,
            'locale' => [
                'format' => 'd-F-Y',
            ]
        ]
    ]) */?>

    <?php echo $form->field($model, 'subscription_state_id')->textInput() ?>

    <?php echo $form->field($model, 'active')->widget(\kartik\checkbox\CheckboxX::class, [
        'autoLabel' => true,
        'pluginOptions' => ['threeState' => false]
    ])->label(false) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
