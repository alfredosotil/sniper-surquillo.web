<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'User Profiles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'User Profile',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'firstname',
            'middlename',
            'lastname',
            'avatar_path',
            // 'avatar_base_url:url',
            // 'phone_number',
            // 'birthday',
            // 'total_points',
            // 'locale',
            // 'gender',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
