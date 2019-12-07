<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\base\GymDiscipline */

$this->title = Yii::t('app', 'Create Gym Discipline');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gym Disciplines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gym-discipline-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
