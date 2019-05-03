<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppJenis */

$this->title = 'Update App Jenis: ' . $model->id_jenis;
$this->params['breadcrumbs'][] = ['label' => 'App Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenis, 'url' => ['view', 'id' => $model->id_jenis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-jenis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
