<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Congregante $model */

$this->title = 'Actualizar Datos: ' . $model->idCongregante;
$this->params['breadcrumbs'][] = ['label' => 'Congregantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCongregante, 'url' => ['view', 'idCongregante' => $model->idCongregante]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="congregante-update" style="color: white;">

    <h1><?= Html::encode($this->title) ?></h1>

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