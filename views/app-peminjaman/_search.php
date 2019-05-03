<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppPeminjamanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-peminjaman-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_peminjaman') ?>

    <?= $form->field($model, 'date_borrow') ?>

    <?= $form->field($model, 'date_return') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?php // echo $form->field($model, 'id_petugas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
