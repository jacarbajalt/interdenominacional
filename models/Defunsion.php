<?php

namespace app\models;

use Yii;
use app\models\Solicitudes;

/**
 * This is the model class for table "defunsion".
 *
 * @property int $idDefunsion
 * @property string|null $Fecha_registro
 * @property string $dia
 * @property string $mes
 * @property string $year
 * @property string|null $Nombre
 * @property string|null $apePat
 * @property string|null $apeMat
 * @property string|null $sexo
 * @property string $naciona
 * @property string|null $Fecha_Nacim
 * @property string $localidad
 * @property string $municipio
 * @property string $edad_Fallecid
 * @property string $Embarazada
 * @property string|null $domicilio_comp
 * @property string|null $estado_civil
 * @property string|null $Nombre_Conyuge
 * @property string|null $NomPadreCompl
 * @property string|null $NomMadreComp
 * @property string $nacioMadre
 * @property string $nacioPadre
 * @property string $nacioConyuge
 * @property string|null $Fecha_Defuncion
 * @property string|null $Lugar_Fallecido
 * @property string|null $Destino_cadaver
 * @property string|null $Nombre_Panteon
 * @property string|null $Ubica_Panteon
 * @property string $Certificado
 * @property string|null $Nom_declarante
 * @property string|null $edad_decla
 * @property string|null $Parentesco
 * @property string|null $Nacion_parie
 * @property string|null $Domi_Compl_Pa
 * @property string $ocupa_Dec
 * @property string|null $Telefono_decla
 * @property string|null $Nom_funeraria
 * @property string|null $Telefono_fune
 * @property string|null $Ciudad
 * @property string|null $Atenc_medica
 * @property string $ACTIVIDADES
 * @property string|null $Ocupacion
 * @property string|null $Escolaridad
 * @property int $solicitudes_idSolicitud
 * @property string|null $Folio
 */
