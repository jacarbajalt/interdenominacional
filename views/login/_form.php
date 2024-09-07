<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Solicitudes;
/** @var yii\web\View $this */
/** @var app\models\Login $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="login-form" style="color: white;" >

    <?php $form = ActiveForm::begin(); ?>
    <div style="width: 100%;">
  <fieldset style="width: 100%;">
    <legend><?= Html::encode($this->title) ?></legend>
    <h1></h1>
 
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'tipoUsuario')->dropDownList([ 'Administrador' => 'Administrador', 'Usuario' => 'Usuario', ], ['prompt' => '---']) ?>
    </div>

    <div class="col-sm">
 
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    </div>
  </div>


    <div class="form-group">
        <?= Html::submitButton('Registrar', ['class' => 'btn btn-success']) ?>
    </div>

 
  </fieldset>
  </div>

   

    <?php ActiveForm::end(); ?>

</div>
