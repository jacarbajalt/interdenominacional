<?php

namespace app\models;

use Yii;

use app\models\Solicitudes;
/**
 * This is the model class for table "bautizo".
 *
 * @property int $idBautizo
 * @property string $nombre
 * @property string $apPaterno
 * @property string $apMaterno
 * @property string $Domicilio
 * @property string $estadoCivil
 * @property string $casadoIgles
 * @property string $BautizadoIglesEva
 * @property string $Denominacion
 * @property string $asisteIgles
 * @property string $Nacionalidad
 * @property string $Ocupacion
 * @property string $edad
 * @property string $NomTestigo1
 * @property string $NomTestigo2
 * @property string $DomicilioTes1
 * @property string $DomicilioTes2
 * @property string|null $Fecha_registro
 * @property string $dia
 * @property string $mes
 * @property int $year
 * @property string|null $Folio
 * @property int $solicitudes_idSolicitud
 * @property int $Congregante_idCongregante
 */
class Bautizo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bautizo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apPaterno', 'apMaterno', 'Domicilio', 'estadoCivil', 'casadoIgles', 'BautizadoIglesEva', 'Denominacion', 'asisteIgles', 'Nacionalidad', 'Ocupacion', 'edad', 'NomTestigo1', 'NomTestigo2', 'DomicilioTes1', 'DomicilioTes2', 'dia', 'mes', 'year', 'solicitudes_idSolicitud', 'Congregante_idCongregante'], 'required', 'message' => 'Contenido en blanco'],
            [['Fecha_registro'], 'safe'],
            [['year', 'solicitudes_idSolicitud', 'Congregante_idCongregante'], 'integer'],
            [['nombre', 'apPaterno', 'apMaterno', 'estadoCivil', 'asisteIgles', 'Ocupacion', 'Folio'], 'string', 'max' => 45],
            [['Domicilio', 'BautizadoIglesEva', 'DomicilioTes1', 'DomicilioTes2'], 'string', 'max' => 35],
            [['casadoIgles'], 'string', 'max' => 8],
            [['Denominacion', 'Nacionalidad'], 'string', 'max' => 25],
            [['edad', 'dia'], 'string', 'max' => 2],
            [['NomTestigo1', 'NomTestigo2'], 'string', 'max' => 40],
            [['mes'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idBautizo' => 'Id Bautizo',
            'nombre' => 'Nombre',
            'apPaterno' => 'Apellido Paterno',
            'apMaterno' => 'Apellido Materno',
            'Domicilio' => 'Domicilio',
            'estadoCivil' => 'Estado Civil',
            'casadoIgles' => 'Casado en Iglesia',
            'BautizadoIglesEva' => 'Bautizado por una Iglesia',
            'Denominacion' => 'Denominación',
            'asisteIgles' => 'Desde cuando asiste a la iglesia',
            'Nacionalidad' => 'Nacionalidad',
            'Ocupacion' => 'Ocupacion',
            'edad' => 'Edad',
            'NomTestigo1' => 'Nombre completo del Testigo 1',
            'NomTestigo2' => 'Nombre completo del Testigo 2',
            'DomicilioTes1' => 'Domicilio completo Testigo 1',
            'DomicilioTes2' => 'Domicilio completo Testigo 2',
            'Fecha_registro' => 'Fecha Registro',
            'dia' => 'Día',
            'mes' => 'Mes',
            'year' => 'Año',
            'Folio' => 'Folio',
            'solicitudes_idSolicitud' => 'Solicitudes',
            'Congregante_idCongregante' => 'Congregante',
        ];
    }
    

       public static function generarNuevoFolio($idBautizo)
    {
        $fecha = date('Ymd'); // Obtener la fecha actual en el formato YYYYMMDD
        return 'FGB' . $fecha . str_pad($idBautizo, 7, '0', STR_PAD_LEFT);
    }

    public function getCongregante()
{
    return $this->hasOne(Congregante::class, ['idCongregante' => 'Congregante_idCongregante']);
}


