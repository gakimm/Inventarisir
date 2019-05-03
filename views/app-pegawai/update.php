<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppPegawai */

$this->title = 'Update Pegawai ' . $model->id_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'App Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pegawai, 'url' => ['view', 'id' => $model->id_pegawai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-pegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
