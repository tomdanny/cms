<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Users Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'email:email',
            'gender',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
