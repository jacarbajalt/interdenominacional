<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Usuario $model */

$this->title = $model->idUsuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuario-view" style="color: white;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idUsuario' => $model->idUsuario, 'Login_idLogin' => $model->Login_idLogin], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idUsuario' => $model->idUsuario, 'Login_idLogin' => $model->Login_idLogin], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="table-responsive" >
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idUsuario',
            'nombre',
            'apPaterno',
            'apMaterno',
            'edad',
            'direccion',
            'colonia',
            'municipio',
            'telefono',
            'cpostal',
            'estado',
            'curp',
            'correo',
            //'Login_idLogin',
            [
                'attribute' => 'login.username', // Accede al nombre a través de la relación
                'label' => 'Username', // Etiqueta de la columna
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