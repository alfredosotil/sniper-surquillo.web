<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Competitor */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="competitor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'team_id')->widget(
        \kartik\select2\Select2::class, [
        'data' => \yii\helpers\ArrayHelper::map(
            \common\models\Team::find()->all(),
            'id',
            'name'
        ),
        'options' => ['placeholder' => 'Select a Team ...'],
        'pluginOptions' => [
            'allowClear' => false
        ]
    ]) ?>

    <?php echo $form->field($model, 'picture')->widget(\trntv\filekit\widget\Upload::class, [
        'url' => ['avatar-upload']
    ]) ?>

    <?php echo $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'phone_number')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'prefix' => '+51 ',
                'groupSeparator' => ' ',
                'digits' => 9,
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

    <?php echo $form->field($model, 'total_points')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'max' => 10000000,
                'min' => 0,
                'rightAlign' => false
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'gender')->dropDownlist([
        \common\models\UserProfile::GENDER_FEMALE => Yii::t('backend', 'Female'),
        \common\models\UserProfile::GENDER_MALE => Yii::t('backend', 'Male')
    ]) ?>

    <?php echo $form->field($model, 'weight')->widget(
        \kartik\number\NumberControl::class, [
            'maskedInputOptions' => [
                'suffix' => ' kg',
                'digits' => 3,
                'max' => 500,
                'min' => 0,
                'rightAlign' => false
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'belt')->widget(
        \kartik\color\ColorInput::class, [
            'value' => 'white',
            'showDefaultPalette' => false,
            'size' => 'lg',
            'options' => ['placeholder' => 'Choose your belt ...', 'class' => 'text-center', 'readonly' => true],
            'pluginOptions' => [
                'showInput' => true,
                'showInitial' => true,
                'showPalette' => true,
                'showPaletteOnly' => true,
                'showSelectionPalette' => true,
                'togglePaletteOnly' => false,
                'hideAfterPaletteSelect' => true,
                'showAlpha' => false,
                'allowEmpty' => true,
                'preferredFormat' => 'name',
                'palette' => [
                    [
                        "white", "blue", "purple", "brown", "black", "red"
                    ]
                ]
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'division')->dropDownlist([
        \common\models\EventCategory::CHILDREN => Yii::t('backend', 'Children'),
        \common\models\EventCategory::ADULT => Yii::t('backend', 'Adult'),
        \common\models\EventCategory::MASTER => Yii::t('backend', 'Master'),
        \common\models\EventCategory::SPECIAL => Yii::t('backend', 'Special'),
    ]) ?>

    <?php echo $form->field($model, 'active')->widget(\kartik\checkbox\CheckboxX::class, [
        'autoLabel' => true,
        'pluginOptions' => ['threeState' => false]
    ])->label(false) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
