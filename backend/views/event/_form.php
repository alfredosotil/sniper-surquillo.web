<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'full_description')->widget(
        \kartik\markdown\MarkdownEditor::class,
        ['height' => 200, 'encodeLabels' => false]
    ) ?>

    <?php echo $form->field($model, 'annotations')->widget(
        \kartik\markdown\MarkdownEditor::class,
        ['height' => 200, 'encodeLabels' => false]
    ) ?>

    <?php echo $form->field($model, 'address_reference')->widget(
        \kalyabin\maplocation\SelectMapLocationWidget::class, [
        'attributeLatitude' => 'latitude',
        'attributeLongitude' => 'longitude',
        'googleMapApiKey' => 'AIzaSyDvoGfyPGu4a4qN6PekVVa414qQFAs9X8E',
        'draggable' => true,
    ]) ?>

    <?php echo $form->field($model, 'start_at')->textInput() ?>

    <?php echo $form->field($model, 'start_at')->widget(
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

    <?php echo $form->field($model, 'active')->widget(\kartik\checkbox\CheckboxX::class, [
        'autoLabel' => true,
        'pluginOptions' => ['threeState' => false]
    ])->label(false) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
