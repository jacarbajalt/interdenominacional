<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bautizo $model */

$this->title = 'Actualizar Bautizo: ' . $model->idBautizo;
$this->params['breadcrumbs'][] = ['label' => 'Bautizos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idBautizo, 'url' => ['view', 'idBautizo' => $model->idBautizo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bautizo-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
