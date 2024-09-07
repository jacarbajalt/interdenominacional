<?php

use app\models\Solicitudes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Solicitudes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitudes-index" style="color: white;" >

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar Solicitudes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idSolicitud',
            'Solicitud',
            //'usuario_idUsuario',
            [
                'attribute' => 'usuario.nombre', // Accede al nombre a través de la relación
                'label' => 'Nombre del Usuario', // Cambia la etiqueta si es necesario
            ],
           // 'usuario_Login_idLogin',
           [
            'label' => 'username',
            'value' => function ($model) {
                return $model->login->username; // Accede al nombre de usuario a través de la relación
            },
        ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Solicitudes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idSolicitud' => $model->idSolicitud]);
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
