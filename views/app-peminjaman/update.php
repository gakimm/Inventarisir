<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppPeminjaman */

$this->title = 'Setujui  ID  : ' . $model->id_peminjaman;
$this->params['breadcrumbs'][] = ['label' => 'App Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_peminjaman, 'url' => ['view', 'id' => $model->id_peminjaman]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-peminjaman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listPegawai' => $listPegawai,
        'listPetugas' => $listPetugas,
        'listInventaris' => $listInventaris,
    ]) ?>

</div>
