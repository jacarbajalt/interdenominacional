<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matrimonio".
 *
 * @property int $idMatrimonio
 * @property string|null $Fecha_Registro
 * @property int $solicitudes_idSolicitud
 * @property string|null $nombreNovio
 * @property string|null $apPaternoNovio
 * @property string|null $apMaternoNovio
 * @property string|null $edadNovio
 * @property string $curpNovio
 * @property string|null $direccionNovio
 * @property string|null $coloniaNovio
 * @property string|null $cPostalNovio
 * @property string|null $estadoNovio
 * @property string $Padre_Novio
 * @property string $Domici_Padre
 * @property string $Madre_novio
 * @property string $Domic_MadreNov
 * @property string|null $nombreNovia
 * @property string|null $apPaternoNovia
 * @property string|null $apMaternoNovia
 * @property string|null $edadNovia
 * @property string $curpNovia
 * @property string|null $direccionNovia
 * @property string|null $coloniaNovia
 * @property string|null $cPostalNovia
 * @property string|null $estadoNovia
 * @property string $Padre_Novia
 * @property string $Domic_Pa_Novia
 * @property string $Madre_novia
 * @property string $Domic_Ma_Novia
 * @property string|null $numActaMatCivil
 * @property string|null $municipioMatCivil
 * @property string|null $diaMatCivil
 * @property string|null $mesMatCivil
 * @property string|null $anioMatCivil
 * @property string|null $Folio
 * @property int $Congregante_idCongregante
 */
