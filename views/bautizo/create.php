<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bautizo $model */

$this->title = 'Registrar Bautizo';
$this->params['breadcrumbs'][] = ['label' => 'Bautizos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bautizo-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
