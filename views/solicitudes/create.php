<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Solicitudes $model */

$this->title = 'Registrar solicitud';
$this->params['breadcrumbs'][] = ['label' => 'Solicitudes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitudes-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
