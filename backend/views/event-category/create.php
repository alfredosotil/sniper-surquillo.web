<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EventCategory */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Event Category',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Event Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-category-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
