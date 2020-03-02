<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\MatchSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="match-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'event_competitor1_id') ?>

    <?php echo $form->field($model, 'event_competitor2_id') ?>

    <?php echo $form->field($model, 'event_competitor_winner_id') ?>

    <?php echo $form->field($model, 'event_category_id') ?>

    <?php // echo $form->field($model, 'points') ?>

    <?php // echo $form->field($model, 'submission') ?>

    <?php // echo $form->field($model, 'annotations') ?>

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
