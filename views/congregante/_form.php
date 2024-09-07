<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap4\Modal;
use Faker\Factory;

/** @var yii\web\View $this */
/** @var app\models\Congregante $model */
/** @var yii\widgets\ActiveForm $form */

// Establecer la zona horaria de México, Puebla
date_default_timezone_set('America/Mexico_City');

$fechaRegistro = date('Y-m-d');

// Pasar la fecha al modelo
$model->Fecha_registro = $fechaRegistro;

?>
<?= Html::cssFile('@web/css/congregante.css') ?>



<div class="congregante-form" style="color: white;">
<?php $form = ActiveForm::begin(['id' => 'congregante-form']); ?>
     
        <div style="width: 100%;">
  <fieldset style="width: 100%;">
  
   
<h1>Registro del congregante:</h1><br>
    <div class="row justify-content-start">







    <div class="col-4">
<?= $form->field($model, 'Fecha_registro')->textInput(['readonly' => true]) ?>
</div>
<div class="col-4">
<?= $form->field($model, 'Minis_Act')->dropDownList(['Pastor' => 'Pastor','Directivo' => 'Directivo','Instructor' => 'Instructor','Diácono' => 'Diácono','Guarda templo' => 'Guarda templo','Ayuda pastoral' => 'Ayuda pastoral','Instructor de niños' => 'Instructor de niños','Tesorero' => 'Tesorero','Secretario de la iglesia' => 'Secretario de la iglesia','Intersesor' => 'Intersesor ','Evangelista' => 'Evangelista',], ['prompt' => '---'])  ?>
</div>
<div class="col-4">
<?= $form->field($model, 'Nombre_Con')->textInput(['maxlength' => true, 'id' => 'Nombre_Con']) ?>
                    <?php
    $script = <<< JS
    document.getElementById('Nombre_Con').onkeydown = function(event) {
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

</div>
</div>
 

<div class="row justify-content-start">
 
 <div class="col-4">
         <?= $form->field($model, 'Apellido_Pat')->textInput(['maxlength' => true, 'id' => 'Apellido_Pat']) ?>
         <!--- bloqueo de numeros--->

         <?php
     $script = <<< JS
     document.getElementById('Apellido_Pat').onkeydown = function(event) {
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
 
 </div>

 <div class="col-4">
         <?= $form->field($model, 'Apellido_Mat')->textInput(['maxlength' => true, 'id' => 'Apellido_Mat']) ?>
         <!--- bloqueo de numeros--->

         <?php
     $script = <<< JS
     document.getElementById('Apellido_Mat').onkeydown = function(event) {
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

 </div>

 <div class="col-4">
 <?= $form->field($model, 'edad')->textInput(['type' => 'number', 'min' => 0]) ?>
 </div>
 

</div>
<div class="row justify-content-start" style="color: black;">
   
    <div class="col-4">
    <?= $form->field($model, 'Estado_civil')->dropDownList([
            'Soltero/a' => 'Soltero/a',
            'Casado/a' => 'Casado/a',
            'Divorciado/a' => 'Divorciado/a',
            'Viudo/a' => 'Viudo/a',
            'Unión libre' => 'Unión libre',
        ], ['prompt' => 'Seleccione su estado civil']) ?>
    </div>

    <div class="col-4">
    <?= $form->field($model, 'Curp')->textInput(['maxlength' => true, 'oninput' => 'this.value = this.value.toUpperCase();']) ?>
    </div>

    <div class="col-4">
    <?= $form->field($model, 'Padres')->textInput(['maxlength' => true, 'id' => 'Padres']) ?>

<!--- bloqueo de numeros--->

<?php
$script = <<< JS
document.getElementById('Padres').onkeydown = function(event) {
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

    </div>

   
    <div class="col-6">
    <?= $form->field($model, 'Comentarios')->textarea(['rows' => 6]) ?>
   
        <!--  Boton de registrar--->
<?php

// Botón de Registrar
echo Html::button('<i class="fas fa-check-circle"></i> Registrar', [
    'class' => 'btn btn-success button-spacing',
    'onclick' => "document.getElementById('confirm-register-modal').style.display='block'"
]);

// Modal de Confirmación para Registrar
Modal::begin([
    'id' => 'confirm-register-modal',
    'options' => [
        'class' => 'w3-modal', // Agrega la clase 'w3-modal' para el estilo de W3.CSS
    ],
]);

echo '<h2 id="modal-title" class="w3-container w3-center">Confirmación</h2>';
echo '<hr class="custom-hr">';

// Resto del contenido del modal



// Agregar script para ocultar el icono "X" después de que se renderice el modal
$this->registerJs("
    $(document).ready(function(){
        $('#confirm-register-modal').on('shown.bs.modal', function () {
            $(this).find('.close').hide();
        });
    });
");

echo '<div class="">';

echo Html::button('&times;', [
    'class' => 'w3-button w3-display-topright', 
    'onclick' => "document.getElementById('confirm-register-modal').style.display='none'",
    'style' => 'font-size: 30px;' // Aplicamos un tamaño de fuente más grande
]);

echo '<div class="w3-container">';
echo '<p class="w3-center">¿Estás seguro que desea registrar los datos?</p>';
echo '</div>';
echo '<hr class="custom-hr">';
echo '<footer class="w3-container  w3-center">';
echo Html::button('Cancelar', ['class' => 'w3-button w3-red button-spacing', 'onclick' => "document.getElementById('confirm-register-modal').style.display='none'"]);
echo Html::submitButton('Registrar', ['class' => 'w3-button w3-green button-spacing', 'form' => 'congregante-form']);
echo '</footer>';
echo '</div>';

Modal::end();

?>
<!--  Boton de Cancelar--->


<?php 
// Botón de Cancelar
echo Html::button('<i class="fas fa-exclamation-triangle"></i> Cancelar', [
    'class' => 'btn btn-warning button-spacing',
    'onclick' => "document.getElementById('confirm-cancel-modal').style.display='block'"
]);

// Modal de Confirmación para Cancelar
Modal::begin([
    'id' => 'confirm-cancel-modal',
    'options' => [
        'class' => 'w3-modal', // Agrega la clase 'w3-modal' para el estilo de W3.CSS
    ],
]);

echo '<h2 id="modal-title" class="w3-container w3-center">Confirmación</h2>';
echo '<hr class="custom-hr">';
echo '<div>';
echo Html::button('&times;', [
    'class' => 'w3-button w3-display-topright', 
    'onclick' => "document.getElementById('confirm-cancel-modal').style.display='none'",
    'style' => 'font-size: 30px;' // Aplicamos un tamaño de fuente más grande
]);

echo '<div class="w3-container">';
echo '<p class="w3-center">¿Estás seguro que desea cancelar el registro?</p>';
echo '</div>';
echo '<hr class="custom-hr">';
echo '<div class="w3-container w3-center">';
echo Html::button('No', [
    'class' => 'w3-button w3-red button-spacing',
    'onclick' => "document.getElementById('confirm-cancel-modal').style.display='none'"
]);
echo Html::a('Sí', ['/presentacion/index'], [
    'class' => 'w3-button w3-green button-spacing'
]);
echo '</div>';


echo '</div>';

Modal::end();?>

   
    
  
   

  </fieldset>
</div>

        <br><br>
    
    
    
  
  
   



   

  

   

    <?php ActiveForm::end(); ?>

</div>
