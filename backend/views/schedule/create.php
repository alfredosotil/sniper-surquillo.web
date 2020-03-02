<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Schedule */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Schedule',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
