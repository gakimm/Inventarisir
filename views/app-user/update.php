<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppUser */

$this->title = 'Update User: ' . $model->id_user;
$this->params['breadcrumbs'][] = ['label' => 'App User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_user, 'url' => ['view', 'id' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listPetugas' => $listPetugas,
        'listLevel' => $listLevel,
        'listPegawai' =>$listPegawai,
    ]) ?>

</div>
