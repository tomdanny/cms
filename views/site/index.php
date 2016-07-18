<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Users Match';
$btnClass = 'btn btn-lg ';
$btnClass .= (date('s')%2) ? 'btn-warning' : 'btn-success';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to Users Match</h1>

        <p class="lead">Find your perfect match.</p>

        <p><?= Html::a('Find Your Match', '/users-data', ['class'=>$btnClass]);?></p>
    </div>

</div>
