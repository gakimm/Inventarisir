<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppUser */

$this->title = 'Input User';
$this->params['breadcrumbs'][] = ['label' => 'App User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listPetugas' => $listPetugas,
        'listLevel' => $listLevel,
        'listPegawai' => $listPegawai,
    ]) ?>

</div>
