<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Solicitudes $model */

$this->title = 'Update Solicitudes: ' . $model->idSolicitud;
$this->params['breadcrumbs'][] = ['label' => 'Solicitudes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSolicitud, 'url' => ['view', 'idSolicitud' => $model->idSolicitud]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solicitudes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
