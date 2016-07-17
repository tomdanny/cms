<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsersData */

$this->title = 'Create Users Data';
$this->params['breadcrumbs'][] = ['label' => 'Users Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
