<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserHistory */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-history-form">

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

    <?php echo $form->field($model, 'is_allergic')->widget(\kartik\checkbox\CheckboxX::class, [
        'autoLabel' => true,
        'pluginOptions' => ['threeState' => false]
    ])->label(false) ?>

    <?php echo $form->field($model, 'description')->widget(
        \kartik\markdown\MarkdownEditor::class,
        ['height' => 200, 'encodeLabels' => false]
    ) ?>

    <?php echo $form->field($model, 'indications')->widget(
        \kartik\markdown\MarkdownEditor::class,
        ['height' => 200, 'encodeLabels' => false]
    ) ?>

    <?php echo $form->field($model, 'weight')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'suffix' => ' kg',
                'groupSeparator' => '',
                'digits' => 0,
                'max' => 500,
                'min' => 0,
                'rightAlign' => false
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'height')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'suffix' => ' cm',
                'groupSeparator' => '',
                'digits' => 0,
                'max' => 500,
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
