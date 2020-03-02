<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SubscriberNews */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Subscriber News',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Subscriber News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscriber-news-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
