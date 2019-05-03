<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppPeminjaman */

$this->title = 'App Peminjaman';
$this->params['breadcrumbs'][] = ['label' => 'App Peminjaman', 'url' => ['index', 'page' => Yii::$app->session['myPage']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-peminjaman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listPegawai' => $listPegawai,
        'listPetugas' => $listPetugas,
      	'listInventaris' => $listInventaris,
    ]) ?>

</div>
