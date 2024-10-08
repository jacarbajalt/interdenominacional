<?php
use app\models\Bautizo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bautizos';
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

<div class="bautizo-index" style="color: white;">
    <h1 style="color: white;">Bautizos</h1>

    <p>
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Registrar Bautizo', ['create'], ['class' => 'btn btn-outline-success']) ?>
        <?= Html::a('Realizar Busqueda', ['index2'], ['class' => 'btn btn-primary']) ?>
    </p>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'idBautizo',
                'nombre',
                'apPaterno',
                'apMaterno',
                'mes',
                [
                    'attribute' => 'solicitud.Solicitud',
                    'label' => 'Solicitud',
                ],
                [
                    'attribute' => 'Congregante_idCongregante',
                    'value' => function($model) {
                        return $model->congregante ? $model->congregante->Nombre_Con : 'No asignado';
                    },
                    'label' => 'Nombre del Congregante',
                ],
                [
                    'class' => ActionColumn::className(),
                    'template' => '{view} {update}', // Solo muestra los botones de "Ver" y "Editar"
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return Html::a('<i class="fas fa-eye"></i>', $url, [
                                'title' => Yii::t('app', 'View'),
                                'class' => 'btn btn-outline-primary btn-sm',
                            ]);
                        },
                        'update' => function ($url, $model, $key) {
                            return Html::a('<i class="fas fa-edit"></i>', $url, [
                                'title' => Yii::t('app', 'Edit'),
                                'class' => 'btn btn-outline-secondary btn-sm',
                            ]);
                        },
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return Url::toRoute([$action, 'idBautizo' => $model->idBautizo]);
                    }
                ],
                [
                    'label' => 'Ver Acta',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::a('<i class="fas fa-file-pdf"></i> Acta', ['view-pdf', 'id' => $model->idBautizo], ['class' => 'btn btn-outline-danger btn-sm', 'style' => 'color: inherit']);
                    },
                ],
            ],
            'rowOptions' => function ($model, $key, $index, $grid) {
                if ($index % 2 === 0) {
                    return ['style' => 'background-color: white; color: black;']; // Fila par: blanco con texto negro
                } else {
                    return ['style' => 'background-color: black; color: white;']; // Fila impar: negro con texto blanco
                }
            },
        ]); ?>
    </div> 
</div>
<br>
  
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
           
            -ms-overflow-style: -ms-autohiding-scrollbar;
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