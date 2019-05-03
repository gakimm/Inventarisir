<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppDetailPeminjaman */

$this->title = 'Detail Peminjaman';
$this->params['breadcrumbs'][] = ['label' => 'App Peminjaman', 'url' => ['app-peminjaman/', 'page' => Yii::$app->session['myPage']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-detail-peminjaman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listInventaris' => $listInventaris,
        'listPeminjaman' => $listPeminjaman,
        
    ]) ?>

</div>