class Defunsion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'defunsion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha_registro'], 'safe'],
            [['dia', 'mes', 'year', 'naciona', 'localidad', 'municipio', 'edad_Fallecid', 'Embarazada', 'nacioMadre', 'nacioPadre', 'nacioConyuge', 'Certificado', 'ocupa_Dec', 'ACTIVIDADES', 'solicitudes_idSolicitud'], 'required', 'message' => 'Contenido en blanco'],
            [['dia'], 'string', 'max' => 2],
            [['solicitudes_idSolicitud'], 'integer'],
            [['Nombre', 'apePat', 'apeMat', 'sexo', 'naciona', 'Fecha_Nacim', 'domicilio_comp', 'estado_civil', 'Nombre_Conyuge', 'NomPadreCompl', 'NomMadreComp', 'Fecha_Defuncion', 'Lugar_Fallecido', 'Destino_cadaver', 'Nombre_Panteon', 'Ubica_Panteon', 'Nom_declarante', 'edad_decla', 'Parentesco', 'Nacion_parie', 'Domi_Compl_Pa', 'ocupa_Dec', 'Telefono_decla', 'Nom_funeraria', 'Telefono_fune', 'Ciudad', 'Atenc_medica', 'Ocupacion', 'Escolaridad', 'Folio'], 'required', 'message' => 'Contenido en blanco'],
            [['Nombre', 'apePat', 'apeMat', 'sexo', 'naciona', 'Fecha_Nacim', 'domicilio_comp', 'estado_civil', 'Nombre_Conyuge', 'NomPadreCompl', 'NomMadreComp', 'Fecha_Defuncion', 'Lugar_Fallecido', 'Destino_cadaver', 'Nombre_Panteon', 'Ubica_Panteon', 'Nom_declarante', 'edad_decla', 'Parentesco', 'Nacion_parie', 'Domi_Compl_Pa', 'ocupa_Dec', 'Telefono_decla', 'Nom_funeraria', 'Telefono_fune', 'Ciudad', 'Atenc_medica', 'Ocupacion', 'Escolaridad', 'Folio'], 'string', 'max' => 45],
            [['localidad', 'municipio', 'Certificado'], 'string', 'max' => 35],
            [['edad_Fallecid'], 'string', 'max' => 50],
            [['Embarazada'], 'string', 'max' => 10],
            [['mes', 'nacioMadre', 'nacioPadre', 'nacioConyuge'], 'string', 'max' => 25],
            [['year'], 'string', 'max' => 15],
            [['ACTIVIDADES'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    
     public function attributeLabels()
     {
         return [
             'idDefunsion' => 'Id Defunsion',
             'Fecha_registro' => 'Fecha de Registro',
             'dia' => 'Dia',
             'mes' => 'Mes',
             'year' => 'Año',
             'Nombre' => 'Nombre',
             'apePat' => 'Apellido Paterno',
             'apeMat' => 'Apellido Materno',
             'sexo' => 'Sexo',
             'naciona' => 'Nacionanalidad',
             'Fecha_Nacim' => 'Fecha Nacimiento',
             'localidad' => 'Localidad',
             'municipio' => 'Municipio',
             'edad_Fallecid' => 'Edad',
             'Embarazada' => 'Embarazada',
             'domicilio_comp' => 'Domicilio Completo',
             'estado_civil' => 'Estado Civil',
             'Nombre_Conyuge' => 'Nombre del Conyuge',
             'NomPadreCompl' => 'Nombre del Padre Completo',
             'NomMadreComp' => 'Nombre de la Madre Completo',
             'nacioMadre' => 'Nacionalidad de la Madre',
             'nacioPadre' => 'Nacionalidad del Padre',
             'nacioConyuge' => 'Nacionalidad del Conyuge',
             'Fecha_Defuncion' => 'Fecha Defunción',
             'Lugar_Fallecido' => 'Lugar Fallecido',
             'Destino_cadaver' => 'Destino Cadaver',
             'Nombre_Panteon' => 'Nombre del Panteón',
             'Ubica_Panteon' => 'Ubicación del Panteón',
             'Certificado' => 'Certificado',
             'Nom_declarante' => 'Nombre del Declarante',
             'edad_decla' => 'Edad Declarante',
             'Parentesco' => 'Parentesco',
             'Nacion_parie' => 'Nacionalidad del declarante',
             'Domi_Compl_Pa' => 'Domicilio Completo del declarante',
             'ocupa_Dec' => 'Ocupación del declarante',
             'Telefono_decla' => 'Telefono del Declarante',
             'Nom_funeraria' => 'Nombre de la Funeraria',
             'Telefono_fune' => 'Telefono de la Funeraria',
             'Ciudad' => 'Domicilio de la Funeraria',
             'Atenc_medica' => 'Atención Medica',
             'ACTIVIDADES' => 'Actividades',
             'Ocupacion' => 'Ocupación',
             'Escolaridad' => 'Escolaridad',
             'solicitudes_idSolicitud' => 'Solicitudes',
             'Folio' => 'Folio',
         ];
     }
       // Función para generar un nuevo folio basado en el índice y fecha
       public static function generarNuevoFolio($idDefunsion)
       {
           $fecha = date('Ymd'); // Obtener la fecha actual en el formato YYYYMMDD
           return 'FGD' . $fecha . str_pad($idDefunsion, 7, '0', STR_PAD_LEFT);
       }

       public function getSolicitud()
       {
           return $this->hasOne(Solicitudes::className(), ['idSolicitud' => 'solicitudes_idSolicitud']);
       }
     
     public function generateTableHtml()
     {
        
        $bgColor = '#24424c';
        // Generamos la tabla HTML vertical
 
 
 
 
       
             
                 // Generamos la tabla HTML vertical
         $html = '<div>';
 
         $html = '<table border="1" style="width:100%; text-align:center; border-collapse: collapse;">'; // Establecemos el ancho, alineamos el texto al centro y colapsamos los bordes de la tabla
         $html .= '<tr  style="width:100%; text-align:center; border-collapse: collapse; font-size: 10px;">';
         $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>IGLESIA</strong> <br>GETSEMANI</th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
         $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>MUNICIPIO</strong> <br>HUEHOTZINGO</th>';        
         $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>UBICACIÓN</strong><br>' . strtoupper('Camino Real A Huejotzingo 74160') . '</th>';
         $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>LOCALIDAD</strong><br>ATEXCAC</th>';
         $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>ENTIDAD FEDERATIVA</strong><br>PUEBLA</th>';
         $html .= '<td style=" border: 1px solid black; background-color:' . $bgColor . ';"><strong>' . strtoupper('Fecha') . '</strong> <br>'  . strtoupper($this->Fecha_registro) . '</td>';
         $html .= '</tr>';
 
         $bgColor = '#B0C4DE';
         $html .= '<tr>';
         $html .= '<th style="border: 1px solid black; font-size: 10px; background-color:' . $bgColor . '; width:100%;" COLSPAN=1><strong>FINADO</strong></th>';
         $html .= '</tr>'; 
 
         $bgColor = '#24424c';
         $html .= '<tr style="width:100%; text-align:center; border-collapse: collapse; font-size: 10px;">';
         $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->Nombre) . '<br ><hr style="width:28%;">NOMBRE</th>'; // Establecemos los bordes de las celdas
         $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">'. strtoupper($this->apePat) . '<br><hr style="width:60% ;">APELLIDO PATERNO</th>';
         $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">'. strtoupper($this->apeMat) .  '<br><hr style="width:63% ;">APELLIDO MATERNO</th>';
         $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->sexo) . '<br><hr style="width:15% ;">SEXO</th>'; // Establecemos el fondo y los bordes de la fila
         $html .= '</tr>';
         
         $bgColor = '#B0C4DE';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:22% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->Fecha_Nacim) . '<br><hr style="width:70% ;">FECHA NACIMIENTO</th>'; // Establecemos el fondo y los bordes de la fila
         $html .= '<th style="width:15% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->naciona) . '<br ><hr style="width:83%;">NACIONALIDAD</th>'; // Establecemos los bordes de las celdas
         $html .= '<th style="width:8% border:1px solid black; background-color:' . $bgColor . ';">'. strtoupper($this->edad_Fallecid) . '<br><hr style="width:65% ;">EDAD</th>';
         $html .= '<th style="width:20% border: 1px solid black; background-color:' . $bgColor . ';">'. strtoupper($this->estado_civil) .  '<br><hr style="width:52% ;">ESTADO CIVIL</th>';
         $html .= '<th style="width:35% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->Ocupacion) . '<br><hr style="width:27% ;">OCUPACIÓN</th>'; // Establecemos los bordes de las celdas
         $html .= '</tr>';
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->Atenc_medica) . '<br><hr style="width:43% ;">ATENCIÓN MEDICA</th>'; // Establecemos el fondo y los bordes de la fila
         $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->ACTIVIDADES) . '<br ><hr style="width:29%;">ACTIVIDADES</th>'; // Establecemos los bordes de las celdas
         $html .= '<th style="width:33.4% border:1px solid black; background-color:' . $bgColor . ';">'. strtoupper($this->Escolaridad) . '<br><hr style="width:31% ;">ESCOLARIDAD</th>';
         
     
         $html .= '</tr>';
        
         $bgColor = '#B0C4DE';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">DOMICILIO: '. mb_strtoupper($this->domicilio_comp) . '</th>';
         $html .= '</tr>';
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE DEL CONYUGE: ' . strtoupper($this->Nombre_Conyuge ) . '</th>';
         $html .= '</tr>';
 
         $bgColor = '#B0C4DE';
         
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE DEL PADRE: ' . mb_strtoupper($this->NomPadreCompl ) .
         ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NACIONALIDAD: '. mb_strtoupper($this->nacioPadre) .  '</th>';
         $html .= '</tr>';
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE DE LA MADRE: ' . mb_strtoupper($this->NomMadreComp) .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NACIONALIDAD: '. mb_strtoupper($this->nacioMadre).'</th>';
         $html .= '</tr>';
         $bgColor = '#B0C4DE';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">DESTINO DEL CADAVER ' . strtoupper($this->Destino_cadaver) .'</th>';
         $html .= '</tr>';
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE DEL PANTEON '. strtoupper($this->Nombre_Panteon) . '</th>';
         $html .= '</tr>';
         $bgColor = '#B0C4DE';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">UBICACIÓN DEL PANTEÓN '. strtoupper($this->Ubica_Panteon) . '</th>';
         $html .= '</tr>';
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:33.3% border:1px solid black; background-color:' . $bgColor . ';">'. strtoupper($this->Fecha_Defuncion) . '<br><hr style="width:43% ;">FECHA DEFUNCIÓN</th>';
         $html .= '<th style="width:33.4% border: 1px solid black; background-color:' . $bgColor . ';">'. strtoupper($this->Lugar_Fallecido) .  '<br><hr style="width:61% ;">LUGAR DE FALLECIMIENTO</th>';
         $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->Certificado) . '<br><hr style="width:30% ;">CERTIFICADO</th>'; // Establecemos el fondo y los bordes de la fila
         $html .= '</tr>';
         $bgColor = '#B0C4DE';
         $html .= '<tr>';
         $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . '; width:100%;" COLSPAN=1><strong>DATOS DEL DECLARANTE</strong></th>';
         $html .= '</tr>'; 
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:65% border:1px solid black; background-color:' . $bgColor . ';">'. strtoupper($this->Nom_declarante) . '<br><hr style="width:31% ;">NOMBRE DEL DECLARANTE</th>';
         $html .= '<th style="width:% 15border: 1px solid black; background-color:' . $bgColor . ';">'. strtoupper($this->edad_decla) .  '<br><hr style="width:27% ;">EDAD</th>';
         $html .= '<th style="width:20% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->Parentesco) . '<br><hr style="width:62% ;">PARETENTEZCO</th>'; // Establecemos el fondo y los bordes de la fila
         $html .= '</tr>';
         $bgColor = '#B0C4DE';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:33.3% border:1px solid black; background-color:' . $bgColor . ';">'. strtoupper($this->Nacion_parie) . '<br><hr style="width:36% ;">NACIONALIDAD</th>';
         $html .= '<th style="width:33.4% border: 1px solid black; background-color:' . $bgColor . ';">'. strtoupper($this->ocupa_Dec) .  '<br><hr style="width:28% ;">OCUPACIÓN</th>';
         $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->Telefono_decla) . '<br><hr style="width:24% ;">TELEFONO</th>'; // Establecemos el fondo y los bordes de la fila
         $html .= '</tr>';
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:100% border:1px solid black; text-align:left; background-color:' . $bgColor . ';">DOMICILIO: '. strtoupper($this->Domi_Compl_Pa) . '</th>';
       
         $html .= '</tr>'; 
         $bgColor = '#B0C4DE';
         $html .= '<tr>';
         $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . '; width:100%;" COLSPAN=1><strong>DATOS DE FUNERARIA</strong></th>';
         $html .= '</tr>'; 
        
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE: ' . mb_strtoupper($this->Nom_funeraria ) . '</th>';
         $html .= '</tr>';
         $bgColor = '#B0C4DE';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">TELEFONO: ' . mb_strtoupper($this->Telefono_fune) . '</th>';
         $html .= '</tr>';
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 10px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">DOMICILIO: '. mb_strtoupper($this->Ciudad ) . '</th>';
         $html .= '</tr>';
         $bgColor = '#B0C4DE';
         $html .= '<tr style="border: 1px ; solid black; font-size: 10px;">';
         $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';"><br><br><br><br>' . strtoupper($this->Nom_declarante ) . '<br><b> FIRMA DEL DECLARANTE</b></th>'; // Establecemos los bordes de las celdas
         $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><br><br><br><br><br><b>FIRMA DEL PASTOR DE LA IGLESIA</b></th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
         
         $html .= '</tr>';
        
         
         $html .= '</table>';
         $html .= '<p style="text-align:center; font-size: 10px; margin-top: 15px; margin-left: -15px;">';
         $html .= '<strong>' . strtoupper('Porque para mÍ el vivir es Cristo, y el morir es ganancia. Filipenses 1:21.') . '</strong>';
         $html .= '</p>';
         $html .= '</div>';
             
 
         
         return $html;
     }
 
     public function generateNinoTableHtml()
     {
        
        $bgColor = '#24424c'; 
        
         // Generamos la tabla HTML vertical
         $html = '<div>';
        
         $html = '<table border="1" style="width:100%; text-align:center; border-collapse: collapse;">'; // Establecemos el ancho, alineamos el texto al centro y colapsamos los bordes de la tabla
         $html .= '<tr  style="width:100%; text-align:center; border-collapse: collapse; font-size: 11px;">';
         $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>IGLESIA</strong> <br>GETSEMANI</th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
         $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>MUNICIPIO</strong> <br>HUEHOTZINGO</th>';        
         $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>UBICACIÓN</strong><br>' . strtoupper('Camino Real A Huejotzingo 74160') . '</th>';
         $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>LOCALIDAD</strong><br>ATEXCAC</th>';
         $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>ENTIDAD FEDERATIVA</strong><br>PUEBLA</th>';
         $html .= '<td style=" border: 1px solid black; background-color:' . $bgColor . ';"><strong>' . strtoupper('Fecha') . '</strong> <br>'  . strtoupper($this->Fecha_registro) . '</td>';
         $html .= '</tr>';
 
         $bgColor = '#B0C4DE';
         $html .= '<tr>';
         $html .= '<th style="border: 1px solid black; font-size: 11px; background-color:' . $bgColor . '; width:100%;" COLSPAN=1><strong>FINADO</strong></th>';
         $html .= '</tr>'; 
 
         $bgColor = '#24424c';
         $html .= '<tr  style="font-size: 11px;">';
         $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->Nombre) . '<br ><hr style="width:31%;">NOMBRE</th>'; // Establecemos los bordes de las celdas
         $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->apePat) . '<br><hr style="width:68% ;">APELLIDO PATERNO</th>';
         $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->apeMat) .  '<br><hr style="width:69% ;">APELLIDO MATERNO</th>';
         $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->sexo) . '<br><hr style="width:17% ;">SEXO</th>'; // Establecemos el fondo y los bordes de la fila
         $html .= '</tr>';
         
         $bgColor = '#B0C4DE';
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:33.4% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->Fecha_Nacim) . '<br><hr style="width:50% ;">FECHA NACIMIENTO</th>'; 
         $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->naciona) . '<br ><hr style="width:38%;">NACIONALIDAD</th>'; 
         $html .= '<th style="width:33.3% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->edad_Fallecid) . '<br><hr style="width:13% ;">EDAD</th>';

         $html .= '</tr>';
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 11px;  text-align:left;">';
         $html .= '<th style="width:100% border: 1px solid black; background-color:' . $bgColor . ';">ATENCIÓN MEDICA: ' . strtoupper($this->Atenc_medica) . '</th>'; 
         $html .= '</tr>';
        
         $bgColor = '#B0C4DE';
 
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left;">DOMICILIO: '. mb_strtoupper($this->domicilio_comp) . '</th>';
         $html .= '</tr>';
 
       
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE DEL PADRE: ' . mb_strtoupper($this->NomPadreCompl ) .
         ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NACIONALIDAD: '. mb_strtoupper($this->nacioPadre) .  '</th>';
         $html .= '</tr>';
         $bgColor = '#B0C4DE';
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE DE LA MADRE: ' . mb_strtoupper($this->NomMadreComp) .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NACIONALIDAD: '. mb_strtoupper($this->nacioMadre).'</th>';
         $html .= '</tr>';
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">DESTINO DEL CADAVER ' . strtoupper($this->Destino_cadaver) .'</th>';
         $html .= '</tr>';
         $bgColor = '#B0C4DE';
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE DEL PANTEON '. strtoupper($this->Nombre_Panteon) . '</th>';
         $html .= '</tr>';
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">UBICACIÓN DEL PANTEÓN '. strtoupper($this->Ubica_Panteon) . '</th>';
         $html .= '</tr>';
         $bgColor = '#B0C4DE';
         
         $html .= '<tr>';
         $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . '; width:100%; font-size: 11px;" COLSPAN=1><strong>DATOS DEL DECLARANTE</strong></th>';
         $html .= '</tr>'; 
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:65% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->Nom_declarante) . '<br><hr style="width:34% ;">NOMBRE DEL DECLARANTE</th>';
         $html .= '<th style="width:% 15border: 1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->edad_decla) .  '<br><hr style="width:27% ;">EDAD</th>';
         $html .= '<th style="width:20% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->Parentesco) . '<br><hr style="width:64% ;">PARETENTEZCO</th>'; // Establecemos el fondo y los bordes de la fila
         $html .= '</tr>';
         $bgColor = '#B0C4DE';
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:33.3% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->Nacion_parie) . '<br><hr style="width:39% ;">NACIONALIDAD</th>';
         $html .= '<th style="width:33.4% border: 1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->ocupa_Dec) .  '<br><hr style="width:30% ;">OCUPACIÓN</th>';
         $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->Telefono_decla) . '<br><hr style="width:26% ;">TELEFONO</th>'; // Establecemos el fondo y los bordes de la fila
         $html .= '</tr>';
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:100% border:1px solid black; text-align:left; background-color:' . $bgColor . ';">DOMICILIO: '. mb_strtoupper($this->Domi_Compl_Pa) . '</th>';
       
         $html .= '</tr>'; 
         $bgColor = '#B0C4DE';
         $html .= '<tr>';
         $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . '; width:100%;" COLSPAN=1><strong>DATOS DE FUNERARIA</strong></th>';
         $html .= '</tr>'; 
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE: ' . mb_strtoupper($this->Nom_funeraria ) . '</th>';
         $html .= '</tr>';
         $bgColor = '#B0C4DE';
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">TELEFONO: ' . mb_strtoupper($this->Telefono_fune) . '</th>';
         $html .= '</tr>';
         $bgColor = '#24424c';
         $html .= '<tr style=" font-size: 11px;">';
         $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">DOMICILIO: '. mb_strtoupper($this->Ciudad ) . '</th>';
         $html .= '</tr>';
         
        
         $bgColor = '#B0C4DE';
         $html .= '<tr>';
         $html .= '<th style="border: 1px solid black; font-size: 11px; background-color:' . $bgColor . '; width:100%;" COLSPAN=1><strong>FIRMAS</strong></th>';
         $html .= '</tr>'; 
         $bgColor = '#24424c';
         $html .= '<tr style="border: 1px ; solid black; font-size: 11px;">';
         $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';"><br><br><br><br>' . mb_strtoupper($this->Nom_declarante ) . '<br> <b>FIRMA DEL DECLARANTE</b></th>'; // Establecemos los bordes de las celdas
         $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><br><br><br><br><br><b>FIRMA DEL PASTOR DE LA IGLESIA</b></th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
       
         
         $html .= '</tr>';
              
         $html .= '</table>';
         $html .= '<p style=" text-align:center; font-size: 10px; margin-top: 15px; margin-left: -15px;">';
         $html .= '<strong>' . mb_strtoupper('Porque para mÍ el vivir es Cristo, y el morir es ganancia. Filipenses 1:21.') . '</strong>';
         $html .= '</p>';
         $html .= '</div>';
          
          return $html;
      }
  
  
  
  
  
 
     public function generateJovenTableHtml()
     {
        
        $bgColor = '#24424c';
        // Generamos la tabla HTML vertical
        $html = '<div>';
 
        $html = '<table border="1" style="width:100%; text-align:center; border-collapse: collapse;">'; // Establecemos el ancho, alineamos el texto al centro y colapsamos los bordes de la tabla
        $html .= '<tr  style="width:100%; text-align:center; border-collapse: collapse; font-size: 10px;">';
        $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>IGLESIA</strong> <br>GETSEMANI</th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>MUNICIPIO</strong> <br>HUEHOTZINGO</th>';        
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>UBICACIÓN</strong><br>' . mb_strtoupper('Camino Real A Huejotzingo 74160') . '</th>';
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>LOCALIDAD</strong><br>ATEXCAC</th>';
        $html .= '<th style=" border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><strong>ENTIDAD FEDERATIVA</strong><br>PUEBLA</th>';
        $html .= '<td style=" border: 1px solid black; background-color:' . $bgColor . ';"><strong>' . strtoupper('Fecha') . '</strong> <br>'  . strtoupper($this->Fecha_registro) . '</td>';
        $html .= '</tr>';
 
        $bgColor = '#B0C4DE';
        $html .= '<tr>';
        $html .= '<th style="border: 1px solid black; font-size: 10px; background-color:' . $bgColor . '; width:100%;" COLSPAN=1><strong>FINADO</strong></th>';
        $html .= '</tr>'; 
 
        $bgColor = '#24424c';
        $html .= '<tr  style="font-size: 10px;">';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' .mb_strtoupper($this->Nombre) . '<br ><hr style="width:27%;">NOMBRE</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:25% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->apePat) . '<br><hr style="width:62% ;">APELLIDO PATERNO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->apeMat) .  '<br><hr style="width:62% ;">APELLIDO MATERNO</th>';
        $html .= '<th style="width:25% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->sexo) . '<br><hr style="width:16% ;">SEXO</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        
        $bgColor = '#B0C4DE';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:22% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->Fecha_Nacim) . '<br><hr style="width:72% ;">FECHA NACIMIENTO</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '<th style="width:15% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->naciona) . '<br ><hr style="width:84%;">NACIONALIDAD</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:8% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->edad_Fallecid) . '<br><hr style="width:57% ;">EDAD</th>';
        $html .= '<th style="width:20% border: 1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->estado_civil) .  '<br><hr style="width:51% ;">ESTADO CIVIL</th>';
        $html .= '<th style="width:35% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->Ocupacion) . '<br><hr style="width:26% ;">OCUPACIÓN</th>'; // Establecemos los bordes de las celdas
        $html .= '</tr>';
 
        $bgColor = '#24424c';
 
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">DOMICILIO: '. mb_strtoupper($this->domicilio_comp) . '</th>';
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE DEL CONYUGE: ' . strtoupper($this->Nombre_Conyuge ) . '</th>';
        $html .= '</tr>';

        $bgColor = '#24424c';
        
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE DEL PADRE: ' . mb_strtoupper($this->NomPadreCompl ) .
        ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NACIONALIDAD: '. mb_strtoupper($this->nacioPadre) .  '</th>';
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE DE LA MADRE: ' . mb_strtoupper($this->NomMadreComp) .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NACIONALIDAD: '. mb_strtoupper($this->nacioMadre).'</th>';
        $html .= '</tr>';
        $bgColor = '#24424c';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">DESTINO DEL CADAVER ' . strtoupper($this->Destino_cadaver) .'</th>';
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE DEL PANTEON '. strtoupper($this->Nombre_Panteon) . '</th>';
        $html .= '</tr>';
        $bgColor = '#24424c';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">UBICACIÓN DEL PANTEÓN '. strtoupper($this->Ubica_Panteon) . '</th>';
        $html .= '</tr>';

 
    
    
        
     
        $bgColor = '#B0C4DE';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->Atenc_medica) . '<br><hr style="width: 44%;">ATENCIÓN MEDICA</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->ACTIVIDADES) . '<br ><hr style="width: 30%;">ACTIVIDADES</th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:33.4% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->Escolaridad) . '<br><hr style="width:31%;">ESCOLARIDAD</th>';
        
    
        $html .= '</tr>';
      
        $bgColor = '#24424c';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:33.3% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->Fecha_Defuncion) . '<br><hr style="width:44%;">FECHA DEFUNCIÓN</th>';
        $html .= '<th style="width:33.4% border: 1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->Lugar_Fallecido) .  '<br><hr style="width:61% ;">LUGAR DE FALLECIMIENTO</th>';
        $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->Certificado) . '<br><hr style="width: 30%;">CERTIFICADO</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr>';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; font-size: 9px;">¿ESTUVO EMBARAZADA DURANTE LOS 42 DÍAS ANTES DE LA MUERTE? '. strtoupper($this->Embarazada) . '</th>';
        $html .= '</tr>';
 
        $bgColor = '#24424c';
        $html .= '<tr>';
        $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . '; width:100%;" COLSPAN=1><strong>DATOS DEL DECLARANTE</strong></th>';
        $html .= '</tr>'; 
        $bgColor = '#B0C4DE';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:65% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->Nom_declarante) . '<br><hr style="width:31% ;">NOMBRE DEL DECLARANTE</th>';
        $html .= '<th style="width:% 15border: 1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->edad_decla) .  '<br><hr style="width:28% ;">EDAD</th>';
        $html .= '<th style="width:20% border: 1px solid black; background-color:' . $bgColor . ';">' . mb_strtoupper($this->Parentesco) . '<br><hr style="width:62% ;">PARETENTEZCO</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#24424c';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:33.3% border:1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->Nacion_parie) . '<br><hr style="width:35% ;">NACIONALIDAD</th>';
        $html .= '<th style="width:33.4% border: 1px solid black; background-color:' . $bgColor . ';">'. mb_strtoupper($this->ocupa_Dec) .  '<br><hr style="width:27% ;">OCUPACIÓN</th>';
        $html .= '<th style="width:33.3% border: 1px solid black; background-color:' . $bgColor . ';">' . strtoupper($this->Telefono_decla) . '<br><hr style="width:25% ;">TELEFONO</th>'; // Establecemos el fondo y los bordes de la fila
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:100% border:1px solid black; text-align:left; background-color:' . $bgColor . ';">DOMICILIO: '. mb_strtoupper($this->Domi_Compl_Pa) . '</th>';
      
        $html .= '</tr>'; 
        $bgColor = '#24424c';
        $html .= '<tr>';
        $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . '; width:100%;" COLSPAN=1><strong>DATOS DE FUNERARIA</strong></th>';
        $html .= '</tr>'; 
       
       
        $bgColor = '#B0C4DE';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">NOMBRE: ' . mb_strtoupper($this->Nom_funeraria ) . '</th>';
        $html .= '</tr>';
        $bgColor = '#24424c';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">TELEFONO: ' . mb_strtoupper($this->Telefono_fune) . '</th>';
        $html .= '</tr>';
        $bgColor = '#B0C4DE';
        $html .= '<tr style=" font-size: 10px;">';
        $html .= '<th style="width:100% border:1px solid black; background-color:' . $bgColor . '; text-align:left; ">DOMICILIO: '. mb_strtoupper($this->Ciudad ) . '</th>';
        $html .= '</tr>';
        


        $bgColor = '#24424c';
        $html .= '<tr>';
        $html .= '<th style="border: 1px solid black; background-color:' . $bgColor . '; width:100%;" COLSPAN=1><strong>FIRMAS</strong></th>';
        $html .= '</tr>'; 
        $bgColor = '#B0C4DE';
        $html .= '<tr style="border: 1px ; solid black; font-size: 9px;">';
        $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';"><br><br><br><br>' . mb_strtoupper($this->Nom_declarante ) . '<br><b> FIRMA DEL DECLARANTE</b></th>'; // Establecemos los bordes de las celdas
        $html .= '<th style="width:50%; border: 1px solid black; background-color:' . $bgColor . ';" COLSPAN=1><br><br><br><br><br><b>FIRMA DEL PASTOR DE LA IGLESIA</b></th>'; // Establecemos el ancho de la columna, los bordes de las celdas y el color de fondo
        $bgColor = '#24424c';
        
        $html .= '</tr>';
             
        $html .= '</table>';
        $html .= '<p style="text-align:center; font-size: 9px; margin-top: 15px; margin-left: -15px;">';
        $html .= '<strong>' . mb_strtoupper('Porque para mÍ el vivir es Cristo, y el morir es ganancia. Filipenses 1:21.') . '</strong>';
        $html .= '</p>';
        $html .= '</div>';
         
         return $html;
     }
 
 
 
 }
 