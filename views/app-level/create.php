<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppLevel */

$this->title = 'Input Level';
$this->params['breadcrumbs'][] = ['label' => 'myLabel', 'url' => ['index', 'page' => Yii::$app->session['myPage']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-level-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
