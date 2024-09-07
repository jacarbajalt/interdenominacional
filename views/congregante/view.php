<?php
use yii\helpers\Url;

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Congregante $model */

$this->title = $model->idCongregante;
$this->params['breadcrumbs'][] = ['label' => 'Congregantes', 'url' => ['index']];

\yii\web\YiiAsset::register($this);
?>
<h1 style="color: white;">Congregante</h1>
<div class="congregante-view">


   <br>

    <p>
   
    
        <button class="button"> <?= Html::a('<i class="fa fa-undo" aria-hidden="true"></i>Actualizar', ['update', 'idCongregante' => $model->idCongregante], ['class' => '']) ?></button> 
        <button class="button_slide slide_diagonal"><?= Html::a('<i class="fas fa-times-circle"></i> Eliminar', ['delete', 'idCongregante' => $model->idCongregante], [
            'class' => '',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?></button> 
    </p>

    <div class="table-responsive">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCongregante',
            'Nombre_Con',
            'Apellido_Pat',
            'Apellido_Mat',
            'Padres',
            'Minis_Act',
            'Estado_civil',
            'Curp',
            'Fecha_registro',
            'edad',
            'Comentarios',
        ],
        'options' => [
            'class' => 'table table-bordered detail-view', // Agregar la clase 'table-bordered' para bordes y 'detail-view' para estilos base
        ],
    ]) ?>

</div>
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
  .detail-view > tbody > tr:nth-child(odd) {
    background-color: white; /* Color de fondo para las filas impares */
}

.detail-view > tbody > tr:nth-child(even) {
    background-color: black; /* Color de fondo para las filas pares */
    color: white; /* Color del texto para las filas pares */
}
tr:hover td { background-color: #45637d; }

tr:hover th { background-color: #45637d; }

  </style>

  
<style>





/* And from the left */
.slide:hover,
.slide:focus {
  box-shadow: inset 20.5em 0 0 0 var(--hover);
}



/*=== Set button colors */
.fill {
  --color: #a972cb;
  --hover: hsl(285, 45%, 61%);
}



.slide {
  --color: #8fc866;
  --hover: hsl(92, 47%, 72%);
}



/* Now every button will have different colors as set above. We get to use the same structure, only changing the custom properties. */
button {  
  color: var(--color);
  transition: 0.25s;
}

button:hover,
button:focus { 
  border-color: var(--hover);
  color: #fff;
}


/* Basic button styles */
button {
  background: none;
  border: 2px solid;
  font: inherit;
  line-height: 1;
  margin: 0.5em;
  padding: 1em 1em;
}




@keyframes shine {
  from {
    opacity: 0;
    left: 0%;
  }
  50% {
    opacity: 1;
  }
  to {
    opacity: 0;
    left: 100%;
  }
}

.button {
  text-decoration: none;
  text-transform: uppercase;
  font-family: 'Exo 2', sans-serif;
 
  
  display: inline-block;
  position: relative;
  text-align: center;
  color: var(--col-primary);
  border: 1px solid var(--col-primary);
 
  

  padding-left: 3em;
  padding-right: 3em;
  
  box-shadow: 0 0 0 0 transparent;
  transition: all 0.2s ease-in;
}

.button:hover {
  color: white;
  box-shadow: 0 0 30px 0 rgba(var(--col-primary-rgb), 0.5);
  background-color: var(--col-primary);
  transition: all 0.2s ease-out;
}

.button:hover:before {
  animation: shine 0.5s 0s linear;
}

.button:active {
  box-shadow: 0 0 0 0 transparent;
  transition: box-shadow 0.2s ease-in;
}

.button:before {
  content: '';
  display: block;
  width: 0px;
  height: 86%;
  position: absolute;
  top: 7%;
  left: 0%;
  opacity: 0;
  background: white;
  box-shadow: 0 0 15px 3px white;
  transform: skewX(-20deg);
}
:root {
  --col-primary: #3498db; /* ejemplo de color primario */
  --col-primary-rgb: 52, 152, 219; /* RGB del color primario */
  --corner-radius: 5px; /* ejemplo de radio de esquina */
}

.button_slide {
    color: #dc3545;
    border: 2px solid #dc3545;
    border-radius: 0px;
    padding: 15px 30px; /* Reduce the padding */
    display: inline-block;
    font-family: "Lucida Console", Monaco, monospace;
    font-size: 14px; /* Adjust font size */
    letter-spacing: 1px;
    cursor: pointer;
    box-shadow: inset 0 0 0 0  #dc3545;
    -webkit-transition: ease-out 0.4s;
    -moz-transition: ease-out 0.4s;
    transition: ease-out 0.4s;
}

.slide_diagonal:hover {
    box-shadow: inset 200px 30px 0 0  #dc3545; /* Adjust the box-shadow for a smaller button */
}

</style>
