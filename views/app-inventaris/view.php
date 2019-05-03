<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AppInventaris */

$this->title = $model->id_inventaris;
$this->params['breadcrumbs'][] = ['label' => 'App Inventaris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="app-inventaris-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_inventaris], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_inventaris], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_inventaris',
            'nama',
            'kondisi_baik',
            'kondisi_buruk',
            'jumlah',
            'keterangan',
            'date_created',
            'date_updated',
            'id_jenis',
            'id_ruang',
            'id_petugas',
            'gambar',
        ],
    ]) ?>

</div>
