<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppDetailPeminjaman */

$this->title = 'Update Detail Peminjaman: ' . $model->id_detail_peminjaman;
$this->params['breadcrumbs'][] = ['label' => 'App Detail Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detail_peminjaman, 'url' => ['view', 'id' => $model->id_detail_peminjaman]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-detail-peminjaman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listInventaris' => $listInventaris,
        'listPeminjaman' => $listPeminjaman,
    ]) ?>

</div>
