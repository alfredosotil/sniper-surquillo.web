<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'User Profile',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
