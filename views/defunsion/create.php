<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Defunsion $model */

$this->title = 'Registrar Defunción';
$this->params['breadcrumbs'][] = ['label' => 'Defunciones', 'url' => ['index']];

?>
<div class="defunsion-create">

  

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