<?php

namespace app\models;
use app\models\Usuario;

use Yii;

/**
 * This is the model class for table "solicitudes".
 *
 * @property int $idSolicitud
 * @property string $Solicitud
 * @property int $usuario_idUsuario
 * @property string $usuario_Login_idLogin
 */
class Solicitudes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solicitudes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Solicitud', 'usuario_idUsuario', 'usuario_Login_idLogin'], 'required'],
            [['usuario_idUsuario'], 'integer'],
            [['Solicitud'], 'string', 'max' => 45],
            [['usuario_Login_idLogin'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSolicitud' => 'Id Solicitud',
            'Solicitud' => 'Solicitud',
            'usuario_idUsuario' => 'Nombre del Usuario',
            'usuario_Login_idLogin' => 'Username',
        ];
    }

   

    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'usuario_idUsuario']);
    }
   

   // Define la relación con el modelo Login
   public function getLogin()
   {
       return $this->hasOne(Login::className(), ['idLogin' => 'usuario_Login_idLogin']);
   }
  
    

}

