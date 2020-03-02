<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrderDetail */

?>
<div class="order-detail-create">
    <?= $this->render('//order-detail-ajax/_form', [
        'model' => $model,
    ]) ?>
</div>
