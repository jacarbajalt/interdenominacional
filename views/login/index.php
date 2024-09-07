<?php

use app\models\Login;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Logins';
$this->params['breadcrumbs'][] = $this->title;
?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="login-index" style="color: white;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Login', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="table-responsive" >
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idLogin',
            'password',
            'tipoUsuario',
            'username',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Login $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idLogin' => $model->idLogin]);
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