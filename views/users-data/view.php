<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsersData */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$photoInfo = $model->PhotoInfo;
$photo = Html::img($photoInfo['url'],['alt'=>$photoInfo['alt']]);
$options = ['data-lightbox'=>'profile-image','data-title'=>$photoInfo['alt']];

?>
<div class="users-data-view">

    <h1><?= Html::encode($model->username) ?>'s Profile</h1>

    <figure>
        <?=Html::a($photo,$photoInfo['url'],$options)?>
        <figcaption>(Click to enlarge)</figcaption>
    </figure>

   <h2>Users Details</h2>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'first_name',
            'last_name',
            // 'email:email',
            'ProfileGender',
        ],
    ]) ?>

    <?php if (Yii::$app->user->can('updateUser',['user'=>$model])):?>

     <p>
        <?= Html::a('Update my Profile', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete my Profile', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php endif?>

</div>
