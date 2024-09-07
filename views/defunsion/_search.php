<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DefunsionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="defunsion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idDefunsion') ?>

    <?= $form->field($model, 'Fecha_registro') ?>

    <?= $form->field($model, 'dia') ?>

    <?= $form->field($model, 'mes') ?>

    <?= $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'Nombre') ?>

    <?php // echo $form->field($model, 'apePat') ?>

    <?php // echo $form->field($model, 'apeMat') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'naciona') ?>

    <?php // echo $form->field($model, 'Fecha_Nacim') ?>

    <?php // echo $form->field($model, 'localidad') ?>

    <?php // echo $form->field($model, 'municipio') ?>

    <?php // echo $form->field($model, 'edad_Fallecid') ?>

    <?php // echo $form->field($model, 'Embarazada') ?>

    <?php // echo $form->field($model, 'domicilio_comp') ?>

    <?php // echo $form->field($model, 'estado_civil') ?>

    <?php // echo $form->field($model, 'Nombre_Conyuge') ?>

    <?php // echo $form->field($model, 'NomPadreCompl') ?>

    <?php // echo $form->field($model, 'NomMadreComp') ?>

    <?php // echo $form->field($model, 'nacioMadre') ?>

    <?php // echo $form->field($model, 'nacioPadre') ?>

    <?php // echo $form->field($model, 'nacioConyuge') ?>

    <?php // echo $form->field($model, 'Fecha_Defuncion') ?>

    <?php // echo $form->field($model, 'Lugar_Fallecido') ?>

    <?php // echo $form->field($model, 'Destino_cadaver') ?>

    <?php // echo $form->field($model, 'Nombre_Panteon') ?>

    <?php // echo $form->field($model, 'Ubica_Panteon') ?>

    <?php // echo $form->field($model, 'Certificado') ?>

    <?php // echo $form->field($model, 'Nom_declarante') ?>

    <?php // echo $form->field($model, 'edad_decla') ?>

    <?php // echo $form->field($model, 'Parentesco') ?>

    <?php // echo $form->field($model, 'Nacion_parie') ?>

    <?php // echo $form->field($model, 'Domi_Compl_Pa') ?>

    <?php // echo $form->field($model, 'ocupa_Dec') ?>

    <?php // echo $form->field($model, 'Telefono_decla') ?>

    <?php // echo $form->field($model, 'Nom_funeraria') ?>

    <?php // echo $form->field($model, 'Telefono_fune') ?>

    <?php // echo $form->field($model, 'Ciudad') ?>

    <?php // echo $form->field($model, 'Atenc_medica') ?>

    <?php // echo $form->field($model, 'ACTIVIDADES') ?>

    <?php // echo $form->field($model, 'Ocupacion') ?>

    <?php // echo $form->field($model, 'Escolaridad') ?>

    <?php // echo $form->field($model, 'solicitudes_idSolicitud') ?>

    <?php // echo $form->field($model, 'Folio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
