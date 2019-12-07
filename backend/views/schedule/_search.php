<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\ScheduleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-schedule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'gym_discipline_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\base\GymDiscipline::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Gym discipline')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'day_of_week')->textInput(['maxlength' => true, 'placeholder' => 'Day Of Week']) ?>

    <?= $form->field($model, 'start_hour')->textInput(['maxlength' => true, 'placeholder' => 'Start Hour']) ?>

    <?= $form->field($model, 'end_hour')->textInput(['maxlength' => true, 'placeholder' => 'End Hour']) ?>

    <?php /* echo $form->field($model, 'is_active')->textInput(['placeholder' => 'Is Active']) */ ?>

    <?php /* echo $form->field($model, 'lock', ['template' => '{input}'])->textInput(['style' => 'display:none']); */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
