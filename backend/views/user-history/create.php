<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserHistory */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'User History',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-history-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
