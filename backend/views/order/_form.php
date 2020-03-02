<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="order-form">

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

    <?php echo $form->field($model, 'optional_client_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'amount')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'suffix' => ' Soles',
                'rightAlign' => false
            ]
        ]
    ) ?>

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

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'tax')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'suffix' => ' %',
                'digits' => 3,
                'max' => 100,
                'min' => 0,
                'rightAlign' => false
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'is_paid')->widget(\kartik\checkbox\CheckboxX::class, [
        'autoLabel' => true,
        'pluginOptions' => ['threeState' => false]
    ])->label(false) ?>

    <?php echo $form->field($model, 'type_payment')->dropDownlist([
        \common\models\Order::CASH => Yii::t('backend', 'Cash'),
        \common\models\Order::CREDIT_CARD => Yii::t('backend', 'Credit Card'),
        \common\models\Order::TRANSFER => Yii::t('backend', 'Transfer'),
        \common\models\Order::YAPE => Yii::t('backend', 'Yape'),
    ]) ?>

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
