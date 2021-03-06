<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EventCategory */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Event Category',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Event Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="event-category-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
