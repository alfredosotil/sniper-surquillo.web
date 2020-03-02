<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\UserProfileSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'user_id') ?>

    <?php echo $form->field($model, 'firstname') ?>

    <?php echo $form->field($model, 'middlename') ?>

    <?php echo $form->field($model, 'lastname') ?>

    <?php echo $form->field($model, 'avatar_path') ?>

    <?php // echo $form->field($model, 'avatar_base_url') ?>

    <?php // echo $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'total_points') ?>

    <?php // echo $form->field($model, 'locale') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
