<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Match */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="match-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'event_competitor1_id')->textInput() ?>

    <?php echo $form->field($model, 'event_competitor2_id')->textInput() ?>

    <?php echo $form->field($model, 'event_competitor_winner_id')->textInput() ?>

    <?php echo $form->field($model, 'event_category_id')->textInput() ?>

    <?php echo $form->field($model, 'points')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'max' => 10000000,
                'min' => 0,
                'rightAlign' => false
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'submission')->widget(\kartik\checkbox\CheckboxX::class, [
        'autoLabel' => true,
        'pluginOptions' => ['threeState' => false]
    ])->label(false) ?>

    <?php echo $form->field($model, 'annotations')->widget(
        \kartik\markdown\MarkdownEditor::class,
        ['height' => 200, 'encodeLabels' => false]
    ) ?>

    <?php echo $form->field($model, 'active')->widget(\kartik\checkbox\CheckboxX::class, [
        'autoLabel' => true,
        'pluginOptions' => ['threeState' => false]
    ])->label(false) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
