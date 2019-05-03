<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppInventaris */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-inventaris-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'kondisi_baik')->textInput() ?> -->

    <!-- <?= $form->field($model, 'kondisi_buruk')->textInput() ?> -->

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_created')->textInput(['readonly'=>true]) ?>

    <!-- <?= $form->field($model, 'date_updated')->textInput() ?> -->

    <?= $form->field($model, 'id_jenis')->dropDownList($listJenis,['prompt'=>'']) ?>

    <?= $form->field($model, 'id_ruang')->dropDownList($listRuang,['prompt'=>'']) ?>

    <?= $form->field($model, 'id_petugas')->dropDownList($listPetugas,['prompt'=>'']) ?>

    <?= $form->field($model, 'gambar')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
