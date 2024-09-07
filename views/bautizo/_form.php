<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap5;
use app\models\Congregante;
use app\models\Solicitudes;
use yii\helpers\ArrayHelper;
use app\models\Bautizo;
use yii\bootstrap4\Modal;
use Faker\Factory;
use dosamigos\datepicker\DatePicker;


/** @var yii\web\View $this */
/** @var app\models\Bautizo $model */
/** @var yii\widgets\ActiveForm $form */

// Establecer la zona horaria de México, Puebla
date_default_timezone_set('America/Mexico_City');

$fechaRegistro = date('Y-m-d H:i:s');

// Pasar la fecha al modelo
$model->Fecha_registro = $fechaRegistro;





?>

<link rel="preconnect" href="https://fonts.googleapis.com"> <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <link href="https: //fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">

<!-- Enlace al archivo CSS -->
<?= Html::cssFile('@web/css/bautizo.css') ?>




    <div class="bautizo-form" style="color: black;">
    <?php $form = ActiveForm::begin(['id' => 'defunsion-form']); ?>

    <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span><br>
        <p>     Si el formulario no deja avanzar a la siguiente ventana es debido a campos vacíos se recomienda revisar nuevamente el formulario y llenar el campo vacío <br> <b>Recuerda que si no se tiene toda la informacion rellena con lineas 6 a 5 no más ------</b> <br> <b style="color: red;">Ejemplo</b> <br> 
   
  <label for="fname">Nacionalidad:</label><br>
  <input type="text" id="Nacionalidad" name="fname" value="Mexicano" disabled><br>
  <label for="lname">Dirección:</label><br>
  <input type="text" id="Dirección" name="lname" value="-----" disabled><br><br>
  
</p>
      
   
      </div>
    </div>
  </div>


<?php
        // Registro de código JavaScript para mostrar la ventana emergente al cargar la página
        $this->registerJs("
            $(document).ready(function(){
                document.getElementById('id01').style.display='block';
            });
        ");
        ?>

   

    <?php
// Array con los nombres de los meses en español
$meses = [
    1 => 'Enero',
    2 => 'Febrero',
    3 => 'Marzo',
    4 => 'Abril',
    5 => 'Mayo',
    6 => 'Junio',
    7 => 'Julio',
    8 => 'Agosto',
    9 => 'Septiembre',
    10 => 'Octubre',
    11 => 'Noviembre',
    12 => 'Diciembre',
];

// Registro de JavaScript para auto-rellenar los campos de fecha
$this->registerJs("
    // Obtener la fecha actual
    var currentDate = new Date();
    var dia = currentDate.getDate();
    var mes = currentDate.getMonth() + 1; // Los meses en JavaScript son 0-indexados, por eso se suma 1
    var year = currentDate.getFullYear();
    
    // Establecer los valores de los campos de fecha
    $('#bautizo-dia').val(dia);
    $('#bautizo-mes').val('" . $meses[date('n')] . "'); // Convertir el número del mes a su nombre correspondiente
    $('#bautizo-year').val(year);
");
?>

<?= $form->field($model, 'dia')->hiddenInput(['id' => 'bautizo-dia'])->label(false) ?>

<?= $form->field($model, 'mes')->hiddenInput(['id' => 'bautizo-mes'])->label(false) ?>

<?= $form->field($model, 'year')->hiddenInput(['id' => 'bautizo-year'])->label(false) ?>

    <div style="width: 100%;">
  <fieldset style="width: 100%;">
  <h1 ><?= Html::encode($this->title) ?></h1><br>
  <div class="row ">
  
  <div class="col-sm">
  <?= $form->field($model, 'Fecha_registro')->textInput(['readonly' => true]) ?>
  </div>
  <div class="col-sm">
  <?= $form->field($model, 'Folio')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $model->isNewRecord ? \app\models\Bautizo::generarNuevoFolio(Bautizo::find()->max('idBautizo') + 1) : $model->Folio]) ?>
  </div>
  <div class="col-sm">
  <?php $solicitudes=ArrayHelper::map(
      Solicitudes::find()->select(['Solicitud', 'idSolicitud'])->all(),
      'idSolicitud',
      function($data){
          return $data['Solicitud'];
      }
  );?>

  <?= $form->field($model, 'solicitudes_idSolicitud')->dropDownList($solicitudes, ['class' => 'form-control inline-block', 'prompt' => 'Seleccionar solicitudes']); ?>
  </div>
  <div class="col-sm">
  <?php
    $congregante=ArrayHelper::map(
        Congregante::find()->select(['Nombre_Con', 'Apellido_Pat', 'Apellido_Mat', 'idCongregante'])->all(),
        'idCongregante',
        function($data){
            return $data['Nombre_Con'].' '.$data['Apellido_Pat'].' '.$data['Apellido_Mat'];
        }
    );?>

    <?= $form->field($model, 'Congregante_idCongregante')->dropDownList($congregante, ['class' => 'form-control inline-block', 'prompt' => 'Seleccionar Congregante']); ?>
  </div>
