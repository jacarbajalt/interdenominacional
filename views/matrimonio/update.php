<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Matrimonio $model */

$this->title = 'Matrimonio Id: ' . $model->idMatrimonio .'-'.' Folio '. $model->Folio;
$this->params['breadcrumbs'][] = ['label' => 'Matrimonios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idMatrimonio, 'url' => ['view', 'idMatrimonio' => $model->idMatrimonio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="matrimonio-update" style="color: white;">
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

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
