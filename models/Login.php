<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login".
 *
 * @property int $idLogin
 * @property string $password
 * @property string|null $tipoUsuario
 * @property string|null $username
 */
class Login extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'login';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password'], 'required'],
            [['tipoUsuario'], 'string'],
            [['password'], 'string', 'max' => 32],
            [['username'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLogin' => 'Id Login',
            'password' => 'Password',
            'tipoUsuario' => 'Tipo Usuario',
            'username' => 'Username',
        ];
    }

}
