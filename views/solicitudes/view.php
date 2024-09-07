<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Usuario;
/** @var yii\web\View $this */
/** @var app\models\Solicitudes $model */

$this->title = $model->idSolicitud;
$this->params['breadcrumbs'][] = ['label' => 'Solicitudes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="solicitudes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idSolicitud' => $model->idSolicitud], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idSolicitud' => $model->idSolicitud], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idSolicitud',
            'Solicitud',
           // 'usuario_idUsuario',
           [
            'attribute' => 'usuario.nombre', // Accede al nombre a través de la relación
            'label' => 'Nombre del Usuario', // Cambia la etiqueta si es necesario
        ],
         //  'usuario_Login_idLogin',
         [
            'label' => 'Username',
            'value' => function ($model) {
                return $model->login->username; // Accede al nombre de usuario a través de la relación
            },
        ],
           
        ],

        'options' => [
            'class' => 'table table-bordered detail-view', // Agregar la clase 'table-bordered' para bordes y 'detail-view' para estilos base
        ],
        
     
    ]) ?>

</div>
</div>

<style>
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
 

</div>
