<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OrderDetail */
?>
<div class="order-detail-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'class_id',
            'class_type',
            'order_id',
            'description',
            'price_per_unit',
            'price',
            'tax',
            'vat',
            'qty',
            'active',
            'uuid',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
