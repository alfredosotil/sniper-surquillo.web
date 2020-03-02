<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\CompetitorSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="competitor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'team_id') ?>

    <?php echo $form->field($model, 'firstname') ?>

    <?php echo $form->field($model, 'middlename') ?>

    <?php echo $form->field($model, 'lastname') ?>

    <?php // echo $form->field($model, 'avatar_path') ?>

    <?php // echo $form->field($model, 'avatar_base_url') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'total_points') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'belt') ?>

    <?php // echo $form->field($model, 'division') ?>

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
