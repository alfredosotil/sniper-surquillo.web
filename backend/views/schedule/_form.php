<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Schedule */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'gym_discipline_id')->widget(
        \kartik\select2\Select2::class,
        [
            'data' => \yii\helpers\ArrayHelper::map(
                \common\models\GymDiscipline::find()->all(),
                'id',
                'name'
            ),
            'options' => ['placeholder' => 'Select a Gym Discipline ...'],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]) ?>

    <?php echo $form->field($model, 'day_of_week')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'start_hour')->widget(
        \kartik\datecontrol\DateControl::class, [
        'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
        'ajaxConversion' => true,
        'autoWidget' => true,
        'displayFormat' => 'php:h:i A',
        'saveFormat' => 'php:h:i A',
        'readonly' => true,
        'widgetOptions' => [
            'pluginOptions' => [
                'autoclose' => true,
                'todayHighlight' => true,
                'todayBtn' => true,
            ]
        ],
    ]) ?>

    <?php echo $form->field($model, 'end_hour')->widget(
        \kartik\datecontrol\DateControl::class, [
        'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
        'ajaxConversion' => true,
        'autoWidget' => true,
        'displayFormat' => 'php:h:i A',
        'saveFormat' => 'php:h:i A',
        'readonly' => true,
        'widgetOptions' => [
            'pluginOptions' => [
                'autoclose' => true,
                'todayHighlight' => true,
                'todayBtn' => true,
            ]
        ],
    ]) ?>

    <?php echo $form->field($model, 'active')->widget(\kartik\checkbox\CheckboxX::class, [
        'autoLabel' => true,
        'pluginOptions' => ['threeState' => false]
    ])->label(false) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
