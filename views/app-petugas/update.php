<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppPetugas */

$this->title = 'Update Petugas: ' . $model->id_petugas;
$this->params['breadcrumbs'][] = ['label' => 'App Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_petugas, 'url' => ['view', 'id' => $model->id_petugas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-petugas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
