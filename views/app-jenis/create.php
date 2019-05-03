<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppJenis */

$this->title = 'Input Jenis';
$this->params['breadcrumbs'][] = ['label' => 'App Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-jenis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
