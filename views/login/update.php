<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Login $model */

$this->title = 'Update Login: ' . $model->idLogin;
$this->params['breadcrumbs'][] = ['label' => 'Logins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLogin, 'url' => ['view', 'idLogin' => $model->idLogin]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="login-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
