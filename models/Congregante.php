<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "congregante".
 *
 * @property int $idCongregante
 * @property string|null $Nombre_Con
 * @property string|null $Apellido_Pat
 * @property string|null $Apellido_Mat
 * @property string|null $Padres
 * @property string|null $Minis_Act
 * @property string|null $Estado_civil
 * @property string|null $Curp
 * @property string|null $Fecha_registro
 * @property string $edad
 */
class Congregante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'congregante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           
            [['edad', 'Comentarios'], 'required', 'message' => 'La edad no puede estar vacía.'],
           
            [['Nombre_Con', 'Apellido_Pat', 'Apellido_Mat', 'Padres', 'Minis_Act', 'Estado_civil', 'Curp', 'Fecha_registro'], 'required', 'message' => 'Asegurate que este contenido no este vacío'],
            [['Nombre_Con', 'Apellido_Pat', 'Apellido_Mat', 'Padres', 'Minis_Act', 'Estado_civil', 'Fecha_registro'], 'string', 'max' => 45, ],
            [['Curp',], 'string', 'max' => 18],
            [['edad'], 'string', 'max' => 2],
            [['Comentarios'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCongregante' => 'Id Congregante',
            'Nombre_Con' => 'Nombre del Congregante',
            'Apellido_Pat' => 'Apellido Paterno',
            'Apellido_Mat' => 'Apellido Materno',
            'Padres' => 'Nombres de padres',
            'Minis_Act' => 'Ministerio Actual',
            'Estado_civil' => 'Estado Civil',
            'Curp' => 'Curp',
            'Fecha_registro' => 'Fecha Registro',
            'edad' => 'Edad',
            'Comentarios' => 'Comentarios',
        ];
    }
}
