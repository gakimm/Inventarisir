<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppPeminjaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-peminjaman-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'date_borrow')->textInput(['readonly'=>true]) ?> -->

  	<?= $form->field($model, 'date_return')->textInput() ?> -->

    <?= $form->field($model, 'status')->dropDownList([''=>'','0' => 'Booked','1'=>'Borrowed','2'=>'Returned', '3' => 'canceled']) ?>

    <!-- <?= $form->field($model, 'id_pegawai')->dropDownList($listPegawai,['readonly'=>true]) ?> -->

    <!-- <?= $form->field($model, 'id_petugas')->dropDownList($listPetugas,['readonly'=>true,]) ?> -->

    <!-- <?= $form->field($model, 'id_inventaris')->dropDownList($listInventaris,['prompt'=>'','readonly'=>true]) ?> -->

    <!-- <?= $form->field($model, 'jumlah')->textInput(['readonly'=>true]) ?> -->


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
