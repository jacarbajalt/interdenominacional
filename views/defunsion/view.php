<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4;
/** @var yii\web\View $this */
/** @var app\models\Defunsion $model */

$this->title = $model->idDefunsion .' '. $model->Nombre . ' ' .$model->apePat. ' ' .$model->apeMat;
$this->params['breadcrumbs'][] = ['label' => 'Defunsiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="defunsion-view"  style="color: white;">

    <h1><?= Html::encode($this->title) ?></h1>
    
<div class="buttons">
  
  
  
        
      
       
         

       <button class="button" ><?= Html::a('<i class="fa fa-undo" aria-hidden="true"></i> Actualizar', ['update', 'idDefunsion' => $model->idDefunsion], ['class' => ' ']) ?></button>
    
  

              
  <?php
    // Verificar el valor de la columna "Embarazada"
    $embarazada = $model->Embarazada;

    // Determinar si se debe deshabilitar el botón "Embarazada"
    $disableEmbarazada = $embarazada == 'No' || $embarazada == '-----' ? 'disabled' : '';

    // Verificar el valor de la columna "Embarazada" para el botón "Casado/No casado"
    $disableCasadoSoltero = $embarazada == 'Si' || $embarazada == '-----' ? 'disabled' : '';

    // Determinar si se deben deshabilitar los botones "Niño/a" y "Casado/No casado" según la edad
    $edad = $model->edad_Fallecid;
    $years = 0;

    // Convertir la edad a años
    if (strpos($edad, 'año') !== false) {
        if (preg_match('/(\d+) año/', $edad, $matches)) {
            $years = (int)$matches[1];
        }
    }

    // Determinar si se debe deshabilitar el botón "Niño/a"
    $disableNiño = $years >= 18 || $embarazada == '---' ? 'disabled' : '';

    // Crear los enlaces de los botones
    $buttons = [                                                                                               
   
        '<button class="fill" ' . $disableNiño . '>' . Html::a('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generar Acta Niño/a', ['view-pdf-nino', 'id' => $model->idDefunsion], ['class' => ' ']) . '</button>',
        '<button class="up" ' . $disableEmbarazada . '>' . Html::a('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generar Acta Embarazada', ['view-pdf-joven', 'id' => $model->idDefunsion], ['class' => '']) . '</button>',
        '<button class="slide" ' . $disableCasadoSoltero . '>' . Html::a('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generar Acta Casado/No casado', ['view-pdf', 'id' => $model->idDefunsion], ['class' => ' ']) . '</button>'
    ];

    // Convertir los botones en una cadena separada por espacios
    $buttonsHtml = implode(' ', $buttons);

    echo $buttonsHtml;
?>
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
</div>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idDefunsion',
            'Fecha_registro',
            'Nombre',
            'apePat',
            'apeMat',
            'sexo',
            'naciona',
            'Fecha_Nacim',
            'localidad',
            'municipio',
            'edad_Fallecid',
            'Embarazada',
            'domicilio_comp',
            'estado_civil',
            'Nombre_Conyuge',
            'NomPadreCompl',
            'NomMadreComp',
            'nacioMadre',
            'nacioPadre',
            'nacioConyuge',
            'Fecha_Defuncion',
            'Lugar_Fallecido',
            'Destino_cadaver',
            'Nombre_Panteon',
            'Ubica_Panteon',
            'Certificado',
            'Nom_declarante',
            'edad_decla',
            'Parentesco',
            'Nacion_parie',
            'Domi_Compl_Pa',
            'ocupa_Dec',
            'Telefono_decla',
            'Nom_funeraria',
            'Telefono_fune',
            'Ciudad',
            'Atenc_medica',
            'ACTIVIDADES',
            'Ocupacion',
            'Escolaridad',
            //'solicitudes_idSolicitud',
           
          [
            'attribute' => 'solicitud.Solicitud',
            'label' => 'Solicitud',
        ],
            'Folio',
        ],
        'options' => [
            'class' => 'table table-bordered detail-view', // Agregar la clase 'table-bordered' para bordes y 'detail-view' para estilos base
        ],
    ]) ?>
    <br><br>

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
    color: black; /* Color del texto para las filas pares */
}

.detail-view > tbody > tr:nth-child(even) {
    background-color: black; /* Color de fondo para las filas pares */
    color: white; /* Color del texto para las filas pares */
}
tr:hover td { background-color: #45637d; }

tr:hover th { background-color: #45637d; }

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

/* Stack multiple shadows, one from the left, the other from the right */
.close:hover,
.close:focus {
  box-shadow: 
    inset -3.5em 0 0 0 var(--hover),
    inset 3.5em 0 0 0 var(--hover);  
}

/* Size can also be negative; see how it's smaller than the element */
.raise:hover,
.raise:focus {
  box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
  transform: translateY(-0.25em);
}

/* Animating from the bottom */
.up:hover,
.up:focus {
  box-shadow: inset 0 -3.25em 0 0 var(--hover);
}

/* And from the left */
.slide:hover,
.slide:focus {
  box-shadow: inset 20.5em 0 0 0 var(--hover);
}

/* Multiple shadows, one on the outside, another on the inside */
.offset {  
  box-shadow: 
    0.3em 0.3em 0 0 var(--color),
    inset 0.3em 0.3em 0 0 var(--color);
}
.offset:hover,
.offset:focus {
  box-shadow: 
    0 0 0 0 var(--hover),
    inset 6em 3.5em 0 0 var(--hover);
}

/*=== Set button colors */
.fill {
  --color: #a972cb;
  --hover: hsl(285, 45%, 61%);
}

.pulse {
  --color: #ef6eae;
  --hover: hsl(338, 80%, 78%);
}

.close {
  --color: #ff7f82;
  --hover: hsl(1, 100%, 73%);
}

.raise {
  --color: #ffa260;
  --hover: hsl(33, 100%, 74%);
}

.up {
  --color: #e4cb58;
  --hover: hsl(50, 73%, 66%);
}

.slide {
  --color: #8fc866;
  --hover: hsl(92, 47%, 72%);
}

.offset {
  --color: #19bc8b;
  --hover: hsl(163, 80%, 61%);
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


code { 
  color: #e4cb58;
  font: inherit;
}
</style>
<style>
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
