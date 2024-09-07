<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Congregante;
use app\models\Solicitudes;
use app\models\Presentacion;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Modal;
use Faker\Factory;
use dosamigos\datepicker\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Presentacion $model */
/** @var yii\widgets\ActiveForm $form */

// Establecer la zona horaria de México, Puebla
date_default_timezone_set('America/Mexico_City');

$fechaRegistro = date('Y-m-d H:i:s');

// Pasar la fecha al modelo
$model->Fecha_Regis = $fechaRegistro;

$this->registerJs("
    // Obtener la fecha actual
    var currentDate = new Date();
    var dia = currentDate.getDate();
    var mesArray = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var mes = mesArray[currentDate.getMonth()]; // Los meses en JavaScript son 0-indexados
    var year = currentDate.getFullYear();
    
    // Establecer los valores de los campos de fecha
    $('#presentacion-dia').val(dia);
    $('#presentacion-mes').val(mes);
    $('#presentacion-year').val(year);
");


?>
<?= Html::cssFile('@web/css/presentacion.css') ?>

<div class="presentacion-form">

    <?php $form = ActiveForm::begin(['id' => 'presentacion-form']); ?>

    <div id="id01" class="w3-modal" style="color: black;">
        <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="document.getElementById('id01').style.display='none'"
                    class="w3-button w3-display-topright">&times;</span><br>
                <p> Si el formulario no deja avanzar a la siguiente ventana es debido a campos vacíos se recomienda
                    revisar nuevamente el formulario y llenar el campo vacío <br> <b>Recuerda que si no se tiene toda la
                        informacion rellena con lineas ------ el campo 5 o 6 maximo </b> <br><b style="color: red;">Ejemplo</b> <br> 
      
  <label for="fname">Edad</label><br>
  <input type="text" id="Nacionalidad" name="fname" value="25" disabled><br>
  <label for="lname">Origen:</label><br>
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


<?= $form->field($model, 'dia')->hiddenInput(['id' => 'presentacion-dia'])->label(false) ?>

<?= $form->field($model, 'mes')->hiddenInput(['id' => 'presentacion-mes'])->label(false) ?>

<?= $form->field($model, 'year')->hiddenInput(['id' => 'presentacion-year'])->label(false) ?>

<div style="width: 100%;">
    <fieldset style="width: 100%;">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <br><br> <br>
            <div class="col-sm">
                <?= $form->field($model, 'Fecha_Regis')->textInput(['readonly' => true]) ?>
            </div>
            <div class="col-sm">
                <?= $form->field($model, 'Folio')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $model->isNewRecord ? \app\models\Presentacion::generarNuevoFolio(Presentacion::find()->max('idPresentacion') + 1) : $model->Folio]) ?>
            </div>
            <div class="col-sm">

                <?php
                $congregante = ArrayHelper::map(
                    Congregante::find()->select(['Nombre_Con', 'Apellido_Pat', 'Apellido_Mat', 'idCongregante'])->all(),
                    'idCongregante',
                    function ($data) {
                        return $data['Nombre_Con'] . ' ' . $data['Apellido_Pat'] . ' ' . $data['Apellido_Mat'];
                    }
                ); ?>

                <?= $form->field($model, 'Congregante_idCongregante')->dropDownList($congregante, ['class' => 'form-control inline-block', 'prompt' => 'Seleccionar Congregante']); ?>
            </div>


        </div>



        <h3>DATOS DEL PEQUEÑO/A</h3>

        <div class="row">
            <div class="col-sm">
                <?php
                $script = <<<JS
