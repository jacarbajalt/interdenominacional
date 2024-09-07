<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PresentacionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="presentacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPresentacion') ?>

    <?= $form->field($model, 'Nombre_presentado') ?>

    <?= $form->field($model, 'Apelli_Pat') ?>

    <?= $form->field($model, 'Apellido_Mat') ?>

    <?= $form->field($model, 'Edad') ?>

    <?php // echo $form->field($model, 'Municipio') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <?php // echo $form->field($model, 'Calle') ?>

    <?php // echo $form->field($model, 'No_Acta') ?>

    <?php // echo $form->field($model, 'CurpPres') ?>

    <?php // echo $form->field($model, 'Fecha_Regis') ?>

    <?php // echo $form->field($model, 'dia') ?>

    <?php // echo $form->field($model, 'mes') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'nombrePadre') ?>

    <?php // echo $form->field($model, 'apPaternoPadre') ?>

    <?php // echo $form->field($model, 'apMaternoPadre') ?>

    <?php // echo $form->field($model, 'OrigenPadre') ?>

    <?php // echo $form->field($model, 'EDAD_Padre') ?>

    <?php // echo $form->field($model, 'nombreMadre') ?>

    <?php // echo $form->field($model, 'apPaternoMadre') ?>

    <?php // echo $form->field($model, 'apMaternoMadre') ?>

    <?php // echo $form->field($model, 'OrigenMadre') ?>

    <?php // echo $form->field($model, 'EDAD_Madre') ?>

    <?php // echo $form->field($model, 'Folio') ?>

    <?php // echo $form->field($model, 'Congregante_idCongregante') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
