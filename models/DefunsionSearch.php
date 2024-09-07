<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Defunsion;

/**
 * DefunsionSearch represents the model behind the search form of `app\models\Defunsion`.
 */
class DefunsionSearch extends Defunsion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDefunsion', 'solicitudes_idSolicitud'], 'integer'],
            [['Fecha_registro', 'dia', 'mes', 'year', 'Nombre', 'apePat', 'apeMat', 'sexo', 'naciona', 'Fecha_Nacim', 'localidad', 'municipio', 'edad_Fallecid', 'Embarazada', 'domicilio_comp', 'estado_civil', 'Nombre_Conyuge', 'NomPadreCompl', 'NomMadreComp', 'nacioMadre', 'nacioPadre', 'nacioConyuge', 'Fecha_Defuncion', 'Lugar_Fallecido', 'Destino_cadaver', 'Nombre_Panteon', 'Ubica_Panteon', 'Certificado', 'Nom_declarante', 'edad_decla', 'Parentesco', 'Nacion_parie', 'Domi_Compl_Pa', 'ocupa_Dec', 'Telefono_decla', 'Nom_funeraria', 'Telefono_fune', 'Ciudad', 'Atenc_medica', 'ACTIVIDADES', 'Ocupacion', 'Escolaridad', 'Folio'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Defunsion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idDefunsion' => $this->idDefunsion,
            'Fecha_registro' => $this->Fecha_registro,
            'solicitudes_idSolicitud' => $this->solicitudes_idSolicitud,
        ]);

        $query->andFilterWhere(['like', 'dia', $this->dia])
            ->andFilterWhere(['like', 'mes', $this->mes])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'apePat', $this->apePat])
            ->andFilterWhere(['like', 'apeMat', $this->apeMat])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'naciona', $this->naciona])
            ->andFilterWhere(['like', 'Fecha_Nacim', $this->Fecha_Nacim])
            ->andFilterWhere(['like', 'localidad', $this->localidad])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'edad_Fallecid', $this->edad_Fallecid])
            ->andFilterWhere(['like', 'Embarazada', $this->Embarazada])
            ->andFilterWhere(['like', 'domicilio_comp', $this->domicilio_comp])
            ->andFilterWhere(['like', 'estado_civil', $this->estado_civil])
            ->andFilterWhere(['like', 'Nombre_Conyuge', $this->Nombre_Conyuge])
            ->andFilterWhere(['like', 'NomPadreCompl', $this->NomPadreCompl])
            ->andFilterWhere(['like', 'NomMadreComp', $this->NomMadreComp])
            ->andFilterWhere(['like', 'nacioMadre', $this->nacioMadre])
            ->andFilterWhere(['like', 'nacioPadre', $this->nacioPadre])
            ->andFilterWhere(['like', 'nacioConyuge', $this->nacioConyuge])
            ->andFilterWhere(['like', 'Fecha_Defuncion', $this->Fecha_Defuncion])
            ->andFilterWhere(['like', 'Lugar_Fallecido', $this->Lugar_Fallecido])
            ->andFilterWhere(['like', 'Destino_cadaver', $this->Destino_cadaver])
            ->andFilterWhere(['like', 'Nombre_Panteon', $this->Nombre_Panteon])
            ->andFilterWhere(['like', 'Ubica_Panteon', $this->Ubica_Panteon])
            ->andFilterWhere(['like', 'Certificado', $this->Certificado])
            ->andFilterWhere(['like', 'Nom_declarante', $this->Nom_declarante])
            ->andFilterWhere(['like', 'edad_decla', $this->edad_decla])
            ->andFilterWhere(['like', 'Parentesco', $this->Parentesco])
            ->andFilterWhere(['like', 'Nacion_parie', $this->Nacion_parie])
            ->andFilterWhere(['like', 'Domi_Compl_Pa', $this->Domi_Compl_Pa])
            ->andFilterWhere(['like', 'ocupa_Dec', $this->ocupa_Dec])
            ->andFilterWhere(['like', 'Telefono_decla', $this->Telefono_decla])
            ->andFilterWhere(['like', 'Nom_funeraria', $this->Nom_funeraria])
            ->andFilterWhere(['like', 'Telefono_fune', $this->Telefono_fune])
            ->andFilterWhere(['like', 'Ciudad', $this->Ciudad])
            ->andFilterWhere(['like', 'Atenc_medica', $this->Atenc_medica])
            ->andFilterWhere(['like', 'ACTIVIDADES', $this->ACTIVIDADES])
            ->andFilterWhere(['like', 'Ocupacion', $this->Ocupacion])
            ->andFilterWhere(['like', 'Escolaridad', $this->Escolaridad])
            ->andFilterWhere(['like', 'Folio', $this->Folio]);

             // Ejecutar la consulta y obtener los resultados
        $results = $dataProvider->getModels();
    
        // Contar los resultados obtenidos
        $totalResults = count($results);
    
        // Verificar si se especificó un mes y mostrar un mensaje
        
        if ($this->Nombre) {
            $message = "Se han encontrado un total de {$totalResults} registros para nombre buscado.";
            Yii::$app->session->setFlash('success', $message);
        
        // No se han especificado parámetros de búsqueda
        }


        if ($this->Nombre&& $this->apePat ) {
            $message = "Se han encontrado un total de {$totalResults} registros para nombre buscado.";
            Yii::$app->session->setFlash('success', $message);
        
        // No se han especificado parámetros de búsqueda
        } elseif ($this->mes && $this->year&& $this->Nombre&& $this->apePat ) {
            $message = "Se han encontrado un total de {$totalResults} registros para el mes, año y nombre buscado.";
            Yii::$app->session->setFlash('success', $message);
        
        // No se han especificado parámetros de búsqueda
        }  
        
        elseif ($this->mes && $this->year&& $this->Nombre ) {
            $message = "Se han encontrado un total de {$totalResults} registros para el mes, año y nombre buscado.";
            Yii::$app->session->setFlash('success', $message);
        
        // No se han especificado parámetros de búsqueda
        } elseif ($this->year&& $this->Nombre ) {
            $message = "Se han encontrado un total de {$totalResults} registros para  año y nombre buscado.";
            Yii::$app->session->setFlash('success', $message);
        
        // No se han especificado parámetros de búsqueda
        }elseif ($this->mes&& $this->Nombre ) {
            $message = "Se han encontrado un total de {$totalResults} registros para  mes y nombre buscado.";
            Yii::$app->session->setFlash('success', $message);
        
        // No se han especificado parámetros de búsqueda
        }elseif ($this->mes && $this->year ) {
            $message = "Se han encontrado un total de {$totalResults} registros para año y mes buscado.";
            Yii::$app->session->setFlash('success', $message);
        
        // No se han especificado parámetros de búsqueda
        }elseif ($this->mes) {
            $message = "Se han encontrado un total de {$totalResults} registros para el mes buscado.";
            Yii::$app->session->setFlash('success', $message);
        }elseif ($this->year) {
            $message = "Se han encontrado un total de {$totalResults} registros para el año buscado.";
            Yii::$app->session->setFlash('success', $message);
        }else {
            $message = "No se han especificado mes ni año para la búsqueda.";
            Yii::$app->session->setFlash('error', $message);
        }
    

        return $dataProvider;
    }
}
