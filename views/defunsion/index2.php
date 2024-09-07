<?php

use app\models\Defunsion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Solicitudes;

/** @var yii\web\View $this */
/** @var app\models\DefunsionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Defunciones';
$this->params['breadcrumbs'][] = $this->title;
?>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="defunsion-index" style="color: white;">

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

            'idDefunsion',
            //'Fecha_registro',
            //'dia',
            'mes',
            'year',
            'Nombre',
            'apePat',
            'apeMat',
            //'sexo',
            //'naciona',
            //'Fecha_Nacim',
            //'localidad',
            //'municipio',
            //'edad_Fallecid',
            //'Embarazada',
            //'domicilio_comp',
            //'estado_civil',
            //'Nombre_Conyuge',
            //'NomPadreCompl',
            //'NomMadreComp',
            //'nacioMadre',
            //'nacioPadre',
            //'nacioConyuge',
            //'Fecha_Defuncion',
            //'Lugar_Fallecido',
            //'Destino_cadaver',
            //'Nombre_Panteon',
            //'Ubica_Panteon',
            //'Certificado',
            //'Nom_declarante',
            //'edad_decla',
            //'Parentesco',
            //'Nacion_parie',
            //'Domi_Compl_Pa',
            //'ocupa_Dec',
            //'Telefono_decla',
            //'Nom_funeraria',
            //'Telefono_fune',
            //'Ciudad',
            //'Atenc_medica',
            //'ACTIVIDADES',
            //'Ocupacion',
            //'Escolaridad',
            //'solicitudes_idSolicitud',
         /*   [
                'attribute' => 'solicitud.Solicitud',
                'label' => 'Solicitud',
            ],*/
            'Folio',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, Defunsion $model, $key, $index) {
                    return Url::to([$action, 'idDefunsion' => $model->idDefunsion]);
                }
            ],
            [
                'label' => 'Ver Acta defunción',
                'format' => 'raw',
                'value' => function ($model) {
                    // Verificar el valor de la columna "Embarazada"
                    $embarazada = $model->Embarazada;
            
                    // Determinar si se debe deshabilitar el botón "Embarazada"
                    $disableEmbarazada = $embarazada == 'No' || $embarazada == '-----' ? 'disabled' : '';
            
                    // Verificar el valor de la columna "Embarazada" para el botón "Casado/soltero"
                    $disableCasadoSoltero = $embarazada == 'Si' || $embarazada == '-----' ? 'disabled' : '';
            
                    // Determinar si se deben deshabilitar los botones "Niño/a" y "Casado/soltero" según la edad
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

                        Html::a('Casado/soltero', ['view-pdf', 'id' => $model->idDefunsion], ['class' => 'btn btn-warning '  . $disableCasadoSoltero]),
                        Html::a('Niño/a', ['view-pdf-nino', 'id' => $model->idDefunsion], ['class' => 'btn btn-dark ' . $disableNiño]),
                        Html::a('Embarazada', ['view-pdf-joven', 'id' => $model->idDefunsion], ['class' => 'btn btn-danger ' . $disableEmbarazada])

                       
                    ];
            
                    // Convertir los enlaces en una cadena separada por espacios
                    return implode(' ', $buttons);
                }
            ]
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
