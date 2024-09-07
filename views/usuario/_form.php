<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Solicitudes;
use yii\helpers\ArrayHelper;
use app\models\Login;
/** @var yii\web\View $this */
/** @var app\models\Usuario $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="usuario-form" style="color: white;" >

    <?php $form = ActiveForm::begin(); ?>
     
    <div style="width: 100%;">
  <fieldset style="width: 100%;">
    <legend><?= Html::encode($this->title) ?></legend>
    <h1></h1>
 
  <div class="row">
    <div class="col-sm">
       <!--- bloqueo de numeros de nomre solo letras--->
 <?php
$script = <<< JS
document.getElementById('nombre').onkeydown = function(event) {
    // Permitir teclas especiales como retroceso, flechas, etc.
    if (event.key === 'ArrowLeft' || event.key === 'ArrowRight' || event.key === 'Backspace' || event.key === 'Delete') {
        return true;
    }

    // Permitir el carácter de espacio
    if (event.key === ' ') {
        return true;
    }

    // Bloquear la entrada si es un número
    if (!isNaN(event.key)) {
        event.preventDefault();
        return false;
    }
};
JS;
$this->registerJs($script);
?>
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'id' => 'nombre']) ?>
    </div>
    <div class="col-sm">
       <!--- bloqueo de numeros solo letras--->
 <?php
$script = <<< JS
document.getElementById('apPaterno').onkeydown = function(event) {
    // Permitir teclas especiales como retroceso, flechas, etc.
    if (event.key === 'ArrowLeft' || event.key === 'ArrowRight' || event.key === 'Backspace' || event.key === 'Delete') {
        return true;
    }

    // Bloquear la entrada si es un número
    if (!isNaN(event.key)) {
        event.preventDefault();
        return false;
    }
};
JS;
$this->registerJs($script);
?>


    <?= $form->field($model, 'apPaterno')->textInput(['maxlength' => true, 'id' => 'apPaterno']) ?>
    </div>
    <div class="col-sm">
     
 <!--- bloqueo de numeros solo letras--->
    <?php
$script = <<< JS
document.getElementById('apMaterno').onkeydown = function(event) {
    // Permitir teclas especiales como retroceso, flechas, etc.
    if (event.key === 'ArrowLeft' || event.key === 'ArrowRight' || event.key === 'Backspace' || event.key === 'Delete') {
        return true;
    }

    // Bloquear la entrada si es un número
    if (!isNaN(event.key)) {
        event.preventDefault();
        return false;
    }
};
JS;
$this->registerJs($script);
?>

    <?= $form->field($model, 'apMaterno')->textInput(['maxlength' => true, 'id' => 'apMaterno']) ?>
    </div>
  </div>



  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'edad')->textInput(['type' => 'number', 'min' => 0]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'colonia')->textInput(['maxlength' => true]) ?>
    </div>
  </div>


  <div class="row">
    <div class="col-sm">
    <?php
$script = <<< JS
document.getElementById('municipio').onkeydown = function(event) {
    // Permitir teclas especiales como retroceso, flechas, etc.
    if (event.key === 'ArrowLeft' || event.key === 'ArrowRight' || event.key === 'Backspace' || event.key === 'Delete') {
        return true;
    }

    // Permitir el carácter de espacio
    if (event.key === ' ') {
        return true;
    }

    // Bloquear la entrada si es un número
    if (!isNaN(event.key)) {
        event.preventDefault();
        return false;
    }
};
JS;
$this->registerJs($script);
?>
    <?= $form->field($model, 'municipio')->textInput(['maxlength' => true, 'id' => 'municipio']) ?>
    </div>
    <div class="col-sm">
    <?php
$script = <<< JS
document.getElementById('telefono').addEventListener('input', function(event) {
    let inputValue = event.target.value;
    let numericValue = inputValue.replace(/\D/g, ''); // Remueve todo excepto números

    if (inputValue !== numericValue) {
        event.target.value = numericValue; // Actualiza el valor del campo solo con números
    }
});
JS;
$this->registerJs($script);
?>



    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true, 'id' => 'telefono']) ?>
    </div>
    <div class="col-sm">
           <!--- bloqueo de letras solo numeros--->
    <?php
$script = <<< JS
document.getElementById('cpostal').addEventListener('input', function(event) {
    let inputValue = event.target.value;
    let numericValue = inputValue.replace(/\D/g, ''); // Remueve todo excepto números

    if (inputValue !== numericValue) {
        event.target.value = numericValue; // Actualiza el valor del campo solo con números
    }
});
JS;
$this->registerJs($script);
?>

    <?= $form->field($model, 'cpostal')->textInput(['maxlength' => true, 'id' => 'cpostal']) ?>
    </div>
  </div>


  <div class="row">
    <div class="col-sm">
      
    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'curp')->textInput(['maxlength' => true, 'oninput' => 'this.value = this.value.toUpperCase();']) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?php
 $usuario=ArrayHelper::map(
    Login::find()->select(['idLogin','username', ])->all(),
    'idLogin',
    function($data){
        return $data['username'];
    }
);

?>
  <?= $form->field($model, 'Login_idLogin')->dropDownList($usuario, ['class' => 'form-control inline-block', 'prompt' => 'Seleccionar username']); ?>

    </div>
  </div>


  


    
    
    

    

    <div class="form-group">
        <?= Html::submitButton('Registrar', ['class' => 'btn btn-success']) ?>
    </div>

 
  </fieldset>
  </div>
    <?php ActiveForm::end(); ?>

</div>
<br><br><br>