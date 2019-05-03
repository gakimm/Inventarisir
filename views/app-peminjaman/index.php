<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AppPeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'App Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-peminjaman-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data Peminjaman', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id_peminjaman',
            'date_borrow',
            'date_return',
            // 'status',
            [
                'attribute' => 'status',
                'header' => 'Status',
                'filter' => ['1'=>'Borrowed','2'=>'Returned'],
                'value' =>  function ($data){
                        $hasil;
                        if ($data->status == '1') {
                            $hasil = "Borrowed";
                        }else if ($data->status == '2'){
                            $hasil = "Returned";
                        }else{
                            $hasil = " - ";
                        }
                        return $hasil;
                },
            ],
            // 'id_pegawai',
            [
                'attribute' => 'id_pegawai',
                'header' => 'Pegawai',
                'filter' => $listPegawai,
                'value' => function ($data) {
                    $sql = "SELECT pegawai.id_pegawai, pegawai.nama
                            FROM app_pegawai pegawai
                            WHERE pegawai.id_pegawai=" . $data->id_pegawai;
                    $result = Yii::$app->db->createCommand($sql)->queryOne()["nama" ];
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
                    $result = Yii::$app->db->createCommand($sql)->queryOne()["nama" ];
                    return $result;
                },
            ],

            [
                'attribute' => 'id_inventaris',
                'header' => 'Inventaris',
                'filter' => $listInventaris,
                'value' => function ($data) {
                    $sql = "SELECT inventaris.id_inventaris, inventaris.nama
                            FROM app_inventaris inventaris
                            WHERE inventaris.id_inventaris=" . $data->id_inventaris;
                    $result = Yii::$app->db->createCommand($sql)->queryOne()["nama" ];
                    return $result;
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => 
                    '{delete}{booked}',
                'buttons' => [

                    'booked' => function ($url, $model){
                        return Html::a('&nbsp;&nbsp;<span class=" btn btn-sm btn-primary text-warning glyphicon glyphicon-pencil"> Return</span>', $url, [
                            'title' => Yii::t('app','booked'),
                          ]);
                    },

                    'view' => function ($url, $model){
                        return Html::a('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),
                         ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'update'),
                          ]);
                    },
                     'delete' => function ($url, $model) {
                        return Html::a('&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"> </span>', $url, [
                            'title' => Yii::t('app', 'delete'),
                     ]);
                    }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='view?id='.$model->id_peminjaman;
                        return $url;
                    }

                    if ($action === 'update') {
                        $url ='update?id='.$model->id_peminjaman;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='delete?id='.$model->id_peminjaman;
                        return $url;
                    }

                    if ($action === 'booked') {
                        $url = 'update?id='.$model->id_peminjaman;
                        return $url;
                    }

                 }

            ],
        ],
    ]); ?>
</div>
