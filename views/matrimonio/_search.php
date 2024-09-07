<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MatrimonioSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="matrimonio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idMatrimonio') ?>

    <?= $form->field($model, 'Fecha_Registro') ?>

    <?= $form->field($model, 'dia') ?>

    <?= $form->field($model, 'mes') ?>

    <?= $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'solicitudes_idSolicitud') ?>

    <?php // echo $form->field($model, 'nombreNovio') ?>

    <?php // echo $form->field($model, 'apPaternoNovio') ?>

    <?php // echo $form->field($model, 'apMaternoNovio') ?>

    <?php // echo $form->field($model, 'edadNovio') ?>

    <?php // echo $form->field($model, 'curpNovio') ?>

    <?php // echo $form->field($model, 'direccionNovio') ?>

    <?php // echo $form->field($model, 'coloniaNovio') ?>

    <?php // echo $form->field($model, 'cPostalNovio') ?>

    <?php // echo $form->field($model, 'estadoNovio') ?>

    <?php // echo $form->field($model, 'Padre_Novio') ?>

    <?php // echo $form->field($model, 'Domici_Padre') ?>

    <?php // echo $form->field($model, 'Madre_novio') ?>

    <?php // echo $form->field($model, 'Domic_MadreNov') ?>

    <?php // echo $form->field($model, 'nombreNovia') ?>

    <?php // echo $form->field($model, 'apPaternoNovia') ?>

    <?php // echo $form->field($model, 'apMaternoNovia') ?>

    <?php // echo $form->field($model, 'edadNovia') ?>

    <?php // echo $form->field($model, 'curpNovia') ?>

    <?php // echo $form->field($model, 'direccionNovia') ?>

    <?php // echo $form->field($model, 'coloniaNovia') ?>

    <?php // echo $form->field($model, 'cPostalNovia') ?>

    <?php // echo $form->field($model, 'estadoNovia') ?>

    <?php // echo $form->field($model, 'Padre_Novia') ?>

    <?php // echo $form->field($model, 'Domic_Pa_Novia') ?>

    <?php // echo $form->field($model, 'Madre_novia') ?>

    <?php // echo $form->field($model, 'Domic_Ma_Novia') ?>

    <?php // echo $form->field($model, 'numActaMatCivil') ?>

    <?php // echo $form->field($model, 'municipioMatCivil') ?>

    <?php // echo $form->field($model, 'diaMatCivil') ?>

    <?php // echo $form->field($model, 'mesMatCivil') ?>

    <?php // echo $form->field($model, 'anioMatCivil') ?>

    <?php // echo $form->field($model, 'Folio') ?>

    <?php // echo $form->field($model, 'Congregante_idCongregante') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
