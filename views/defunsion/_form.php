<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap5;
use yii\helpers\ArrayHelper;
use Faker\Factory;
use app\models\Defunsion;
use app\models\Congregante;
use app\models\Solicitudes;
use dosamigos\datepicker\DatePicker;
use app\models\Matrimonio;
//use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;

/** @var yii\web\View $this */
/** @var app\models\Defunsion $model */
/** @var yii\widgets\ActiveForm $form */
// Establecer la zona horaria de México, Puebla
date_default_timezone_set('America/Mexico_City');

$fechaRegistro = date('Y-m-d H:i:s');

// Pasar la fecha al modelo
$model->Fecha_registro = $fechaRegistro;

// Instancia de Faker para generar datos aleatorios de fecha de nacimiento
$faker = Factory::create();
/*
// Generar fechas de nacimiento aleatorias
$Fecha_Nacim = [];
for ($i = 0; $i < 10; $i++) {
    $Fecha_Nacim[] = $faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d');
}

$model->Fecha_Nacim = $Fecha_Nacim[0]; // Establecer la fecha de nacimiento predeterminada*/


date_default_timezone_set('America/Mexico_City');
$this->registerJs("
    // Obtener la fecha actual
    var currentDate = new Date();
    var dia = currentDate.getDate();
    var mesArray = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var mes = mesArray[currentDate.getMonth()]; // Los meses en JavaScript son 0-indexados
    var year = currentDate.getFullYear();
    
    // Establecer los valores de los campos de fecha
    $('#defunsion-dia').val(dia);
    $('#defunsion-mes').val(mes);
    $('#defunsion-year').val(year);
");



?>
<style>
    /* Archivo: web/css/site.css */
.text-danger {
    color: red;
    font-weight: bold;
}

.alert-danger {
    color: white;
    background-color: red;
    border-color: darkred;
}
</style>
<?= Html::cssFile('@web/css/defunsion.css') ?>
 
<div class="defunsion-form">

<?php $form = ActiveForm::begin(['id' => 'defunsion-form']); ?>

<style>
    /* Archivo: web/css/site.css */

</style>
<?= $form->field($model, 'dia')->hiddenInput(['id' => 'defunsion-dia'])->label(false) ?>

<?= $form->field($model, 'mes')->hiddenInput(['id' => 'defunsion-mes'])->label(false) ?>

<?= $form->field($model, 'year')->hiddenInput(['id' => 'defunsion-year'])->label(false) ?>

<?php
    // Registro de código JavaScript para mostrar la ventana emergente al cargar la página
    $this->registerJs("
        $(document).ready(function(){
            document.getElementById('id01').style.display='block';
        });
    ");
?>

<!-- Ventana emergente (modal) -->
<div id="id01" class="w3-modal" style="display: none;">
    <div class="w3-modal-content">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <h2>Bienvenido</h2>
        </header>
        <div class="w3-container">
            <h3>Intrucciones</h3>
            <div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">1. Edad del fallecido</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">2. Embarazada</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">3. -----</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">4. El formulario no registra o no avanza</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">En este apartado a la hora de ingresar una edad menor de 18 años se te abrira una ventana, ejemplo si proporcionas 2 mese esta te dira que cuando termines el formulario te dirijas al acta del niño/a ya que estas proporcionando una edad menor a 18.</div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Este apartado encontraras 3 formas de selección, ya que cuando ingreses a un menor de edad seleccionaras este "------" si es un joven que es casado pero menor de edad selecciona este "------" y se activara el boton casado en esta parte tambien se activara el boton niño ya que este tambien es un menor de edad.
        Otro punto cabe mencionar que para que se genere un acta de embarazada este tendra que indicar que SI y el botón ambarazada estara activo, pero si este indica que no el boton quedara inactivo y activara el botón casado/soltero.</div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Estas lineas apareceran en unos Campos cuando no se hayan proporcionado toda la información que se desea es decir seran líneas opcionales para el relleno y cuando no se tenga información completa se tendra que rellenar con esas líneas. <br><b style="color: red;">Ejemplo</b> <br> 
     
  <label for="fname">OCUPACIÓN DEL DECLARANTE:</label><br>
  <input type="text" id="Nacionalidad" name="fname" value="------" disabled><br>
  <label for="lname">TELEFONO DEL DECLARANTE:</label><br>
  <input type="text" id="Dirección" name="lname" value="5555555555" disabled><br><br>
  
</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Revisa que todo el formulario este llenado con toda la información que te pide ya que si este no cuenta con toda la información este no te dejara avanzar a la siguiente secció.</div>
    </div>
  </div>
</div>
        </div>
        <footer class="w3-container w3-teal">
            <p>Toma en serio las instucciones</p>
        </footer>
    </div>
</div>


    <div style="width: 100%;">
  <fieldset style="width: 100%;">
    <h1><?= Html::encode($this->title) ?></h1><br>
    <div class="row justify-content-start">
    <div class="col-3">
    <?= $form->field($model, 'Fecha_registro')->textInput(['readonly' => true]) ?>
    </div>
    <div class="col-3">
    <?= $form->field($model, 'Folio')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $model->isNewRecord ? \app\models\Defunsion::generarNuevoFolio(Defunsion::find()->max('idDefunsion') + 1) : $model->Folio]) ?>
    </div>
    <div class="col-3">
    <?php $solicitudes=ArrayHelper::map(
        Solicitudes::find()->select(['Solicitud', 'idSolicitud'])->all(),
        'idSolicitud',
        function($data){
            return $data['Solicitud'];
        }
    );?>

    <?= $form->field($model, 'solicitudes_idSolicitud')->dropDownList($solicitudes, ['class' => 'form-control inline-block', 'prompt' => 'Seleccionar solicitudes']); ?>
    </div>
    <div class="col-3">
   
    <?= $form->field($model, 'Fecha_Defuncion')->textInput(['type' => 'date']) ?>
    </div>
  </div>


 
  
   <div class="row justify-content-start">
    <div class="col-3">
      
    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true, 'id' => 'Nombre']) ?>
     <!--- bloqueo de numeros--->
     <?php
