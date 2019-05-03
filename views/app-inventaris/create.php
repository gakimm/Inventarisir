<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppInventaris */

$this->title = 'Input Inventaris';
$this->params['breadcrumbs'][] = ['label' => 'App Inventaris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-inventaris-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listJenis' => $listJenis,
        'listRuang' => $listRuang,
        'listPetugas' => $listPetugas,
    ]) ?>

</div>
