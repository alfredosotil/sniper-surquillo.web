<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\base\UserProfile */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'User Profile',
]). ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="user-profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
