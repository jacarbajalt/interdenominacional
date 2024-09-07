<?php

use app\models\Matrimonio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MatrimonioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Matrimonios';

?>
<div class="matrimonio-index" style="color: white;">

    <h1 style="color: white;"><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

    <p>
    <?= Html::a('Regresar', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive" >

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idMatrimonio',
            //'Fecha_Registro',
           // 'dia',
           
            //'solicitudes_idSolicitud',
          /*  [
                'attribute' => 'solicitud.Solicitud',
                'label' => 'Solicitud',
            ],*/
            'nombreNovio',
            'apPaternoNovio',
            'apMaternoNovio',
            //'edadNovio',
            //'curpNovio',
            //'direccionNovio',
            //'coloniaNovio',
            //'cPostalNovio',
            //'estadoNovio',
            //'Padre_Novio',
            //'Domici_Padre',
            //'Madre_novio',
            //'Domic_MadreNov',
            'nombreNovia',
            'apPaternoNovia',
            'apMaternoNovia',
            //'edadNovia',
            //'curpNovia',
            //'direccionNovia',
            //'coloniaNovia',
            //'cPostalNovia',
            //'estadoNovia',
            //'Padre_Novia',
            //'Domic_Pa_Novia',
            //'Madre_novia',
            //'Domic_Ma_Novia',
          //  'numActaMatCivil',
            //'municipioMatCivil',
            'mes',
            'year',
            //'diaMatCivil',
            //'mesMatCivil',
            //'anioMatCivil',
           'Folio',
            //'Congregante_idCongregante',
         /*   [
                'attribute' => 'Congregante_idCongregante',
                'value' => function($model) {
                    return $model->congregante ? $model->congregante->Nombre_Con : 'No asignado';
                },
                'label' => 'Nombre del Congregante',
            ],*/
           /* [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Matrimonio $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idMatrimonio' => $model->idMatrimonio]);
                 }
            ],*/
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
                    return Url::toRoute([$action, 'idMatrimonio' => $model->idMatrimonio]);
                }
            ],
            [  'label' => 'Ver Acta',
            'format' => 'raw',
            'value' => function ($model) {
                return Html::a('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Acta', ['view-pdf', 'id' => $model->idMatrimonio], ['class' => 'btn secondary', 'style' => 'color: inherit']); // Utiliza 'color: inherit' para heredar el color de texto del padre (la fila)
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