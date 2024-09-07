<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public $tipo;

    public static function isUserAdmin($id)
    {
       if (User::findOne(['idLogin' => $id, 'tipoUsuario' => 'Administrador'])){
        return true;

    } else {
        return false;
    }

}
public static function isUsuario($id)
{
   if (User::findOne(['idLogin' => $id, 'tipoUsuario' => 'Usuario'])){
    return true;
} else {

    return false;
}

}

    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'login'; // Nombre de la tabla en la base de datos
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // No implementamos esto, así que simplemente retornamos null
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->idLogin;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        // No implementamos esto, así que simplemente retornamos null
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        // No implementamos esto, así que simplemente retornamos false
        return false;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    public function getUsername ()
    {
        return $this->username;
    }
}