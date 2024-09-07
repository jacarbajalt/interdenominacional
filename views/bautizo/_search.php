<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/** @var yii\web\View $this */
/** @var app\models\BautizoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bautizo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idBautizo') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apPaterno') ?>

    <?= $form->field($model, 'apMaterno') ?>

    <?= $form->field($model, 'Domicilio') ?>

   
    <?php // echo $form->field($model, 'estadoCivil') ?>

    <?php // echo $form->field($model, 'casadoIgles') ?>

    <?php // echo $form->field($model, 'BautizadoIglesEva') ?>

    <?php // echo $form->field($model, 'Denominacion') ?>

    <?php // echo $form->field($model, 'asisteIgles') ?>

    <?php // echo $form->field($model, 'Nacionalidad') ?>

    <?php // echo $form->field($model, 'Ocupacion') ?>

    <?php // echo $form->field($model, 'edad') ?>

    <?php // echo $form->field($model, 'NomTestigo1') ?>

    <?php // echo $form->field($model, 'NomTestigo2') ?>

    <?php // echo $form->field($model, 'DomicilioTes1') ?>

    <?php // echo $form->field($model, 'DomicilioTes2') ?>

    <?= $form->field($model, 'Fecha_registro') ?>

<?= $form->field($model, 'fecha_dia') ?>

<?= $form->field($model, 'fecha_mes')->dropDownList([
    '' => 'Todos los meses',
    '1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo',
    '4' => 'Abril', '5' => 'Mayo', '6' => 'Junio',
    '7' => 'Julio', '8' => 'Agosto', '9' => 'Septiembre',
    '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre',
], ['prompt' => 'Seleccione el mes']) ?>

<?= $form->field($model, 'fecha_ano') ?>

    <?php // echo $form->field($model, 'Folio') ?>

    <?php // echo $form->field($model, 'solicitudes_idSolicitud') ?>

    <?php // echo $form->field($model, 'Congregante_idCongregante') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
