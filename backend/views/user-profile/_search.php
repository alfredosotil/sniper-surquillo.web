<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\UserProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-user-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\base\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true, 'placeholder' => 'Firstname']) ?>

    <?= $form->field($model, 'middlename')->textInput(['maxlength' => true, 'placeholder' => 'Middlename']) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true, 'placeholder' => 'Lastname']) ?>

    <?= $form->field($model, 'avatar_path')->textInput(['maxlength' => true, 'placeholder' => 'Avatar Path']) ?>

    <?php /* echo $form->field($model, 'avatar_base_url')->textInput(['maxlength' => true, 'placeholder' => 'Avatar Base Url']) */ ?>

    <?php /* echo $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'placeholder' => 'Phone Number']) */ ?>

    <?php /* echo $form->field($model, 'birthday')->textInput(['maxlength' => true, 'placeholder' => 'Birthday']) */ ?>

    <?php /* echo $form->field($model, 'total_points')->textInput(['placeholder' => 'Total Points']) */ ?>

    <?php /* echo $form->field($model, 'locale')->textInput(['maxlength' => true, 'placeholder' => 'Locale']) */ ?>

    <?php /* echo $form->field($model, 'gender')->textInput(['placeholder' => 'Gender']) */ ?>

    <?php /* echo $form->field($model, 'lock', ['template' => '{input}'])->textInput(['style' => 'display:none']); */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
