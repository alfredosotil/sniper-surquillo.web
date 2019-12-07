<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\base\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Order').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'user.id',
            'label' => Yii::t('app', 'User'),
        ],
        'optional_client_name',
        'amount',
        'phone_number',
        'email:email',
        'tax',
        'is_paid',
        'type_payment',
        'notes',
        'is_active',
        ['attribute' => 'lock', 'visible' => false],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'auth_key',
        'access_token',
        'password_hash',
        'oauth_client',
        'oauth_client_user_id',
        'email:email',
        'type',
        'status',
        'logged_at',
    ];
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);
    ?>
    
    <div class="row">
<?php
if($providerOrderDetail->totalCount){
    $gridColumnOrderDetail = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            'class_id',
            'class_type',
                        'description',
            'price_per_unit',
            'price',
            'tax',
            'vat',
            'qty',
            'is_active',
            ['attribute' => 'lock', 'visible' => false],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerOrderDetail,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-order-detail']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Order Detail')),
        ],
        'columns' => $gridColumnOrderDetail
    ]);
}
?>

    </div>
</div>
