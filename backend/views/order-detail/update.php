<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderDetail */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Order Detail',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Order Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="order-detail-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
