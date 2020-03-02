<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Event */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Event',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
