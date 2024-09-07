<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Login $model */

$this->title = 'Registrar Login';
$this->params['breadcrumbs'][] = ['label' => 'Logins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
