<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrderDetail */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Order Detail',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Order Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-detail-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
