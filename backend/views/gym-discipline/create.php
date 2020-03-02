<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GymDiscipline */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Gym Discipline',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Gym Disciplines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gym-discipline-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
