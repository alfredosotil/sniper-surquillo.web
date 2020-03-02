<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Competitor */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Competitor',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Competitors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competitor-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
