<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderDetail */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="order-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'order_id')->widget(
        \kartik\select2\Select2::class,
        [
            'data' => \yii\helpers\ArrayHelper::map(
                \common\models\Order::find()->all(),
                'id',
                'IdAndDate'
            ),
            'options' => ['placeholder' => 'Select a Order ...'],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]) ?>

    <?php echo $form->field($model, 'class_type')->widget(
        \kartik\select2\Select2::class, [
        'hideSearch' => true,
        'data' => [\common\models\Product::class => 'Product', \common\models\Service::class => 'Service'],
        'options' => ['placeholder' => 'Select Order Detail Type...'],
        'pluginOptions' => [
            'allowClear' => false
        ],
        'pluginEvents' => [
            'change' => "function() {                
                var val = $('#orderdetail-class_type').val();
                console.log('change value: ' + val); 
                }"
        ]
    ])

    ?>

    <?php echo $form->field($model, 'class_id')->widget(
        \kartik\depdrop\DepDrop::class, [
        'type' => \kartik\depdrop\DepDrop::TYPE_SELECT2,
        'pluginOptions' => [
            'depends' => ['orderdetail-class_type'],
            'placeholder' => 'Select...',
            'url' => \yii\helpers\Url::to(['/order-detail/data-class-id'])
        ]
    ]) ?>

    <?php echo $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'price_per_unit')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'suffix' => ' Soles',
                'rightAlign' => false
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'price')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'suffix' => ' Soles',
                'rightAlign' => false
            ]
        ]
    ) ?>

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

    <?php echo $form->field($model, 'vat')->widget(
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

    <?php echo $form->field($model, 'qty')->widget(
        \kartik\touchspin\TouchSpin::class, [
            'options' => ['placeholder' => 'Adjust ...'],
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
