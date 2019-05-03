<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AppInventarisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'App Inventaris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-inventaris-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Input Inventaris', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id_inventaris',
            'nama',
            // 'kondisi_baik',
            // 'kondisi_buruk',
            'jumlah',
            'keterangan',
            'date_created',
            'date_updated',
            // 'id_jenis',
             [
                'attribute' => 'id_jenis',
                'header' => 'ID Jenis',
                'filter' => $listJenis,
                'value' => function ($data) {
                    $sql = "SELECT jenis.id_jenis, jenis.nama
                            FROM app_jenis jenis
                            WHERE jenis.id_jenis=" . $data->id_jenis;
                    $result = Yii::$app->db->createCommand($sql)->queryOne()["nama"];
                    return $result;
                },
            ],
            // 'id_ruang',
             [
                'attribute' => 'id_ruang',
                'header' => 'Nama Ruang',
                'filter' => $listRuang,
                'value' => function ($data) {
                    $sql = "SELECT ruang.id_ruang, ruang.nama
                            FROM app_ruang ruang
                            WHERE ruang.id_ruang=" . $data->id_ruang;
                    $result = Yii::$app->db->createCommand($sql)->queryOne()["nama"];
                    return $result;
                },
            ],
            // 'id_petugas',
             [
                'attribute' => 'id_petugas',
                'header' => 'Petugas',
                'filter' => $listPetugas,
                'value' => function ($data) {
                    $sql = "SELECT petugas.id_petugas, petugas.nama
                            FROM app_petugas petugas
                            WHERE petugas.id_petugas=" . $data->id_petugas;
                    $result = Yii::$app->db->createCommand($sql)->queryOne()["nama"];
                    return $result;
                },
            ],
            'gambar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
