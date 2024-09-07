<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Matrimonio $model */

$this->title = 'Registrar Matrimonio';
$this->params['breadcrumbs'][] = ['label' => 'Matrimonios', 'url' => ['index']];

?>
<div class="matrimonio-create" style="color: white;">

   

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