<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Login;
use app\models\Usuario;
use yii\helpers\ArrayHelper;
use app\models\Solicitudes; // Asegúrate de ajustar la ruta a la clase 'Solicitudes' según la estructura de tu aplicación

/** @var yii\web\View $this */
/** @var app\models\Solicitudes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="solicitudes-form" style="color: white;">

    <?php $form = ActiveForm::begin(); ?>
    <div style="width: 100%;">
  <fieldset style="width: 100%;">
    <legend><?= Html::encode($this->title) ?></legend>
    <h1></h1>
 
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'Solicitud')->textInput(['maxlength' => true]) ?>
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
 <?= $form->field($model, 'usuario_idUsuario')->dropDownList($usuario, ['class' => 'form-control inline-block', 'prompt' => 'Seleccionar usuario']); ?>
   
    </div>

    <div class="col-sm">
    <?php
    $usuario=ArrayHelper::map(
        Usuario::find()->select(['nombre', 'apPaterno', 'apMaterno', 'idUsuario'])->all(),
        'idUsuario',
        function($data){
            return $data['nombre'].' '.$data['apPaterno'].' '.$data['apMaterno'];
        }
    );?>

   
<?= $form->field($model, 'usuario_Login_idLogin')->dropDownList($usuario, ['class' => 'form-control', 'prompt' => 'Seleccionar username']) ?>

    </div>
  </div>


    <div class="form-group">
        <?= Html::submitButton('Registrar', ['class' => 'btn btn-success']) ?>
    </div>

 
  </fieldset>
  </div>

  

    <?php ActiveForm::end(); ?>

</div>
