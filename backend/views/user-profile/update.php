<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'User Profile',
]) . ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="user-profile-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
