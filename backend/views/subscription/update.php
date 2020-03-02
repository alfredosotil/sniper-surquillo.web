<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subscription */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Subscription',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Subscriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="subscription-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
