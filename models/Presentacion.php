<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presentacion".
 *
 * @property int $idPresentacion
 * @property string|null $Nombre_presentado
 * @property string|null $Apelli_Pat
 * @property string|null $Apellido_Mat
 * @property string|null $Edad
 * @property string|null $Municipio
 * @property string|null $Estado
 * @property string|null $Calle
 * @property string $No_Acta
 * @property string $CurpPres
 * @property string|null $Fecha_Regis
 * @property string $dia
 * @property string $mes
 * @property string $year
 * @property string|null $nombrePadre
 * @property string|null $apPaternoPadre
 * @property string|null $apMaternoPadre
 * @property string|null $OrigenPadre
 * @property int $EDAD_Padre
 * @property string|null $nombreMadre
 * @property string|null $apPaternoMadre
 * @property string|null $apMaternoMadre
 * @property string|null $OrigenMadre
 * @property int $EDAD_Madre
 * @property string|null $Folio
 * @property int $Congregante_idCongregante
 */
class Presentacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['No_Acta',  'dia', 'mes', 'year', 'CurpPres', 'EDAD_Padre', 'EDAD_Madre', 'Congregante_idCongregante'], 'required', 'message' => 'Contenido en blanco'],
            [['Fecha_Regis'], 'safe'],
            [['EDAD_Padre', 'EDAD_Madre', 'Congregante_idCongregante'], 'integer'],
            [['Nombre_presentado', 'Apelli_Pat', 'Apellido_Mat', 'Edad', 'Municipio', 'Estado', 'Calle', 'nombrePadre', 'apPaternoPadre', 'apMaternoPadre', 'OrigenPadre', 'nombreMadre', 'apPaternoMadre', 'apMaternoMadre', 'OrigenMadre', 'Folio'], 'required', 'message' => 'Contenido en blanco'],
            [['Nombre_presentado', 'Apelli_Pat', 'Apellido_Mat', 'Edad', 'Municipio', 'Estado', 'Calle', 'nombrePadre', 'apPaternoPadre', 'apMaternoPadre', 'OrigenPadre', 'nombreMadre', 'apPaternoMadre', 'apMaternoMadre', 'OrigenMadre', 'Folio'], 'string', 'max' => 45],
           
            [['mes', 'No_Acta'], 'string', 'max' => 25],
            [['CurpPres'], 'string', 'max' => 18],
            [['dia'], 'string', 'max' => 2],
            [['year'], 'string', 'max' => 35],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPresentacion' => 'Id Presentacion',
            'Nombre_presentado' => 'Nombre',
            'Apelli_Pat' => 'Apellido Paterno',
            'Apellido_Mat' => 'Apellido Materno',
            'Edad' => 'Edad',
            'Municipio' => 'Municipio',
            'Estado' => 'Estado',
            'Calle' => 'Calle',
            'No_Acta' => 'No. Acta',
            'CurpPres' => 'Curp',
            'Fecha_Regis' => 'Fecha Registro',
            'dia' => 'Dáa',
            'mes' => 'Mes',
            'year' => 'Año',
            'nombrePadre' => 'Nombre',
            'apPaternoPadre' => 'Apellido Paterno',
            'apMaternoPadre' => 'Apellido Materno',
            'OrigenPadre' => 'Origen',
            'EDAD_Padre' => 'Edad',
            'nombreMadre' => 'Nombre',
            'apPaternoMadre' => 'Apellido Paterno',
            'apMaternoMadre' => 'Apellido Materno',
            'OrigenMadre' => 'Origen',
            'EDAD_Madre' => 'Edad',
            'Folio' => 'Folio',
            'Congregante_idCongregante' => 'Congregante',
        ];

        
    }
    public static function generarNuevoFolio($idPresentacion)
    {
        $fecha = date('Ymd'); // Obtener la fecha actual en el formato YYYYMMDD
        return 'FGP' . $fecha . str_pad($idPresentacion, 7, '0', STR_PAD_LEFT);
    }

    public function getCongregante()
    {
        return $this->hasOne(Congregante::class, ['idCongregante' => 'Congregante_idCongregante']);
    }

    public function generateTableHtml()
    {
       // Generar un nombre único para el PDF
       $pdfName = 'Presentacion_' . uniqid() . '.pdf';
       $bgColor = '#24424c';
      
                
                // Generamos la tabla HTML vertical
        $html = '<div>';

        $html = '<table border="1" style="width:100%; text-align:center; border-collapse: collapse;">'; // Establecemos el ancho, alineamos el texto al centro y colapsamos los bordes de la tabla
        $html .= '<tr  style="width:100%; text-align:center; border-collapse: collapse; font-size: 11px;">';
        $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>IGLESIA</strong> <br>GETSEMANI</th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>MUNICIPIO</strong> <br>HUEJOTZINGO</th>';        
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>UBICACIÓN</strong><br>' . strtoupper('Camino Real A Huejotzingo 74160') . '</th>';
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>LOCALIDAD</strong><br>ATEXCAC</th>';
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>ENTIDAD FEDERATIVA</strong><br>PUEBLA</th>';
        $html .= '<td style=" border: 1px solid black; background-color:' . $bgColor . ';"><strong>' . strtoupper('Fecha') . '</strong> <br>'  . strtoupper($this->Fecha_Regis) . '</td>';
        $html .= '</tr>';

        $bgColor = '#B0C4DE';
        $html .= '<tr>';
        $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . '; width:100%;" COLSPAN=1><strong>DATOS DEL PRESENTADO DE ACUERDO A LAS SAGRADAS ESCRITURAS </strong></th>';
        $html .= '</tr>'; 

        $bgColor = '#24424c';
        $html .= '<tr>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->Nombre_presentado) . '<br ><hr style="width:30%;">NOMBRE</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->Apelli_Pat) . '<br><hr style="width:67% ;">APELLIDO PATERNO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->Apellido_Mat) .  '<br><hr style="width:70% ;">APELLIDO MATERNO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->Edad) . '<br><hr style="width:18% ;">EDAD</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr>';
        $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . '; width:100%;" COLSPAN=1><strong>DATOS DEL LOS PADRES </strong></th>';
        $html .= '</tr>'; 
        $bgColor = '#24424c';
        $html .= '<tr>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->nombrePadre) . '<br><hr style="width:70%;">NOMBRE DEL PADRE</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->apPaternoPadre) . '<br><hr style="width:67% ;">APELLIDO PATERNO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->apMaternoPadre) .  '<br><hr style="width:70% ;">APELLIDO MATERNO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->EDAD_Padre) . '<br><hr style="width:18% ;">EDAD</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr>';
        $html .= '<th style="width:100%; border: 1px solid black; text-align:left;  background-color:' . $bgColor . ';"> ORIGEN DEL PADRE: ' . mb_strtoupper($this->OrigenPadre ) .'</th>'; // Establecemos los bordes de las celdas
     
        $html .= '</tr>';
        $bgColor = '#24424c';
        $html .= '<tr>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->nombreMadre) . '<br><hr style="width:80% ;">NOMBRE DE LA MADRE</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->apPaternoMadre) . '<br><hr style="width:67% ;">APELLIDO PATERNO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">'.mb_strtoupper($this->apMaternoMadre) .  '<br><hr style="width:70% ;">APELLIDO MATERNO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->EDAD_Madre) . '<br><hr style="width:18% ;">EDAD</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr>';
        $html .= '<th style="width:100%; border: 1px solid black; text-align:left;  background-color:' . $bgColor . ';"> ORIGEN DE LA MADRE: ' . mb_strtoupper($this->OrigenMadre) .'</th>'; // Establecemos los bordes de las celdas
     
        $html .= '</tr>';
        $bgColor = '#24424c';
     
     
        $html .= '<tr>';
        $html .= '<th style="width:100% ; text-align:left; border: 1px solid black; background-color:' . $bgColor . ';"> DOMICILIO: '. mb_strtoupper($this->Calle) .'</th>'; // Establecemos los bordes de las celdas
     
        $html .= '</tr>';

       
        $bgColor = '#B0C4DE';
        
        
        $html .= '<tr>';
        $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . '; width:100%;"><strong>DATOS DE ACTA DE REGISTRO </strong></th>';
        $html .= '</tr>';
        $bgColor = '#24424c';
        $html .= '<tr>';
        $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->No_Acta) . '<br><hr style="width:24% ;">No. ACTA</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:33.3% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->Estado) . '<br><hr style="width:20% ;">ESTADO</th>';
        $html .= '<th style="width:33.4% border: 1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->Municipio) .  '<br><hr style="width:27% ;">MUNICIPIO</th>';
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr>';
        $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . '; width:100%;"><strong>FIRMAS DE PADRES, PASTOR Y SECRETARIO </strong></th>';
        $html .= '</tr>';
        $bgColor = '#24424c';
       
        $html .= '<tr style="border: 1px ; solid black; font-size: 10px;">';
        $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';"><br><br><br><br>' . mb_strtoupper($this->nombrePadre ) . ' ' . mb_strtoupper($this->apPaternoPadre) . ' ' . mb_strtoupper($this->apMaternoPadre ) .'<br> <b> FIRMA DEL PADRE</b> </th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';"><br><br><br><br>' . mb_strtoupper($this->nombreMadre ) . ' ' . mb_strtoupper($this->apPaternoMadre) . ' ' . mb_strtoupper($this->apMaternoMadre ) .'<br> <b>  FIRMA DE LA MADRE</b> </th>'; // Establecemos los bordes de las celdas
       
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style="border: 1px ; solid black; font-size: 10px;">';
        
        $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><br><br><br><br><br><b> FIRMA DEL SECRETARIO</b> </th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
        $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><br><br><br><br><br><b> FIRMA DEL PASTOR DE LA IGLESIA</b> </th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
        $html .= '</tr>';
  
        
        
        $html .= '</table>';
        $html .= '<p style="text-align:center; font-size: 10px; margin-top: 15px; margin-left: -15px;">';
        $html .= '<strong>' . mb_strtoupper('Pero JesÚs dijo: Dejad a los niÑos venir a mÍ, y no se lo impidÁis; porque de los tales es el reino de los cielos.<br> S. Mateo 19:14') . '</strong>';
        $html .= '</p>';
        $html .= '</div>';
            

        
        return $html;
    }
}