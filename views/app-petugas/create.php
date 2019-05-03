<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppPetugas */

$this->title = 'Input Petugas';
$this->params['breadcrumbs'][] = ['label' => 'App Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-petugas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
