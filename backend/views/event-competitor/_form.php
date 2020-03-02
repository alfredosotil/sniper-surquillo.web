<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EventCompetitor */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="event-competitor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'event_id')->widget(
        \kartik\select2\Select2::class,
        [
            'data' => \yii\helpers\ArrayHelper::map(
                \common\models\Event::find()->all(),
                'id',
                'name'
            ),
            'options' => ['placeholder' => 'Select a User ...'],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]) ?>

    <?php echo $form->field($model, 'competitor_id')->widget(
        \kartik\select2\Select2::class,
        [
            'data' => \yii\helpers\ArrayHelper::map(
                \common\models\Competitor::find()->all(),
                'id',
                'FullNameAndEmail'
            ),
            'options' => ['placeholder' => 'Select a User ...'],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
