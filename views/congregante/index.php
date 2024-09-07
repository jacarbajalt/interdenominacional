<?php

use app\models\Congregante;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */





$this->params['breadcrumbs'][] = $this->title;
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
  <br>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="congregante-index" style="color: white;">

<h1 style="color: white;">Congregantes</h1>
    <p>
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Registrar Congregante', ['create'], ['class' => 'btn btn-outline-success']) ?>
    </p>

    <div class="table-responsive">
    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'idCongregante',
        'Nombre_Con',
        'Apellido_Pat',
        'Apellido_Mat',
       // 'Padres',
        //'Minis_Act',
            //'Estado_civil',
            //'Curp',
            //'Fecha_registro',
            //'edad',
      
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Congregante $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idCongregante' => $model->idCongregante]);
                }
            ],
        ],
        'rowOptions' => function ($model, $key, $index, $grid) {
            if ($index % 2 === 0) { // Si el índice de fila es par (fila 0, 2, 4, ...)
                return ['style' => 'background-color: white; color: black;']; // Fondo azul y texto blanco
            } else {
                return ['style' => 'background: -webkit-linear-gradient(180deg, #0f042f,#040113,#000000);
                background: linear-gradient(180deg, #0f042f,#040113,#000000);
                 color: white;']; // Fondo negro y texto blanco para filas impares
            }
        },
]); ?>

  
</div>

</div>
<br><br><br>
<style>
     th {
        font-size: 16px;
        font-family: "Arial", "Arial", Sans-Serif;
        padding: 8px;
        background: black;
        border-top: 4px solid #aabcfe;
        color: white;
    }
    
    tr {
     
        font-size: 14;
        font-weight: normal;
        padding: 8px;
        background: black;
        
        color: white;
    }
    
    tr:hover td {
        background-color: #45637d;
    }

    @media (max-width: 768px) {
        .table-responsive {
            margin-bottom: 15px;
            overflow-x: auto;
            overflow-y: hidden;
            
         
            -webkit-overflow-scrolling: touch;
        }
        table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }
    }
</style>
