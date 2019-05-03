<?php

use yii as YII;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\AppPeminjaman as AP;


/* @var $this yii\web\View */
/* @var $model app\models\AppPeminjaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-peminjaman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_borrow')->textInput(['readonly'=>true]) ?>

    <!-- <?= $form->field($model, 'date_return')->textInput() ?> -->

    <?php 
    $sql = "SELECT status from app_peminjaman where id_peminjaman = " . YII::$app->request->get('page');
    $data = YII::$app->db->createCommand($sql)->queryAll;

    echo "<pre>";
    print_r($data);die();
   
    ?>
    <!-- <?= $form->field($model, 'id_pegawai')->dropDownList($status,['prompt'=>'']) ?> -->

    <?= $form->field($model, 'id_pegawai')->dropDownList($listPegawai,['prompt'=>'']) ?>

    <?= $form->field($model, 'id_petugas')->dropDownList($listPetugas,['readonly'=>true,]) ?>

    <?= $form->field($model, 'id_inventaris')->dropDownList($listInventaris,['prompt'=>'']) ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <!-- <?= $form->field($model, 'barang_rusak')->textInput() ?> -->


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
