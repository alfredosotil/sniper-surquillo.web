<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-detail-form">

    <?php $form = ActiveForm::begin(); ?>

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
            'url' => \yii\helpers\Url::to(['/order-detail-ajax/data-class-id'])
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

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
