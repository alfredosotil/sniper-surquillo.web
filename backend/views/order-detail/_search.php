<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\OrderDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-order-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'class_id')->textInput(['placeholder' => 'Class']) ?>

    <?= $form->field($model, 'class_type')->textInput(['maxlength' => true, 'placeholder' => 'Class Type']) ?>

    <?= $form->field($model, 'order_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\base\Order::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Order')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'placeholder' => 'Description']) ?>

    <?php /* echo $form->field($model, 'price_per_unit')->textInput(['placeholder' => 'Price Per Unit']) */ ?>

    <?php /* echo $form->field($model, 'price')->textInput(['placeholder' => 'Price']) */ ?>

    <?php /* echo $form->field($model, 'tax')->textInput(['placeholder' => 'Tax']) */ ?>

    <?php /* echo $form->field($model, 'vat')->textInput(['placeholder' => 'Vat']) */ ?>

    <?php /* echo $form->field($model, 'qty')->textInput(['placeholder' => 'Qty']) */ ?>

    <?php /* echo $form->field($model, 'is_active')->textInput(['placeholder' => 'Is Active']) */ ?>

    <?php /* echo $form->field($model, 'lock', ['template' => '{input}'])->textInput(['style' => 'display:none']); */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
