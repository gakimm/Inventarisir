<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
// use yii\helper\UrlHelper;

/* @var $this yii\web\View */
/* @var $model app\models\AppDetailPeminjaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="model-detail-peminjaman-form" id="modelContent">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_peminjaman')->dropDownList($listPeminjaman,['readonly'=>true]) ?>

    <?= $form->field($model, 'id_inventaris')->dropDownList($listInventaris,['prompt'=>'']) ?>

    <!-- <?= $form->field($model, 'jumlah')->textInput(['type'=>'number','maxlength'=> $jmlInventaris]) ?> -->

    <div class="form-group">
        <?= Html::a('Next',['id_peminjaman=<?= $_POST[id_peminjaman] ?>&id_inventaris =<?= $_POST[id_inventaris]?>'], ['class' => 'btn btn-success'],['id'=>'modelButton']) ?>
    </div>
    	<?php
    		Modal::begin([
            'header' => '<h4>Detail Pinjam</h4>',
            'id'     => 'model',
            'size'   => 'model-lg',
    		]);
    
    		echo "<div id='modelContent'></div>";
    
    		Modal::end();
    	 ?>
    <?php ActiveForm::end(); ?>

</div>
