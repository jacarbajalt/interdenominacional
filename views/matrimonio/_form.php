
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use Faker\Factory;
use app\models\Defuncion;
use app\models\Congregante;
use app\models\Solicitudes;
use app\models\Matrimonio;
use dosamigos\datepicker\DatePicker;
use kartik\month\MonthPicker;
use yii\db\Expression;
use yii\web\View;
use yii\bootstrap4\Modal;
// Establecer la zona horaria de México, Puebla
date_default_timezone_set('America/Mexico_City');

$fechaRegistro = date('Y-m-d H:i:s');

// Pasar la fecha al modelo
$model->Fecha_Registro = $fechaRegistro;



/** @var yii\web\View $this */
/** @var app\models\Matrimonio $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerJs("
    // Obtener la fecha actual
    var currentDate = new Date();
    var dia = currentDate.getDate();
    var mesArray = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var mes = mesArray[currentDate.getMonth()]; // Los meses en JavaScript son 0-indexados
    var year = currentDate.getFullYear();
    
    // Establecer los valores de los campos de fecha
    $('#matrimonio-dia').val(dia);
    $('#matrimonio-mes').val(mes);
    $('#matrimonio-year').val(year);
");

?>


<?= Html::cssFile('@web/css/matrimonio.css') ?>


<br>
<div class="matrimonio-form" style="color: white;">



<div class="bautizo-form" style="color: black;">
    <?php $form = ActiveForm::begin(['id' => 'defunsion-form']); ?>

    <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span><br>
        <p>     Si el formulario no deja avanzar a la siguiente ventana es debido a campos vacíos se recomienda revisar nuevamente el formulario y llenar el campo vacío <br> <b>Recuerda que si no se tiene toda la informacion rellena con lineas ------ el campo 5 a 6 maximo  </b>
        <br> <b style="color: red;">Ejemplo</b> <br> 
     
        <label for="fname">Edad:</label><br>
        <input type="text" id="Nacionalidad" name="fname" value="25" disabled><br>
        <label for="lname">Colonia:</label><br>
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

   

<?= $form->field($model, 'dia')->hiddenInput(['id' => 'matrimonio-dia'])->label(false) ?>

<?= $form->field($model, 'mes')->hiddenInput(['id' => 'matrimonio-mes'])->label(false) ?>

<?= $form->field($model, 'year')->hiddenInput(['id' => 'matrimonio-year'])->label(false) ?>

    <div style="width: 100%;">

  <fieldset style="width: 100%;">
  <h1><?= Html::encode($this->title) ?></h1> <br>
    <div class="row justify-content-start">
    <div class="col-sm">
    <?= $form->field($model, 'Fecha_Registro')->textInput(['readonly' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'Folio')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $model->isNewRecord ? \app\models\Matrimonio::generarNuevoFolio(Matrimonio::find()->max('idMatrimonio') + 1) : $model->Folio]) ?>
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
  <hr>
  <h1>Datos del novio</h1><br>
  <div class="row justify-content-start">
    <div class="col-sm">
        <!--- bloqueo de numeros de nomre solo letras--->
 <?php
$script = <<< JS
document.getElementById('nombreNovio').onkeydown = function(event) {
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
    <?= $form->field($model, 'nombreNovio')->textInput(['maxlength' => true, 'id' => 'nombreNovio']) ?>
    </div>
    <div class="col-sm">
       
    <!--- bloqueo de numeros solo letras--->
    <?php
$script = <<< JS
document.getElementById('apPaternoNovio').onkeydown = function(event) {
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


    <?= $form->field($model, 'apPaternoNovio')->textInput(['maxlength' => true, 'id' => 'apPaternoNovio']) ?>
    </div>
    <div class="col-sm">
      <!--- bloqueo de numeros solo letras--->
    <?php
$script = <<< JS
document.getElementById('apMaternoNovio').onkeydown = function(event) {
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

    <?= $form->field($model, 'apMaternoNovio')->textInput(['maxlength' => true, 'id' => 'apMaternoNovio']) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'edadNovio')->textInput(['type' => 'number', 'min' => 0]) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'curpNovio')->textInput(['maxlength' => true, 'oninput' => 'this.value = this.value.toUpperCase();']) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'direccionNovio')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'coloniaNovio')->textInput(['maxlength' => true]) ?>
 <!--- bloqueo de letras solo numeros--->
<?php
$script = <<< JS
document.getElementById('cPostalNovio').addEventListener('input', function(event) {
let inputValue = event.target.value;
let numericValue = inputValue.replace(/\D/g, ''); // Remueve todo excepto números

if (inputValue !== numericValue) {
    event.target.value = numericValue; // Actualiza el valor del campo solo con números
}
});
JS;
$this->registerJs($script);
?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'cPostalNovio')->textInput(['maxlength' => true, 'id' => 'cPostalNovio']) ?>

<!--- bloqueo de numeros solo letras--->
<?php
$script = <<< JS
document.getElementById('estadoNovio').onkeydown = function(event) {
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
    <div class="col-sm">
    <?= $form->field($model, 'estadoNovio')->textInput(['maxlength' => true, 'id' => 'estadoNovio'])  ?>
    </div>
    <div class="col-sm">
     
    </div>
  </div>
  <h3 style="color: blue;">Datos de los padres</h3>
  <hr>
  <p style="color: red;">Datos del padre</p>
  <div class="row">
   
    <div class="col-sm">
        <!--- bloqueo de numeros de nomre solo letras--->

        <?php
$script = <<< JS
document.getElementById('Padre_Novio').onkeydown = function(event) {
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
    <?= $form->field($model, 'Padre_Novio')->textInput(['maxlength' => true, 'id' => 'Padre_Novio']) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'Domici_Padre')->textInput(['maxlength' => true]) ?>
    </div>
    
  </div>
  <p style="color: red;">Datos de la madre</p>
  <div class="row">
    <div class="col-sm">
    <?php
$script = <<< JS
document.getElementById('Madre_novio').onkeydown = function(event) {
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
    <?= $form->field($model, 'Madre_novio')->textInput(['maxlength' => true, 'id' => 'Madre_novio']) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'Domic_MadreNov')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
 </fieldset>
 </div>
 <br>
 <div style="width: 100%;">
  <fieldset style="width: 100%;">
  <h1>Datos de la novia</h1><br>
 <div class="row">
    <div class="col-sm">
      <!--- bloqueo de numeros solo letras--->
<?php
$script = <<< JS
document.getElementById('nombreNovia').onkeydown = function(event) {
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

<?= $form->field($model, 'nombreNovia')->textInput(['maxlength' => true, 'id' => 'nombreNovia'])  ?>
    </div>
    <div class="col-sm">
    
<!--- bloqueo de numeros solo letras--->
<?php
$script = <<< JS
document.getElementById('apPaternoNovia').onkeydown = function(event) {
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


<?= $form->field($model, 'apPaternoNovia')->textInput(['maxlength' => true, 'id' => 'apPaternoNovia']) ?>
    </div>
    <div class="col-sm">
     <!--- bloqueo de numeros solo letras--->
<?php
$script = <<< JS
document.getElementById('apMaternoNovia').onkeydown = function(event) {
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

<?= $form->field($model, 'apMaternoNovia')->textInput(['maxlength' => true, 'id' => 'apMaternoNovia']) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'edadNovia')->textInput(['type' => 'number', 'min' => 0]) ?>

    </div>
    <div class="col-sm">
    <?= $form->field($model, 'curpNovia')->textInput(['maxlength' => true, 'oninput' => 'this.value = this.value.toUpperCase();']) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'direccionNovia')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'coloniaNovia')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
      <!--- bloqueo de letras solo numeros--->
<?php
$script = <<< JS
document.getElementById('cPostalNovia').addEventListener('input', function(event) {
let inputValue = event.target.value;
let numericValue = inputValue.replace(/\D/g, ''); // Remueve todo excepto números

if (inputValue !== numericValue) {
    event.target.value = numericValue; // Actualiza el valor del campo solo con números
}
});
JS;
$this->registerJs($script);
?>

<?= $form->field($model, 'cPostalNovia')->textInput(['maxlength' => true, 'id' => 'cPostalNovia']) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'estadoNovia')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
  <h3 style="color: blue;">Datos de los padres</h3>
  <hr>
  <p style="color: red;">Datos del padre</p>
  <div class="row justify-content-start">
    <div class="col-sm">
      

<?php
$script = <<< JS
document.getElementById('Padre_Novia').onkeydown = function(event) {
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
    <?= $form->field($model, 'Padre_Novia')->textInput(['maxlength' => true, 'id' => 'Padre_Novia']) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'Domic_Pa_Novia')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
  <p style="color: red;">Datos de la madre</p>
  <div class="row">
    <div class="col-sm">
    <?php
$script = <<< JS
document.getElementById('Madre_novia').onkeydown = function(event) {
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
    <?= $form->field($model, 'Madre_novia')->textInput(['maxlength' => true, 'id' => 'Madre_novia']) ?>
    </div>
    <div class="col-sm">
      
<?= $form->field($model, 'Domic_Ma_Novia')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
  </fieldset>
  </div>
<br>
<div style="width: 100%;">
  <fieldset style="width: 100%;">
    <H1>Datos de acta de Matrimonio Civil</H1><br>
<div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'municipioMatCivil')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'numActaMatCivil')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col-sm">
    <?= $form->field($model, 'diaMatCivil')->dropDownList(
    ['Sin día' => 'Sin día'] + range(1, 31),
    ['prompt' => 'Seleccione el día']) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
      
<?= $form->field($model, 'mesMatCivil')->dropDownList(
[
    'Sin mes' => 'Sin mes',
    'Enero' => 'Enero',
    'Febrero' => 'Febrero',
    'Marzo' => 'Marzo',
    'Abril' => 'Abril',
    'Mayo' => 'Mayo',
    'Junio' => 'Junio',
    'Julio' => 'Julio',
    'Agosto' => 'Agosto',
    'Septiembre' => 'Septiembre',
    'Octubre' => 'Octubre',
    'Noviembre' => 'Noviembre',
    'Diciembre' => 'Diciembre',
],
['prompt' => 'Selecciona un mes ...']
) ?>
    </div>
    <div class="col-sm">
    <?php
// Genera un rango de años desde hace 100 años hasta dentro de 10 años en el futuro
$years = range(date('Y') - 2020, date('Y') + 1);

// Voltea el arreglo para que los años más recientes aparezcan primero
$years = array_reverse($years);

// Crea un arreglo asociativo de años donde el valor y la etiqueta son iguales
$yearOptions = array_combine($years, $years);


?>

<?= $form->field($model, 'anioMatCivil')->dropDownList(
    ['' => 'Sin año'] + $yearOptions,
    ['prompt' => 'Selecciona un año ...']
) ?>

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
echo Html::a('Sí', ['/matrimonio/index'], [
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