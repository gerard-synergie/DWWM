<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InvoiceItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_item')->textInput() ?>

    <?= $form->field($model, 'fk_part')->textInput() ?>

    <?= $form->field($model, 'fk_invoice')->textInput() ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'price_row')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
