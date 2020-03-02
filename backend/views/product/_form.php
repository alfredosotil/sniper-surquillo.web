<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'image')->widget(\trntv\filekit\widget\Upload::class, [
        'url'=>['image-upload']
    ]) ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'price')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'suffix' => ' Soles',
                'rightAlign' => false
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'full_description')->widget(
        \kartik\markdown\MarkdownEditor::class,
        ['height' => 200, 'encodeLabels' => false]
    ) ?>

    <?php echo $form->field($model, 'points')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'max' => 10000000,
                'min' => 0,
                'rightAlign' => false
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'stock')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'max' => 10000000,
                'min' => 0,
                'rightAlign' => false
            ]
        ]
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
