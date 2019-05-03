<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AppUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'App User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Input User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id_user',
            'username',
            // 'password',
            // 'id_level',
             [
                'attribute' => 'id_level',
                'header' => 'ID Level',
                'filter' => $listLevel,
                'value' => function ($data) {
                    $sql = "SELECT level.id_level, level.nama
                            FROM app_level level
                            WHERE level.id_level=" . $data->id_level;
                    $result = Yii::$app->db->createCommand($sql)->queryOne()["nama"];
                    return $result;
                },
            ],
            'id_petugas',
            'id_pegawai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