public function getSolicitud()
{
    return $this->hasOne(Solicitudes::className(), ['idSolicitud' => 'solicitudes_idSolicitud']);
}


    public function generateTableHtml()
    {
       // Generar un nombre único para el PDF
       $pdfName = 'bautizo_' . uniqid() . '.pdf';
       $bgColor = '#24424c';
       // Generamos la tabla HTML vertical




      
            
                // Generamos la tabla HTML vertical
        $html = '<div>';

        $html = '<table border="1" style="width:100%; text-align:center; border-collapse: collapse;">'; // Establecemos el ancho, alineamos el texto al centro y colapsamos los bordes de la tabla
        $html .= '<tr  style="width:100%; text-align:center; border-collapse: collapse; font-size: 11px;">';
        $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>IGLESIA</strong> <br>GETSEMANI</th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>MUNICIPIO</strong> <br>HUEJOTZINGO</th>';        
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>UBICACIÓN</strong><br>' . strtoupper('Camino Real A Huejotzingo 74160') . '</th>';
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>LOCALIDAD</strong><br>ATEXCAC</th>';
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>ENTIDAD FEDERATIVA</strong><br>PUEBLA</th>';
        $html .= '<td style=" border: 1px solid black; background-color:' . $bgColor . ';"><strong>' . strtoupper('Fecha') . '</strong> <br>'  . strtoupper($this->Fecha_registro) . '</td>';
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr>';
        $html .= '<th COLSPAN=6 style="width:100%;  background-color:' . $bgColor . '; font-size: 12px;"><strong>' . strtoupper('Datos del bautizado') . '</strong></th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#24424c';
        $html .= '<tr>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->nombre) . '<br><hr style="width:31% ;">NOMBRE</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->apPaterno) . '<br><hr style="width:61% ;">PRIMER APELLIDO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->apMaterno) .  '<br><hr style="width:70% ;">SEGUNDO APELLIDO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->edad) . '<br><hr style="width:22% ;">EDAD</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr>';
        $html .= '<th style="width:100% border: 1px solid black; text-align:left;background-color:' . $bgColor . ';"><br><br>DOMICILIO: ' . mb_strtoupper($this->Domicilio) .
        '<br><hr style="width:100% ;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CALLE AVENIDA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; COLONIA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; C.P</th>'; // Establecemos el fondo y los bordes de la fila
       
        $html .= '</tr>';
        $bgColor = '#24424c';
       
       
        $html .= '<tr>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">NACIONALIDAD<br>' . mb_strtoupper($this->Nacionalidad) . '</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">ESTADO CIVIL<br>'. mb_strtoupper($this->estadoCivil) . '</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">CASADO POR LA IGLESIA<br>'. mb_strtoupper($this->casadoIgles) .  '</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">OCUPACION<br>' . mb_strtoupper($this->Ocupacion) . '</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';

        $bgColor = '#B0C4DE';
        $html .= '<tr>';
        $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">¿BAUTIZADO POR UNA IGLESIA EVANGELICA?<br>' . mb_strtoupper($this->BautizadoIglesEva) . '</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:33.3% border:1px solid black; background-color:' . $bgColor . ';">DENOMINACIÓN<br><br>'. mb_strtoupper($this->Denominacion) . '</th>';
        $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">¿DESDE CUANTO ASISTE A ESTA IGLESIA?<br>'. mb_strtoupper($this->asisteIgles) .  '</th>';
       
        $html .= '</tr>';
        $bgColor = '#24424c';
        $html .= '<tr>';
        $html .= '<th style="width:100% border: 1px solid black; text-align:left; background-color:' . $bgColor . ';">DOMICILIO TESTIGO 1: ' . mb_strtoupper($this->DomicilioTes1) .'</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr>';
        $html .= '<th style="width:100% border: 1px solid black; text-align:left; background-color:' . $bgColor . ';">DOMICILIO TESTIGO 2: ' . mb_strtoupper($this->DomicilioTes2) .'</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';   
        $bgColor = '#24424c';
        $html .= '<tr>';
        $html .= '<th style="width:100%; border: 1px solid black; background-color:' . $bgColor . '; font-size: 12px;" COLSPAN=1><strong>FIRMA DE TESTIGO Y SECRETARÍA</strong> </th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';

        $bgColor = '#B0C4DE';
        $html .= '<tr style="border: 1px ; solid black; font-size: 11px;">';
        $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';"><br><br><br><br><br>' . mb_strtoupper($this->NomTestigo1 ) .'<br><b>FIRMA DEL TESTIGO 1</b> </th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . '; font-size: 11px;" COLSPAN=1><strong><br><br><br><br><br><b>FIRMA DE SECRETARÍA</b></strong> </th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
   
        $bgColor = '#24424c';
        $html .= '<tr>';
        $html .= '<th style="width:100%; border: 1px solid black; background-color:' . $bgColor . '; font-size: 12px;" COLSPAN=1><strong>FIRMA DE BAUTIZADO Y PASTOR</strong>
        </th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style="border: 1px ; solid black; font-size: 11px;">';
        $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';"><br><br><br><br><br>' . mb_strtoupper($this->nombre ) . ' ' . mb_strtoupper($this->apPaterno) . ' ' . mb_strtoupper($this->apMaterno ) .'<br> <b>FIRMA DEL BAUTIZADO</b></th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><br><br><br><br><br><br><b>FIRMA DEL PASTOR DE LA IGLESIA</b></th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
        $html .= '</tr>';

       

        $html .= '</table>';
         
        $html .= '<p style=" text-align:center; font-size: 9px; margin-top: 15px; margin-left: -15px;">';
        $html .= '<strong>' . mb_strtoupper('Por tanto, id, y haced discípulos a todas las naciones, bautizándolos en el nombre del Padre, y del Hijo, y del Espíritu Santo.
        <br> S.Mateo 28:19') . '</strong>';
        $html .= '</p>';
        $html .= '</div>';
            

        
        return $html;
    }

}

