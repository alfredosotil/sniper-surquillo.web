<?php

use common\models\UserProfile;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = Yii::t('backend', 'Edit profile')
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin() ?>

    <?php echo $form->field($model, 'picture')->widget(\trntv\filekit\widget\Upload::class, [
        'url'=>['avatar-upload']
    ]) ?>

    <?php echo $form->field($model, 'firstname')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'middlename')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'lastname')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'locale')->dropDownlist(Yii::$app->params['availableLocales']) ?>

    <?php echo $form->field($model, 'gender')->dropDownlist([
        UserProfile::GENDER_FEMALE => Yii::t('backend', 'Female'),
        UserProfile::GENDER_MALE => Yii::t('backend', 'Male')
    ]) ?>

    <?php echo $form->field($model, 'total_points')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'max' => 10000000,
                'min' => 0,
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

    <?php echo $form->field($model, 'birthday')->widget(
        \kartik\datecontrol\DateControl::class, [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'ajaxConversion' => true,
        'autoWidget' => true,
        'displayFormat' => 'php:d-F-Y h:i:s A',
        'saveFormat' => 'php:U',
        'readonly' => true,
        'widgetOptions' => [
            'pluginOptions' => [
                'autoclose' => true,
                'todayHighlight' => true,
                'todayBtn' => true,
            ]
        ],
    ]) ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end() ?>

</div>
