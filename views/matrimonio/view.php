<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Matrimonio $model */

$this->title = 'Matrimonio Id:' . $model->idMatrimonio .'-'.' Folio '. $model->Folio;
$this->params['breadcrumbs'][] = ['label' => 'Matrimonios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
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
<div class="matrimonio-view" style="color: white;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
   
    
        <button class="button">  <?= Html::a('<i class="fa fa-undo" aria-hidden="true"></i>Actualizar',  ['update', 'idMatrimonio' => $model->idMatrimonio], ['class' => '']) ?></button> 
      
         <button class="fill">  <?= Html::a('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generar Acta', ['view-pdf', 'id' => $model->idMatrimonio], ['class' => '']) ?></button> 
         <button class="btnfos btnfos-5"><?= Html::a('Realizar Busqueda', ['index2'], ['class' => '']) ?></button> 
  

    
   
  <style>
    
.btnfos-5 {
  border: 0 solid;
  box-shadow: inset 0 0 20px white;
  outline: 1px solid;
  outline-color: rgba(255, 255, 255, 0);
  outline-offset: 0px;
  text-shadow: none;
  -webkit-transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
          transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
  outline-color: rgba(255, 255, 255, 0.5);
  outline-offset: 0px;
}

.btnfos-5:hover {
  border: 1px solid;
  box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
  outline-offset: 15px;
  outline-color: rgba(255, 255, 255, 0);
  text-shadow: 1px 1px 2px #427388;
}
    
  
  </style>
    
        </p>
    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idMatrimonio',
            'Fecha_Registro',
           // 'solicitudes_idSolicitud',
            [
                'attribute' => 'solicitud.Solicitud',
                'label' => 'Solicitud',
            ],
            'nombreNovio',
            'apPaternoNovio',
            'apMaternoNovio',
            'edadNovio',
            'curpNovio',
            'direccionNovio',
            'coloniaNovio',
            'cPostalNovio',
            'estadoNovio',
            'Padre_Novio',
            'Domici_Padre',
            'Madre_novio',
            'Domic_MadreNov',
            'nombreNovia',
            'apPaternoNovia',
            'apMaternoNovia',
            'edadNovia',
            'curpNovia',
            'direccionNovia',
            'coloniaNovia',
            'cPostalNovia',
            'estadoNovia',
            'Padre_Novia',
            'Domic_Pa_Novia',
            'Madre_novia',
            'Domic_Ma_Novia',
            'numActaMatCivil',
            'municipioMatCivil',
            'diaMatCivil',
            'mesMatCivil',
            'anioMatCivil',
            'Folio',
           // 'Congregante_idCongregante',
            [
                'attribute' => 'Congregante_idCongregante',
                'value' => $model->congregante ? $model->congregante->Nombre_Con : 'No asignado',
                'label' => 'Nombre del Congregante',
            ],
        ],
        'options' => [
            'class' => 'table table-bordered detail-view', // Agregar la clase 'table-bordered' para bordes y 'detail-view' para estilos base
        ],
    ]) ?>

</div>
<br><br>
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
    color: black; /* Color del texto para las filas pares */
}

.detail-view > tbody > tr:nth-child(even) {
    background-color: black; /* Color de fondo para las filas pares */
    color: white; /* Color del texto para las filas pares */
}
tr:hover td { background-color: #45637d; }

tr:hover th { background-color: #45637d; }

.secondary {background-image: linear-gradient(to right, #6c757d, #adb5bd);} 
.secondary:hover {background-image: linear-gradient(to right, #848b92, #adb5bd);}

  </style>
  
<style>
/* Animate the size, inside */
.fill:hover,
.fill:focus {
  box-shadow: inset 0 0 0 2em var(--hover);
  
}

/* Animate the size, outside */
.pulse:hover, 
.pulse:focus {
  animation: pulse 1s;
  box-shadow: 0 0 0 2em transparent;
}

@keyframes pulse {
  0% { box-shadow: 0 0 0 0 var(--hover); }
}



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
