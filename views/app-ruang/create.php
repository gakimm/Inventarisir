<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppRuang */

$this->title = 'Input Ruang';
$this->params['breadcrumbs'][] = ['label' => 'App Ruang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-ruang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
