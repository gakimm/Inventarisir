<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppDetailPeminjaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-detail-peminjaman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_peminjaman')->dropDownList($listPeminjaman,['readonly'=>true]) ?>

    <?= $form->field($model, 'id_inventaris')->dropDownList($listInventaris,['prompt'=>'']) ?>

    <?= $form->field($model, 'jumlah')->textInput(['type'=>'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
