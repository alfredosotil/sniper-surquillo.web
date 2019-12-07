<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\base\UserProfile */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

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

    <?= $form->field($model, 'avatar_base_url')->textInput(['maxlength' => true, 'placeholder' => 'Avatar Base Url']) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'placeholder' => 'Phone Number']) ?>

    <?= $form->field($model, 'birthday')->textInput(['maxlength' => true, 'placeholder' => 'Birthday']) ?>

    <?= $form->field($model, 'total_points')->textInput(['placeholder' => 'Total Points']) ?>

    <?= $form->field($model, 'locale')->textInput(['maxlength' => true, 'placeholder' => 'Locale']) ?>

    <?= $form->field($model, 'gender')->textInput(['placeholder' => 'Gender']) ?>

    <?= $form->field($model, 'lock', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton(Yii::t('app', 'Save As New'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
