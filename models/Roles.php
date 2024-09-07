<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property string $tipoUsuario
 * @property string|null $formulario
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipoUsuario'], 'required'],
            [['tipoUsuario'], 'string'],
            [['formulario'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tipoUsuario' => 'Tipo Usuario',
            'formulario' => 'Formulario',
        ];
    }
}
