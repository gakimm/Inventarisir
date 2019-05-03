<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppPegawai */

$this->title = 'Input Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'App Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-pegawai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
