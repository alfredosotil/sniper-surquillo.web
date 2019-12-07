<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\base\UserAssistance */

$this->title = Yii::t('app', 'Create User Assistance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Assistances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-assistance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
