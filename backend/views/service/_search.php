<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\ServiceSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="service-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'name') ?>

    <?php echo $form->field($model, 'price') ?>

    <?php echo $form->field($model, 'short_description') ?>

    <?php echo $form->field($model, 'full_description') ?>

    <?php // echo $form->field($model, 'points') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'image_path') ?>

    <?php // echo $form->field($model, 'image_base_url') ?>

    <?php // echo $form->field($model, 'stock') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'uuid') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
