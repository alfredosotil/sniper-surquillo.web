<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Team */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Team',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Teams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="team-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
