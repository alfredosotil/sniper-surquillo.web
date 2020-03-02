<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $searchModel common\models\search\OrderDetailAjaxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$type_payment = [
    \common\models\Order::CASH => '<span class="label label-info">Cash</span>',
    \common\models\Order::CREDIT_CARD => '<span class="label label-info">Credit Card</span>',
    \common\models\Order::TRANSFER => '<span class="label label-info">Transfer</span>',
    \common\models\Order::YAPE => '<span class="label label-info">Yape</span>',
];
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user.UsernameAndEmail',
            'optional_client_name',
            [
                'label' => 'Amount',
                'value' => $model->amount . ' soles'
            ],
            'phone_number',
            'email:email',
            [
                'label' => 'Tax',
                'value' => $model->tax . ' %'
            ],
            [
                'label' => 'Is Paid',
                'format' => 'html',
                'value' => $model->is_paid == 1 ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>'
            ],
            [
                'label' => 'Type Payment',
                'format' => 'html',
                'value' => $type_payment[$model->type_payment],
            ],
            'annotations',
            'active:boolean',
            'uuid',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>

<?php echo \common\widgets\barcode\BarcodeGenerator::widget([
    'elementId' => 'showBarcode', /* div or canvas id*/
    'value' => $model->uuid, /* value for EAN 13 be careful to set right values for each barcode type */
    'type' => 'code128',/*supported types  ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix*/
]) ?>

<div id="showBarcode"></div>

<div class="order-detail-view">
    <?php echo $this->render('//order-detail-ajax/index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]) ?>
</div>
