<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Subscription */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Subscription',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Subscriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscription-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
