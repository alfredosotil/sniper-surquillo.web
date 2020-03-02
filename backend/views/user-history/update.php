<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserHistory */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'User History',
]) . ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="user-history-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
