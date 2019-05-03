<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AppPeminjaman */

$this->title = $model->id_peminjaman;
$this->params['breadcrumbs'][] = ['label' => 'App Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="app-peminjaman-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_peminjaman], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_peminjaman], [
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
            'id_peminjaman',
            'date_borrow',
            'date_return',
            [
                'attribute' => 'status',
                'header' => 'Status',
                'filter' => ['0'=>'Uncomplete','1'=>'Borrowed','2'=>'Returned','3'=>'Canceled'],
                'value' =>  function ($data){
                        $hasil;
                        if ($data->status == '0') {
                            $hasil = "booked";
                        }elseif ($data->status == '1') {
                            $hasil = "Borrowed";
                        }elseif ($data->status == '2') {
                            $hasil = "Returned";
                        }else{
                            $hasil = "Canceled";
                        }
                        return $hasil;
                },
            ],
            [
                'attribute' => 'id_pegawai',
                'header' => 'ID Pegawai',
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
                'header' => 'ID Petugas',
                'filter' => $listPetugas,
                'value' => function ($data) {
                    $sql = "SELECT petugas.id_petugas, petugas.nama
                            FROM app_petugas petugas
                            WHERE petugas.id_petugas=" . $data->id_petugas;
                    $result = Yii::$app->db->createCommand($sql)->queryOne()["nama" ];
                    return $result;
                },
            ],
        ],
    ]) ?>

</div>
