<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\base\UserProfile */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'User Profile').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'user.id',
                'label' => Yii::t('app', 'User')
            ],
        'firstname',
        'middlename',
        'lastname',
        'avatar_path',
        'avatar_base_url:url',
        'phone_number',
        'birthday',
        'total_points',
        'locale',
        'gender',
        ['attribute' => 'lock', 'visible' => false],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
