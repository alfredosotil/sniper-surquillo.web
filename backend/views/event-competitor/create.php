<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EventCompetitor */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Event Competitor',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Event Competitors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-competitor-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
