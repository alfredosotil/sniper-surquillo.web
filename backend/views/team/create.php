<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Team */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Team',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Teams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