</div>


<div class="row">
    <div class="col-sm">
    <?php
    $congregante=ArrayHelper::map(
        Congregante::find()->select(['Nombre_Con', 'Apellido_Pat', 'Apellido_Mat', 'idCongregante'])->all(),
        'idCongregante',
        function($data){
            return $data['Nombre_Con'].' '.$data['Apellido_Pat'].' '.$data['Apellido_Mat'];
        }
    );?>
 


    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'id' => 'nombre']) ?>
    </div>
    <div class="col-sm">
        <!--- bloqueo de numeros--->
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
  <!--- bloqueo de numeros--->

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
    <?= $form->field($model, 'apMaterno')->textInput(['maxlength' => true, 'id' => 'apMaterno']) ?> 
    <!--- bloqueo de numeros--->
    <?php $script = <<< JS
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

    </div>
    <div class="col-sm">
    <?= $form->field($model, 'estadoCivil')->dropDownList(['soltero' =>  'soltero', 'soltera' =>  'soltera', 'casada por lo civil' => 'casada por lo civil', 'casado por lo civil' => 'casado por lo civil', 'casado por iglesia' =>  'casado por iglesia', 'casada por iglesia' =>  'casada por iglesia', 'casado por civil e iglesia' =>  'casado  civil e iglesia','casada por civil e iglesia' =>  'casada  civil e iglesia', 'viudo' => 'viudo','viuda' => 'viuda',], ['prompt' => '---']) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'edad')->textInput(['type' => 'number', 'min' => 0]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'Nacionalidad')->dropDownList(['Mexicano' =>  'Mexicano', 'Estadounidense' => 'Estadounidense', 'Brasileño' => 'Brasileño','Francés' => 'Francés', 'Italiano' => 'Italiano','Alemán ' => 'Alemán ',], ['prompt' => '---']) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'Ocupacion')->dropDownList(['Estudiante' =>  'Estudiante', 'Obrero' =>  'Obrero', 'Empleado' => 'Empleado', 'Jornalero o peón' => 'Jornalero o peón', 'Trabajador por cuenta' =>  'Trabajador por cuenta', 'Patron o empresario' => 'Patron o empresario', 'Trabajador no remunerado' => 'Trabajador no remunerado', 'Ama de casa' =>  'Ama de casa0',], ['prompt' => '---']) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'Domicilio')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'Denominacion')->dropDownList(['------' => '------','Pastor' => 'Pastor','Directivo' => 'Directivo','Instructor' => 'Instructor','Diácono' => 'Diácono','Guarda templo' => 'Guarda templo','Ayuda pastoral' => 'Ayuda pastoral','Instructor de niños' => 'Instructor de niños','Tesorero' => 'Tesorero','Secretario de la iglesia' => 'Secretario de la iglesia','Intersesor' => 'Intersesor ','Evangelista' => 'Evangelista',], ['prompt' => '---'])  ?>

  
  
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'casadoIgles')->dropDownList(['Si' =>  'Si', 'No' => 'No',], ['prompt' => '---']) ?>
    </div>
    
    <div class="col-sm">
    <?= $form->field($model, 'BautizadoIglesEva')->dropDownList(['Si' =>  'Si', 'No' => 'No',], ['prompt' => '---']) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'asisteIgles')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
 </fieldset> <br>
 <div style="width: 100%;">
  <fieldset style="width: 100%;">
 <h3>Datos del Testigo 1</h3> <br>

  <div class="row">
    <div class="col-sm">
    
    <?= $form->field($model, 'NomTestigo1')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
      
    
  <?= $form->field($model, 'DomicilioTes1')->textInput(['maxlength' => true]) ?>
    </div>
    
  </div>
  <h3>Datos del Testigo 2</h3><br>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'NomTestigo2')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'DomicilioTes2')->textInput(['maxlength' => true]) ?>
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
echo Html::a('Sí', ['/bautizo/index'], [
    'class' => 'w3-button w3-green button-spacing'
]);
echo '</div>';


echo '</div>';

Modal::end();?>
</fieldset>
</div>
</div>

    
    


  
    <?php ActiveForm::end(); ?>
<br><br><br>
</div>
