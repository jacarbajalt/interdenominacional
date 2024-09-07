<?php

namespace app\models;

use Yii;

use app\models\Login;
/**
 * This is the model class for table "usuario".
 *
 * @property int $idUsuario
 * @property string $nombre
 * @property string $apPaterno
 * @property string $apMaterno
 * @property string $edad
 * @property string $direccion
 * @property string $colonia
 * @property string $municipio
 * @property string $telefono
 * @property string $cpostal
 * @property string $estado
 * @property string $curp
 * @property string $correo
 * @property string $Login_idLogin
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apPaterno', 'apMaterno', 'edad', 'direccion', 'colonia', 'municipio', 'telefono', 'cpostal', 'estado', 'curp', 'correo', 'Login_idLogin'], 'required'],
            [['nombre'], 'string', 'max' => 100],
            [['apPaterno', 'correo'], 'string', 'max' => 60],
            [['apMaterno'], 'string', 'max' => 50],
            [['edad'], 'string', 'max' => 2],
            [['direccion'], 'string', 'max' => 150],
            [['colonia', 'municipio', 'estado'], 'string', 'max' => 45],
            [['telefono'], 'string', 'max' => 10],
            [['cpostal'], 'string', 'max' => 7],
            [ 'cpostal', 'match', 'pattern' => '/^[0-9]+$/', 'message' => 'El código postal solo puede contener números.'],
            [['curp'],  'string', 'max' => 18,  ],
            ['curp', 'match', 'pattern' => '/^[A-ZÑ&=.\d-]{18}$/i', 'message' => 'El formato de la CURP no es válido.'],
            [['Login_idLogin'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'nombre' => 'Nombre',
            'apPaterno' => 'Apellido Paterno',
            'apMaterno' => 'Apellido Materno',
            'edad' => 'Edad',
            'direccion' => 'Dirección',
            'colonia' => 'Colonia',
            'municipio' => 'Municipio',
            'telefono' => 'Teléfono',
            'cpostal' => 'Código postal',
            'estado' => 'Estado',
            'curp' => 'Curp',
            'correo' => 'Correo',
            'Login_idLogin' => 'Username',
        ];
    }

    public function getLogin()
    {
        return $this->hasOne(Login::class, ['idLogin' => 'Login_idLogin']);
    }


}