document.getElementById('Nombre_presentado').onkeydown = function(event) {
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

                <?= $form->field($model, 'Nombre_presentado')->textInput(['maxlength' => true, 'id' => 'Nombre_presentado']) ?>
            </div>
            <div class="col-sm">
                <?= $form->field($model, 'Apelli_Pat')->textInput(['maxlength' => true, 'id' => 'Apelli_Pat']) ?>

                <!--- bloqueo de numeros--->

                <?php
                $script = <<<JS
document.getElementById('Apelli_Pat').onkeydown = function(event) {
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

                <?= $form->field($model, 'Apellido_Mat')->textInput(['maxlength' => true, 'id' => 'Apellido_Mat']) ?>
                <!--- bloqueo de numeros--->
                <?php $script = <<<JS
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
            <div class="col-sm">
                <?= $form->field($model, 'Edad')->textInput(['maxlength' => true]) ?>

            </div>
        </div>


        <H3>DATOS DEL REGISTRO</H3>
        <div class="row">
            <div class="col-sm">
                <?= $form->field($model, 'CurpPres')->textInput(['maxlength' => true, 'oninput' => 'this.value = this.value.toUpperCase();']) ?>

            </div>
            <div class="col-sm">
                <?= $form->field($model, 'No_Acta')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm">
                <?php
                $script = <<<JS
document.getElementById('Estado').onkeydown = function(event) {
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

                <?= $form->field($model, 'Estado')->textInput(['maxlength' => true, 'id' => 'Estado']) ?>
            </div>
            <div class="col-sm">
                <?php
                $script = <<<JS
document.getElementById('Municipio').onkeydown = function(event) {
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

                <?= $form->field($model, 'Municipio')->textInput(['maxlength' => true, 'id' => 'Municipio']) ?>
            </div>
        </div>




        <H3>DATOS DEL PADRE</H3>

        <div class="row ">
            <div class="col-sm">
                <?= $form->field($model, 'nombrePadre')->textInput(['maxlength' => true, 'id' => 'nombrePadre']) ?>
                <!--- bloqueo de numeros--->
                <?php
                $script = <<<JS
document.getElementById('nombrePadre').onkeydown = function(event) {
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
                <?= $form->field($model, 'apPaternoPadre')->textInput(['maxlength' => true, 'id' => 'apPaternoPadre']) ?>

                <!--- bloqueo de numeros--->

                <?php
                $script = <<<JS
document.getElementById('apPaternoPadre').onkeydown = function(event) {
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
                <?= $form->field($model, 'apMaternoPadre')->textInput(['maxlength' => true, 'id' => 'apMaternoPadre']) ?>
                <!--- bloqueo de numeros--->
                <?php $script = <<<JS
    document.getElementById('apMaternoPadre').onkeydown = function(event) {
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
                <?= $form->field($model, 'EDAD_Padre')->textInput(['type' => 'number', 'min' => 0]) ?>
            </div>
        </div>
        <div class="row">
            <style>
                .ca {
                    max-width: 50%;
                }

                /* Estilos adicionales para la adaptación de la página */
                @media (max-width: 500px) {

                    /* Estilos para dispositivos pequeños */
                    .ca {
                        max-width: 100%;
                    }

                }

                @media (min-width: 501px) and (max-width: 768px) {
                    /* Estilos para dispositivos medianos */

                    .ca {
                        max-width: 100%;
                    }
                }

                /* Estilos adicionales para la adaptación de la página */
                @media (max-width: 768px) {

                    /* Estilos para dispositivos pequeños (smartphones en vertical y tablets en vertical) */
                    .ca {
                        max-width: 100%;
                    }
                }

                @media (min-width: 769px) and (max-width: 992px) {

                    /* Estilos para dispositivos medianos (tablets en horizontal y laptops) */
                    .ca {
                        max-width: 100%;
                    }
                }

                @media (min-width: 993px) {
                    .ca {
                        max-width: 50%;
                    }
                }
            </style>
            <div class="col-sm ca">

                <?= $form->field($model, 'OrigenPadre')->textInput(['maxlength' => true, 'id' => 'OrigenPadre']) ?>

            </div>

        </div>
        <H3>DATOS DE LA MADRE</H3>
        <div class="row">
            <div class="col-sm">
                <?= $form->field($model, 'nombreMadre')->textInput(['maxlength' => true, 'id' => 'nombreMadre']) ?>
                <!--- bloqueo de numeros--->
                <?php
                $script = <<<JS
document.getElementById('nombreMadre').onkeydown = function(event) {
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
                <?= $form->field($model, 'apPaternoMadre')->textInput(['maxlength' => true, 'id' => 'apPaternoMadre']) ?>

                <!--- bloqueo de numeros--->

                <?php
                $script = <<<JS
document.getElementById('apPaternoMadre').onkeydown = function(event) {
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


                <?= $form->field($model, 'apMaternoMadre')->textInput(['maxlength' => true, 'id' => 'apMaternoMadre']) ?>
                <!--- bloqueo de numeros--->
                <?php $script = <<<JS
    document.getElementById('apMaternoMadre').onkeydown = function(event) {
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
                <?= $form->field($model, 'EDAD_Madre')->textInput(['type' => 'number', 'min' => 0]) ?>
            </div>

        </div>




        <div class="row">
            <div class="col-sm ca">

                <?= $form->field($model, 'OrigenMadre')->textInput(['maxlength' => true, 'id' => 'OrigenMadre']) ?>



            </div>


        </div>
    
    </fieldset>
</div>
<br>
<div style="width: 100%;">
            <fieldset style="width: 100%;">
                <div class="row">
                    <div class="col">
                        <p style="font-size: 25px; color: red; "> Domicilio del padre y madre </p>

                        <?= $form->field($model, 'Calle')->textInput(['maxlength' => true]) ?>


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
echo Html::submitButton('Registrar', ['class' => 'w3-button w3-green button-spacing', 'form' => 'presentacion-form']);
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

Modal::end(); ?>
    </fieldset>
    </div>
 
<?php ActiveForm::end(); ?>
<br><br><br>

</div>