$script = <<< JS
document.getElementById('Nombre').onkeydown = function(event) {
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
    <div class="col-3">
      

    <?= $form->field($model, 'apePat')->textInput(['maxlength' => true, 'id' => 'apePat']) ?>
     <!--- bloqueo de numeros--->

     <?php
$script = <<< JS
document.getElementById('apePat').onkeydown = function(event) {
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
    <div class="col-3">
      
    <?= $form->field($model, 'apeMat')->textInput(['maxlength' => true, 'id' => 'apeMat']) ?>
    <!--- bloqueo de numeros--->
    <?php
$script = <<< JS
document.getElementById('apeMat').onkeydown = function(event) {
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
    <div class="col-3">
    <?= $form->field($model, 'Fecha_Nacim')->textInput(['type' => 'date']) ?>
    </div>
  </div>

  <div class="row justify-content-start">
    <div class="col-3">
    <?= $form->field($model, 'edad_Fallecid')->textInput(['id' => 'edad-input']) ?>

<?php
$script = <<< JS
$(document).ready(function(){
    function verificarEdad() {
        var edad = $('#edad-input').val().trim();
        console.log("Edad ingresada:", edad);

        var regexAnos = /^(\d+)\s*años?$/i;
        var regexMeses = /^(\d+)\s*meses?$/i;
        var regexAnosYMeses = /^(\d+)\s*años?\s*y\s*(\d+)\s*meses?$/i;
        var regexAnosYMes = /^(\d+)\s*años?\s*y\s*(\d+)\s*mes$/i;
        var regexAnoYMeses = /^(\d+)\s*año?\s*y\s*(\d+)\s*meses?$/i;
        var regexAnoYMes = /^(\d+)\s*año?\s*y\s*(\d+)\s*mes$/i;
        var regexDias = /^(\d+)\s*días?$/i;

        var esMenor = false;
        if (regexAnos.test(edad)) {
            var anos = parseInt(edad.match(regexAnos)[1]);
            if (anos < 18) esMenor = true;
        } else if (regexMeses.test(edad)) {
            esMenor = true;
        } else if (regexDias.test(edad)) {
            esMenor = true;
        } else if (regexAnosYMeses.test(edad) || regexAnosYMes.test(edad) || regexAnoYMeses.test(edad) || regexAnoYMes.test(edad)) {
            var match = edad.match(regexAnosYMeses) || edad.match(regexAnosYMes) || edad.match(regexAnoYMeses) || edad.match(regexAnoYMes);
            var anos = parseInt(match[1]);
            var meses = parseInt(match[2]);
            if (anos < 18 || (anos === 18 && meses > 0)) esMenor = true;
        }

        if (esMenor) {
            console.log("Mostrando modal...");
            document.getElementById('modal-menor').style.display = 'block';
        }
    }

    $('#edad-input').on('focusout', function() {
        verificarEdad();
    });
});
JS;
$this->registerJs($script);
?>


<!-- Modal -->
<div id="modal-menor" class="w3-modal" style="display: none;">
    <div class="w3-modal-content w3-animate-top w3-card-4 mimodal">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('modal-menor').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <h2>Menor de Edad</h2>
        </header>
        <div class="w3-container">
            <p>El fallecido es menor de edad. Recuerda seleccionar las líneas <B>------</B> en el apartado embarazada <br><b style="color: red;">Ejemplo</b><br><label for="fname">Embarazada</label><br>
            <input type="text" id="Nacionalidad" name="fname" value="------" disabled><br> Despues de terminar de llenar el formulario recuerda  ir al acta Defunción Niño/a para generarlo</p>
        </div>
        <footer class="w3-container w3-teal">
            <button onclick="document.getElementById('modal-menor').style.display='none'" class="btn btn-outline-dark">Cerrar</button>
        </footer>
    </div>
</div>

<style>
      .mimodal {
        max-width: 500px;
        margin: auto;
    }
</style>

    </div>

    <div class="col-3">
    <?= $form->field($model, 'sexo')->dropDownList(['Femenino' =>  'Femenino', 'Masculino' => 'Masculino', ], ['prompt' => '---']) ?>
    </div>
    <div class="col-3">
    <?= $form->field($model, 'naciona')->dropDownList(['------' =>'------', 'Mexicana' =>  'Mexicana', 'Mexicano' =>  'Mexicano', 'Estadounidense' => 'Estadounidense', 'Brasileña' => 'Brasileña','Brasileño' => 'Brasileño','Francés' => 'Francés', 'Italiano' => 'Italiano','Alemán ' => 'Alemán ',], ['prompt' => '---']) ?>
    </div>
    <div class="col-3">
     
            <!--- bloqueo de numeros--->
            <?php
        $script = <<< JS
        document.getElementById('localidad').onkeydown = function(event) {
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
    <?= $form->field($model, 'localidad')->textInput(['maxlength' => true, 'id' => 'localidad']) ?>
    </div>
  </div>



  <div class="row justify-content-start">
    <div class="col-3">
       <!--- bloqueo de numeros--->
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
    <div class="col-3">
    <?= $form->field($model, 'domicilio_comp')->textInput(['maxlength' => true]) ?>
    </div>
   
    <div class="col-3">
     
    <?= $form->field($model, 'estado_civil')->dropDownList([
            '-----' => '-----',
            'Soltera' => 'Soltera',
            'Soltero' => 'Soltero',
            'Casada' => 'Casada',
            'Casado' => 'Casado',
            'Divorciado' => 'Divorciado',
            'Divorciada' => 'Divorciada',
            'Viudo/a' => 'Viudo/a',
            'Viuda' => 'Viuda',
            'Unión libre' => 'Unión libre',
        ], ['prompt' => 'Seleccione su estado civil']) ?>

    </div>
    <div class="col-3">
    <?= $form->field($model, 'Embarazada')->dropDownList([
            'Si' => 'Si',
            'No' => 'No',
            '-----' => '-----',
          
        ], ['prompt' => 'Seleccione']) ?>

    </div>
  </div>
 
 

  <div class="row justify-content-start">
    <div class="col-3">
    <?= $form->field($model, 'Certificado')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-3">
      

    <?= $form->field($model, 'Nombre_Conyuge')->textInput(['maxlength' => true, 'id' => 'Nombre_Conyuge']) ?>
     <!--- bloqueo de numeros--->
     <?php
$script = <<< JS
document.getElementById('Nombre_Conyuge').onkeydown = function(event) {
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
    <div class="col-3">
    <?= $form->field($model, 'NomPadreCompl')->textInput(['maxlength' => true, 'id' => 'NomPadreCompl']) ?>
     <!--- bloqueo de numeros--->
     <?php
$script = <<< JS
document.getElementById('NomPadreCompl').onkeydown = function(event) {
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
    <div class="col-3">
      

    <?= $form->field($model, 'NomMadreComp')->textInput(['maxlength' => true, 'id' => 'NomMadreComp']) ?>
     <!--- bloqueo de numeros--->
     <?php
$script = <<< JS
document.getElementById('NomMadreComp').onkeydown = function(event) {
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
    <div class="col-3">
    <?= $form->field($model, 'nacioMadre')->dropDownList(['------' =>'------', 'Mexicana' =>  'Mexicana', 'Mexicano' =>  'Mexicano', 'Estadounidense' => 'Estadounidense', 'Brasileña' => 'Brasileña','Brasileño' => 'Brasileño','Francés' => 'Francés', 'Italiano' => 'Italiano','Alemán ' => 'Alemán ',], ['prompt' => '---']) ?>
    </div>
    <div class="col-3">
    <?= $form->field($model, 'nacioPadre')->dropDownList(['------' =>'------', 'Mexicana' =>  'Mexicana', 'Mexicano' =>  'Mexicano', 'Estadounidense' => 'Estadounidense', 'Brasileña' => 'Brasileña','Brasileño' => 'Brasileño','Francés' => 'Francés', 'Italiano' => 'Italiano','Alemán ' => 'Alemán ',], ['prompt' => '---']) ?>

 
    </div>
    <div class="col-3">
    <?= $form->field($model, 'nacioConyuge')->dropDownList(['------' =>'------','Mexicana' =>  'Mexicana', 'Mexicano' =>  'Mexicano', 'Estadounidense' => 'Estadounidense', 'Brasileña' => 'Brasileña','Brasileño' => 'Brasileño','Francés' => 'Francés', 'Italiano' => 'Italiano','Alemán ' => 'Alemán ',], ['prompt' => '---']) ?>
    </div>
    <div class="col-3">
      
    <?= $form->field($model, 'Lugar_Fallecido')->textInput(['maxlength' => true]) ?>


    </div>
  </div>


  <div class="row justify-content-start">
    <div class="col-4">
    <?= $form->field($model, 'Destino_cadaver')->dropDownList(['Traslado' =>  'Traslado', 'Cremación' => 'Cremación', 'Exhumación' => 'Exhumación','Inhumación' => 'Inhumación', ], ['prompt' => '---']) ?>
    </div>
    <div class="col-4">
    <?= $form->field($model, 'Nombre_Panteon')->textInput(['maxlength' => true]) ?>


    </div>
    <div class="col-4">
    <?= $form->field($model, 'Ubica_Panteon')->textInput(['maxlength' => true]) ?>
    </div>
  
  </div>


  <H4>DATOS DEL DECLARANTE</H4>

  <div class="row justify-content-start">
    <div class="col-3">
    <?= $form->field($model, 'Nom_declarante')->textInput(['maxlength' => true, 'id' => 'Nom_declarante']) ?>
     <!--- bloqueo de numeros--->
     <?php
$script = <<< JS
document.getElementById('Nom_declarante').onkeydown = function(event) {
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
    <div class="col-3">
    <?= $form->field($model, 'edad_decla')->textInput(['type' => 'number', 'min' => 0]) ?>
    </div>
    <div class="col-3">
    <?= $form->field($model, 'Parentesco')->dropDownList(['------' =>'------', 'Padre' => 'Padre', 'Madre' => 'Madre','Hijo' => 'Hijo','Hija' => 'Hija','Hermano' => 'Hermano', 'Hermana' => 'Hermana','Abuelo' => 'Abuelo', 'Abuela' => 'Abuela', 'Tío' => 'Tío', 'Tía' => 'Tía', 'Esposo' => 'Esposo','Esposa' => 'Esposa',], ['prompt' => '---'])  ?>
    </div>
    <div class="col-3">
    
<?= $form->field($model, 'Nacion_parie')->dropDownList(['------' =>'------','Mexicana' =>  'Mexicana', 'Mexicano' =>  'Mexicano', 'Estadounidense' => 'Estadounidense', 'Brasileña' => 'Brasileña','Brasileño' => 'Brasileño','Francés' => 'Francés', 'Italiano' => 'Italiano','Alemán ' => 'Alemán ',], ['prompt' => '---']) ?>
    </div>
  </div>

  <div class="row justify-content-start">
    <div class="col-4">
    <?= $form->field($model, 'Domi_Compl_Pa')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-4">
    <?= $form->field($model, 'ocupa_Dec')->dropDownList(['------' =>'------','Obrero' =>  'Obrero', 'Empleado' => 'Empleado', 'Jornalero o peón' => 'Jornalero o peón', 'Trabajador por cuenta' =>  'Trabajador por cuenta', 'Patron o empresario' => 'Patron o empresario', 'Trabajador no remunerado' => 'Trabajador no remunerado'], ['prompt' => '---']) ?>
    </div>
    <div class="col-4">
    <?php
$script = <<< JS
document.getElementById('Telefono_decla').addEventListener('input', function(event) {
    let inputValue = event.target.value;
    let numericValue = inputValue.replace(/\D/g, ''); // Remueve todo excepto números
    let maxLength = 10; // Establece la longitud máxima

    if (numericValue.length > maxLength) {
        numericValue = numericValue.slice(0, maxLength); // Limita la longitud a 10 dígitos
    }

    if (inputValue !== numericValue) {
        event.target.value = numericValue; // Actualiza el valor del campo solo con números
    }
});
JS;
$this->registerJs($script);
?>
    <?= $form->field($model, 'Telefono_decla')->textInput(['maxlength' => 10, 'id' => 'Telefono_decla']) ?>
    </div>
  
  </div>

  <H4>DATOS DE FUNERARIA</H4>

  <div class="row justify-content-start">
    <div class="col-3">
    <?= $form->field($model, 'Nom_funeraria')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-3">
    
    <?php
$script = <<< JS
document.getElementById('Telefono_fune').addEventListener('input', function(event) {
    let inputValue = event.target.value;
    let numericValue = inputValue.replace(/\D/g, ''); // Remueve todo excepto números
    let maxLength = 10; // Establece la longitud máxima

    if (numericValue.length > maxLength) {
        numericValue = numericValue.slice(0, maxLength); // Limita la longitud a 10 dígitos
    }

    if (inputValue !== numericValue) {
        event.target.value = numericValue; // Actualiza el valor del campo solo con números
    }
});
JS;
$this->registerJs($script);
?>
    <?= $form->field($model, 'Telefono_fune')->textInput(['maxlength' => 10, 'id' => 'Telefono_fune']) ?>
    </div>
    <div class="col-3">
    <?= $form->field($model, 'Ciudad')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col-3">
    <?= $form->field($model, 'Atenc_medica')->dropDownList(['SI' => 'SI','NO' =>'NO', '------' =>'------'],['prompt' => '---'])?>
    </div>
  </div>

<p style="font-size:18px;">DATOS COMPLEMENTARIOS DEL DIFUNTO</p>
  <div class="row justify-content-start">
    <div class="col-4">
    <?= $form->field($model, 'ACTIVIDADES')->dropDownList([ '------' => '------', 'Tenia trabajo' =>  'Tenia trabajo', 'Labores domesticas' => ' Labores domesticas', 'Jubilado' => 'Jubilado', 'Pensionado' => 'Pensionado', 'Estudiaba' => 'Estudiaba', 'Incapacitado' => 'Incapacitado', 'Otros' => 'Otro',], ['prompt' => '---'])?>
    </div>
    <div class="col-4">
    <?= $form->field($model, 'Ocupacion')->dropDownList(['---------' =>  '---------', 'Obrero' =>  'Obrero', 'Empleado' => 'Empleado', 'Jornalero o peón' => 'Jornalero o peón', 'Trabajador por cuenta' =>  'Trabajador por cuenta', 'Patron o empresario' => 'Patron o empresario', 'Trabajador no remunerado' => 'Trabajador no remunerado'], ['prompt' => '---']) ?>
    </div>
    <div class="col-4">
     
    <?= $form->field($model, 'Escolaridad')->dropDownList(['--------' =>  '--------', 'Sin escolaridad' =>  'Sin escolaridad', 'Primaria incompleta' => 'Primaria incompleta', 'Primaria completa' => 'Primaria completa', 'Secundaria' => 'Secundaria', 'Preparatoria' => 'Preparatoria', 'Profesiona' =>  'Profesional', ], ['prompt' => '---']) ?>

    </div>
   
  </div>
 

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
echo Html::submitButton('Registrar', ['class' => 'w3-button w3-green button-spacing', 'form' => 'defunsion-form']);
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
echo Html::a('Sí', ['/defunsion/index'], [
    'class' => 'w3-button w3-green button-spacing'
]);
echo '</div>';


echo '</div>';

Modal::end();?>
</fieldset>
  
</div>

    <?php ActiveForm::end(); ?>

</div>
<br><br><br>
