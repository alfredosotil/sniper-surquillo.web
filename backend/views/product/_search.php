<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'price')->textInput(['placeholder' => 'Price']) ?>

    <?= $form->field($model, 'short_description')->textInput(['maxlength' => true, 'placeholder' => 'Short Description']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'placeholder' => 'Description']) ?>

    <?php /* echo $form->field($model, 'points')->textInput(['placeholder' => 'Points']) */ ?>

    <?php /* echo $form->field($model, 'image_path')->textInput(['maxlength' => true, 'placeholder' => 'Image Path']) */ ?>

    <?php /* echo $form->field($model, 'image_base_url')->textInput(['maxlength' => true, 'placeholder' => 'Image Base Url']) */ ?>

    <?php /* echo $form->field($model, 'stock')->textInput(['placeholder' => 'Stock']) */ ?>

    <?php /* echo $form->field($model, 'is_active')->textInput(['placeholder' => 'Is Active']) */ ?>

    <?php /* echo $form->field($model, 'lock', ['template' => '{input}'])->textInput(['style' => 'display:none']); */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
