<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_level')->dropDownList($listLevel,['prompt'=>'']) ?>

    <?= $form->field($model, 'id_petugas')->dropDownList($listPetugas,['prompt'=>'']) ?>

    <?= $form->field($model, 'id_pegawai')->dropDownList($listPegawai,['prompt'=>'']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
