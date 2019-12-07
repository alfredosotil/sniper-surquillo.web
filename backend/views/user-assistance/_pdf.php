<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\base\UserAssistance */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Assistances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-assistance-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'User Assistance').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'user.id',
                'label' => Yii::t('app', 'User')
            ],
        [
                'attribute' => 'gymDiscipline.id',
                'label' => Yii::t('app', 'Gym Discipline')
            ],
        ['attribute' => 'lock', 'visible' => false],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
