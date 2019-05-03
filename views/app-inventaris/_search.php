<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppInventarisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-inventaris-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_inventaris') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'kondisi_baik') ?>

    <?= $form->field($model, 'kondisi_buruk') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'date_updated') ?>

    <?php // echo $form->field($model, 'id_jenis') ?>

    <?php // echo $form->field($model, 'id_ruang') ?>

    <?php // echo $form->field($model, 'id_petugas') ?>

    <?php // echo $form->field($model, 'gambar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
