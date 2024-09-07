<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Presentacion $model */

$this->title = 'Actualizar datos: ' . $model->idPresentacion .' '. $model->Nombre_presentado .' '. $model->Apelli_Pat.' '. $model->Apellido_Mat;
$this->params['breadcrumbs'][] = ['label' => 'Presentaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPresentacion, 'url' => ['view', 'idPresentacion' => $model->idPresentacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="presentacion-update">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<style>
  
  nav a:hover {
      background-color: #00324b;
      color: #fff;
      border-top-color: #65bce8;
  }
  
  nav a:active {
      border-top-color: #f90;
      background: #f90;
      color: #00324b;
  }
  </style>