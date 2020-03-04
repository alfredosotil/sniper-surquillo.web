<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'user_id')->widget(
        \kartik\select2\Select2::class,
        [
            'data' => \yii\helpers\ArrayHelper::map(
                \common\models\User::find()->all(),
                'id',
                'UsernameAndEmail'
            ),
            'options' => ['placeholder' => 'Select a User ...'],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]) ?>

    <?php echo $form->field($model, 'picture')->widget(\trntv\filekit\widget\Upload::class, [
        'url'=>['avatar-upload']
    ]) ?>

    <?php echo $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'locale')->dropDownlist(Yii::$app->params['availableLocales']) ?>

    <?php echo $form->field($model, 'gender')->dropDownlist([
        \common\models\UserProfile::GENDER_FEMALE => Yii::t('backend', 'Female'),
        \common\models\UserProfile::GENDER_MALE => Yii::t('backend', 'Male')
    ]) ?>

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

    <?php echo $form->field($model, 'stamina')->widget(
        \kartik\rating\StarRating::class, [
            'pluginOptions' => [
                'stars' => 10,
                'min' => 0,
                'max' => 100,
                'step' => 5,
                'defaultCaption' => '{rating} %',
                'starCaptionClasses' => [
                    0 => 'label label-danger badge-danger',
                    5 => 'label label-danger badge-danger',
                    10 => 'label label-danger badge-danger',
                    15 => 'label label-danger badge-danger',
                    20 => 'label label-danger badge-danger',
                    25 => 'label label-danger badge-danger',
                    30 => 'label label-warning badge-warning',
                    35 => 'label label-warning badge-warning',
                    40 => 'label label-warning badge-warning',
                    45 => 'label label-warning badge-warning',
                    50 => 'label label-info badge-info',
                    55 => 'label label-info badge-info',
                    60 => 'label label-info badge-info',
                    65 => 'label label-info badge-info',
                    70 => 'label label-primary badge-primary',
                    75 => 'label label-primary badge-primary',
                    80 => 'label label-primary badge-primary',
                    85 => 'label label-primary badge-primary',
                    90 => 'label label-success badge-success',
                    95 => 'label label-success badge-success',
                    100 => 'label label-success badge-success',
                ],
                'starCaptions' => new \yii\web\JsExpression("function(val){return val + ' %';}")
            ],
        ]
    ) ?>

    <?php echo $form->field($model, 'guard')->widget(
        \kartik\rating\StarRating::class, [
            'pluginOptions' => [
                'stars' => 10,
                'min' => 0,
                'max' => 100,
                'step' => 5,
                'defaultCaption' => '{rating} %',
                'starCaptionClasses' => [
                    0 => 'label label-danger badge-danger',
                    5 => 'label label-danger badge-danger',
                    10 => 'label label-danger badge-danger',
                    15 => 'label label-danger badge-danger',
                    20 => 'label label-danger badge-danger',
                    25 => 'label label-danger badge-danger',
                    30 => 'label label-warning badge-warning',
                    35 => 'label label-warning badge-warning',
                    40 => 'label label-warning badge-warning',
                    45 => 'label label-warning badge-warning',
                    50 => 'label label-info badge-info',
                    55 => 'label label-info badge-info',
                    60 => 'label label-info badge-info',
                    65 => 'label label-info badge-info',
                    70 => 'label label-primary badge-primary',
                    75 => 'label label-primary badge-primary',
                    80 => 'label label-primary badge-primary',
                    85 => 'label label-primary badge-primary',
                    90 => 'label label-success badge-success',
                    95 => 'label label-success badge-success',
                    100 => 'label label-success badge-success',
                ],
                'starCaptions' => new \yii\web\JsExpression("function(val){return val + ' %';}")
            ],
        ]
    ) ?>

    <?php echo $form->field($model, 'pass')->widget(
        \kartik\rating\StarRating::class, [
            'pluginOptions' => [
                'stars' => 10,
                'min' => 0,
                'max' => 100,
                'step' => 5,
                'defaultCaption' => '{rating} %',
                'starCaptionClasses' => [
                    0 => 'label label-danger badge-danger',
                    5 => 'label label-danger badge-danger',
                    10 => 'label label-danger badge-danger',
                    15 => 'label label-danger badge-danger',
                    20 => 'label label-danger badge-danger',
                    25 => 'label label-danger badge-danger',
                    30 => 'label label-warning badge-warning',
                    35 => 'label label-warning badge-warning',
                    40 => 'label label-warning badge-warning',
                    45 => 'label label-warning badge-warning',
                    50 => 'label label-info badge-info',
                    55 => 'label label-info badge-info',
                    60 => 'label label-info badge-info',
                    65 => 'label label-info badge-info',
                    70 => 'label label-primary badge-primary',
                    75 => 'label label-primary badge-primary',
                    80 => 'label label-primary badge-primary',
                    85 => 'label label-primary badge-primary',
                    90 => 'label label-success badge-success',
                    95 => 'label label-success badge-success',
                    100 => 'label label-success badge-success',
                ],
                'starCaptions' => new \yii\web\JsExpression("function(val){return val + ' %';}")
            ],
        ]
    ) ?>

    <?php echo $form->field($model, 'takedown')->widget(
        \kartik\rating\StarRating::class, [
            'pluginOptions' => [
                'stars' => 10,
                'min' => 0,
                'max' => 100,
                'step' => 5,
                'defaultCaption' => '{rating} %',
                'starCaptionClasses' => [
                    0 => 'label label-danger badge-danger',
                    5 => 'label label-danger badge-danger',
                    10 => 'label label-danger badge-danger',
                    15 => 'label label-danger badge-danger',
                    20 => 'label label-danger badge-danger',
                    25 => 'label label-danger badge-danger',
                    30 => 'label label-warning badge-warning',
                    35 => 'label label-warning badge-warning',
                    40 => 'label label-warning badge-warning',
                    45 => 'label label-warning badge-warning',
                    50 => 'label label-info badge-info',
                    55 => 'label label-info badge-info',
                    60 => 'label label-info badge-info',
                    65 => 'label label-info badge-info',
                    70 => 'label label-primary badge-primary',
                    75 => 'label label-primary badge-primary',
                    80 => 'label label-primary badge-primary',
                    85 => 'label label-primary badge-primary',
                    90 => 'label label-success badge-success',
                    95 => 'label label-success badge-success',
                    100 => 'label label-success badge-success',
                ],
                'starCaptions' => new \yii\web\JsExpression("function(val){return val + ' %';}")
            ],
        ]
    ) ?>

    <?php echo $form->field($model, 'submission')->widget(
        \kartik\rating\StarRating::class, [
            'pluginOptions' => [
                'stars' => 10,
                'min' => 0,
                'max' => 100,
                'step' => 5,
                'defaultCaption' => '{rating} %',
                'starCaptionClasses' => [
                    0 => 'label label-danger badge-danger',
                    5 => 'label label-danger badge-danger',
                    10 => 'label label-danger badge-danger',
                    15 => 'label label-danger badge-danger',
                    20 => 'label label-danger badge-danger',
                    25 => 'label label-danger badge-danger',
                    30 => 'label label-warning badge-warning',
                    35 => 'label label-warning badge-warning',
                    40 => 'label label-warning badge-warning',
                    45 => 'label label-warning badge-warning',
                    50 => 'label label-info badge-info',
                    55 => 'label label-info badge-info',
                    60 => 'label label-info badge-info',
                    65 => 'label label-info badge-info',
                    70 => 'label label-primary badge-primary',
                    75 => 'label label-primary badge-primary',
                    80 => 'label label-primary badge-primary',
                    85 => 'label label-primary badge-primary',
                    90 => 'label label-success badge-success',
                    95 => 'label label-success badge-success',
                    100 => 'label label-success badge-success',
                ],
                'starCaptions' => new \yii\web\JsExpression("function(val){return val + ' %';}")
            ],
        ]
    ) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
