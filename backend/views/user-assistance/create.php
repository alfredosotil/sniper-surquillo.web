<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserAssistance */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'User Assistance',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Assistances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-assistance-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