class Matrimonio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrimonio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha_Registro'], 'safe'],
            [['dia', 'mes', 'year', 'solicitudes_idSolicitud', 'curpNovio', 'Padre_Novio', 'Domici_Padre', 'Madre_novio', 'Domic_MadreNov', 'curpNovia', 'Padre_Novia', 'Domic_Pa_Novia', 'Madre_novia', 'Domic_Ma_Novia', 'Congregante_idCongregante'], 'required', 'message' => 'Contenido en blanco'],
            [['solicitudes_idSolicitud', 'Congregante_idCongregante'], 'integer'],
            [['nombreNovio', 'nombreNovia'], 'required', 'message' => 'Contenido en blanco'],


            [['nombreNovio', 'nombreNovia'], 'string', 'max' => 100],
            [['apPaternoNovio', 'apPaternoNovia'], 'string', 'max' => 60],

            [['apPaternoNovio', 'apPaternoNovia'], 'required', 'message' => 'Contenido no este blanco'],

            [['apMaternoNovio', 'direccionNovio', 'coloniaNovio', 'estadoNovio', 'apMaternoNovia', 'direccionNovia', 'coloniaNovia', 'estadoNovia', 'numActaMatCivil', 'municipioMatCivil', 'diaMatCivil', 'mesMatCivil', 'anioMatCivil', 'Folio'], 'required', 'message' => 'Contenido en blanco'],
            [['apMaternoNovio', 'direccionNovio', 'coloniaNovio', 'estadoNovio', 'apMaternoNovia', 'direccionNovia', 'coloniaNovia', 'estadoNovia', 'numActaMatCivil', 'municipioMatCivil', 'diaMatCivil', 'mesMatCivil', 'anioMatCivil', 'Folio'], 'string', 'max' => 45],
            [['edadNovio', 'edadNovia'], 'required', 'message' => 'Contenido en blanco'],
            [['dia', 'edadNovio', 'edadNovia'], 'string', 'max' => 2],
            [['curpNovio', 'curpNovia'], 'required', 'message' => 'Contenido en blanco'],
            [['curpNovio', 'curpNovia'], 'string', 'max' => 18],
            [['cPostalNovio', 'cPostalNovia'], 'required', 'message' => 'Contenido en blanco'],
            [['cPostalNovio', 'cPostalNovia'], 'string', 'max' => 5],
            [['Padre_Novio', 'Domici_Padre', 'Domic_MadreNov', 'Padre_Novia', 'Domic_Pa_Novia', 'Domic_Ma_Novia'], 'string', 'max' => 50],
            [['mes', 'year', 'Madre_novio', 'Madre_novia'], 'string', 'max' => 35],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMatrimonio' => 'Id Matrimonio',
            'Fecha_Registro' => 'Fecha Registro',
            'dia' => 'Dia',
            'mes' => 'Mes',
            'year' => 'Year',
            'solicitudes_idSolicitud' => 'Solicitud',
            'nombreNovio' => 'Nombre',
            'apPaternoNovio' => 'Apellido Paterno',
            'apMaternoNovio' => 'Apellido Materno',
            'edadNovio' => 'Edad',
            'curpNovio' => 'Curp',
            'direccionNovio' => 'Dirección',
            'coloniaNovio' => 'Colonia',
            'cPostalNovio' => 'Codigo Postal',
            'estadoNovio' => 'Estado',
            'Padre_Novio' => 'Nombre Completo',
            'Domici_Padre' => 'Domicilio Completo',
            'Madre_novio' => 'Nombre Completo',
            'Domic_MadreNov' => 'Domicilio Completo',
            'nombreNovia' => 'Nombre',
            'apPaternoNovia' => 'Apellido Paterno',
            'apMaternoNovia' => 'Apellido Materno',
            'edadNovia' => 'Edad',
            'curpNovia' => 'Curp',
            'direccionNovia' => 'Dirección Completa',
            'coloniaNovia' => 'Colonia',
            'cPostalNovia' => 'Código Postal',
            'estadoNovia' => 'Estado',
            'Padre_Novia' => 'Nombre Completo',
            'Domic_Pa_Novia' => 'Domiclio Completo',
            'Madre_novia' => 'Nombre Completo',
            'Domic_Ma_Novia' => 'Domicilio completo',
            'numActaMatCivil' => 'No. Acta Matrimonio Civil',
            'municipioMatCivil' => 'Municipio del Matrimonio Civil',
            'diaMatCivil' => 'Día del Matrimonio Civil',
            'mesMatCivil' => 'Mes del Matrimonio Civil',
            'anioMatCivil' => 'Año Matrimonio Civil',
            'Folio' => 'Folio',
            'Congregante_idCongregante' => 'Congregante',
        ];
    }
    public static function generarNuevoFolio($idMatrimonio)
    {
        $fecha = date('Ymd'); // Obtener la fecha actual en el formato YYYYMMDD
        return 'FGM' . $fecha . str_pad($idMatrimonio, 7, '0', STR_PAD_LEFT);
    }
    public function getSolicitud()
    {
        return $this->hasOne(Solicitudes::className(), ['idSolicitud' => 'solicitudes_idSolicitud']);
    }


    public function getCongregante()
    {
        return $this->hasOne(Congregante::class, ['idCongregante' => 'Congregante_idCongregante']);
    }

    public function generateTableHtml()
    {
        // Generar un nombre único para el PDF
        $pdfName = 'matrimonio_' . uniqid() . '.pdf';
        $bgColor = '#24424c  ';
        // Generamos la tabla HTML vertical

        $html = '<div>';

        $html = '<table border="1" style="width:100%; text-align:center; border-collapse: collapse;">'; // Establecemos el ancho, alineamos el texto al centro y colapsamos los bordes de la tabla
        $html .= '<tr  style="width:100%; text-align:center; border-collapse: collapse; font-size: 10px;">';
        $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>IGLESIA</strong> <br>GETSEMANI</th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>MUNICIPIO</strong> <br>HUEJOTZINGO</th>';
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>UBICACIÓN</strong><br>' . mb_strtoupper('Camino Real A Huejotzingo 74160') . '</th>';
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>LOCALIDAD</strong><br>ATEXCAC</th>';
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>ENTIDAD FEDERATIVA</strong><br>PUEBLA</th>';
        $html .= '<td style=" border: 1px solid black; background-color:' . $bgColor . ';"><strong>' . mb_strtoupper('Fecha') . '</strong> <br>' . mb_strtoupper($this->Fecha_Registro) . '</td>';
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr>';
        $html .= '<th COLSPAN=6 style="font-size: 10px; background-color:' . $bgColor . '; width:100% border: 1px solid black;"><strong>' . mb_strtoupper('Dato de los Contrayentes') . '</strong></th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#24424c ';
        $html .= '<tr style="font-size:10px;">';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->nombreNovio) . '<br><hr style="width:57% ;">CONTRAYENTE 1</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->apPaternoNovio) . '<br><hr style="width:63% ;">PRIMER APELLIDO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->apMaternoNovio) . '<br><hr style="width:71% ;">SEGUNDO APELLIDO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->edadNovio) . '<br><hr style="width:19% ;">EDAD</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style="font-size:10px;">';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">DOMICILIO: ' . mb_strtoupper($this->direccionNovio) . '</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">COLONIA: ' . mb_strtoupper($this->coloniaNovio) . '</th>';
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">ESTADO: ' . mb_strtoupper($this->estadoNovio) . '</th>';
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">C.P: ' . strtoupper($this->cPostalNovio) . '</th>';
        $html .= '</tr>';
        $bgColor = '#24424c ';
        $html .= '<tr style="font-size:10px;">';
        $html .= '<th style="width:25% border: 1px solid black;  background-color:' . $bgColor . ';">' . mb_strtoupper($this->nombreNovia) . '<br><hr style="width:57% ;">CONTRAYENTE 2</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:25% border:1px solid black;  background-color:' . $bgColor . ';">' . mb_strtoupper($this->apPaternoNovia) . '<br><hr style="width:63% ;">PRIMER APELLIDO</th>';
        $html .= '<th style="width:25% border: 1px solid black;  background-color:' . $bgColor . ';">' . mb_strtoupper($this->apMaternoNovia) . '<br><hr style="width:71% ;">SEGUNDO APELLIDO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->edadNovia) . '<br><hr style="width:19% ;">EDAD</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style="font-size:10px;">';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">DOMICILIO: ' . mb_strtoupper($this->direccionNovia) . '</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">COLONIA: ' . mb_strtoupper($this->coloniaNovia) . '</th>';
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">ESTADO: ' . mb_strtoupper($this->estadoNovia) . '</th>';
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">C.P: ' . strtoupper($this->cPostalNovia) . '</th>';
        $html .= '</tr>';
        $bgColor = '#24424c ';
        $html .= '<tr style="font-size:10px;">';
        $html .= '<th COLSPAN=6 style="width:100% border: 1px solid black; background-color:' . $bgColor . ';"><strong>PADRES DEL CONTRAYENTE 1</strong></th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style="font-size:10px; text-align:left;">';
        $html .= '<th style="width:100% border: 1px solid black; background-color:' . $bgColor . ';">PROGENITOR 1: ' . mb_strtoupper($this->Padre_Novio) . '</th>'; // Establecemos los bordes de las celdas
        $html .= '</tr>';
        $bgColor = '#24424c';
        $html .= '<tr style="font-size:10px; text-align:left;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . ';">DOMICILIO PROGENITOR 1: ' . mb_strtoupper($this->Domici_Padre) . '</th>';
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style="font-size:10px; text-align:left;">';
        $html .= '<th style="width:100% border: 1px solid black; background-color:' . $bgColor . ';">PROGENITOR 2: ' . mb_strtoupper($this->Madre_novio) . '</th>'; // Establecemos los bordes de las celdas
        $html .= '</tr>';
        $bgColor = '#24424c';
        $html .= '<tr style="font-size:10px; text-align:left;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . ';">DOMICILIO PROGENITOR 2: ' . mb_strtoupper($this->Domic_MadreNov) . '</th>';
        $html .= '</tr>';
        $bgColor = '#B0C4DE';



        $html .= '<tr style="font-size:10px;">';
        $html .= '<th COLSPAN=6 style="width:100% border: 1px solid black;  background-color:' . $bgColor . ';"><strong>PADRES DEL CONTRAYENTE 2</strong></th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';

        $bgColor = '#B0C4DE';
        $html .= '<tr style="font-size:10px; text-align:left;">';
        $html .= '<th style="width:100% border: 1px solid black; background-color:' . $bgColor . ';">PROGENITOR 1: ' . mb_strtoupper($this->Padre_Novia) . '</th>'; // Establecemos los bordes de las celdas
        $html .= '</tr>';
        $bgColor = '#24424c';
        $html .= '<tr style="font-size:10px; text-align:left;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . ';">DOMICILIO PROGENITOR 1: ' . mb_strtoupper($this->Domic_Pa_Novia) . '</th>';
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style="font-size:10px; text-align:left;">';
        $html .= '<th style="width:100% border: 1px solid black; background-color:' . $bgColor . ';">PROGENITOR 2: ' . mb_strtoupper($this->Madre_novia) . '</th>'; // Establecemos los bordes de las celdas
        $html .= '</tr>';
        $bgColor = '#24424c';
        $html .= '<tr style="font-size:10px; text-align:left;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . ';">DOMICILIO PROGENITOR 2: ' . mb_strtoupper($this->Domic_Ma_Novia) . '</th>';
        $html .= '</tr>';


        $bgColor = '#B0C4DE';

        $html .= '<tr>';
        $html .= '<th COLSPAN=6 style="width:100%; font-size: 10px; border: 1px solid black; background-color:' . $bgColor . '">
        <strong>' . strtoupper('Ambos se presentan en esta secretaria para solicitar matrimonio de acuerdo con lo establecido en la sagradas escrituras') . '
        </strong>
        </th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style="border: 1px solid black; font-size: 10px;">';
        $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">No. ACTA MATRIMONIO CIVIL<br>' . mb_strtoupper($this->numActaMatCivil) . '</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:33.3% border:1px solid black; background-color:' . $bgColor . ';">MUNICIPIO DONDE SE LLEVO ACABO <br> ' . mb_strtoupper($this->municipioMatCivil) . '</th>';
        $html .= '<th style="width:33.3%; text-align:center; border: 1px solid black; background-color:' . $bgColor . ';">';
        $html .= 'DÍA QUE SE LLEVO ACABO <br>' . $this->diaMatCivil . ' DE ' . mb_strtoupper($this->mesMatCivil) . ' DEL ' . $this->anioMatCivil;
        $html .= '</th>';
        $html .= '</tr>';
        $bgColor = '#24424c';

        $html .= '<tr>';
        $html .= '<th style="width:100%; border: 1px solid black; background-color:' . $bgColor . '; font-size: 11px;">
        <strong>' . strtoupper('No hallando obstaculo para ello se acordo de conformidad, seÑalando para esta solemnidad') . '</strong></th>';
        $html .= '</tr>';

        $bgColor = '#B0C4DE';
        $html .= '<tr style="border: 1px ; solid black; font-size: 10px;">';
        $html .= '<th style="width:33.3%; border: 1px solid black; background-color:' . $bgColor . ';"><br><br><br><br><br>' . mb_strtoupper($this->nombreNovio) . ' ' . mb_strtoupper($this->apPaternoNovio) . ' ' . mb_strtoupper($this->apMaternoNovio) . '<br> <b>FIRMA DEL CONTRAYENTE 1</b></th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:33.3%; border: 1px solid black;  background-color:' . $bgColor . ';" ><br><br><br><br><br>' . mb_strtoupper($this->nombreNovia) . ' ' . mb_strtoupper($this->apPaternoNovia) . ' ' . mb_strtoupper($this->apMaternoNovia) . '<br><b> FIRMA DEL CONTRAYENTE 2</b></th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:33.3%; border: 1px solid black; background-color:' . $bgColor . ';"><br><br><br><br><br><br><b>FIRMA DEL PASTOR DE LA IGLESIA</b></th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
        $html .= '</tr>';



        $html .= '</table>';
        $html .= '<p style="text-align:center; font-size: 9px; margin-top: 15px; margin-left: -15px;">';
        $html .= '<strong>' . mb_strtoupper('y dijo: Por esto el hombre dejará padre y madre, y se unirá a su mujer, y los dos serán una sola carne?

        Así que no son ya más dos, sino una sola carne; por tanto, lo que Dios juntó, no lo separe el hombre.<br> S. Mateo 19:5-6') . '</strong>';
        $html .= '</p>';

        $html .= '</div>';




        return $html;
    }
}
