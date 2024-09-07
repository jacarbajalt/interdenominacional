<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Matrimonio;

/**
 * MatrimonioSearch represents the model behind the search form of `app\models\Matrimonio`.
 */
class MatrimonioSearch extends Matrimonio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idMatrimonio', 'solicitudes_idSolicitud', 'Congregante_idCongregante'], 'integer'],
            [['Fecha_Registro', 'dia', 'mes', 'year', 'nombreNovio', 'apPaternoNovio', 'apMaternoNovio', 'edadNovio', 'curpNovio', 'direccionNovio', 'coloniaNovio', 'cPostalNovio', 'estadoNovio', 'Padre_Novio', 'Domici_Padre', 'Madre_novio', 'Domic_MadreNov', 'nombreNovia', 'apPaternoNovia', 'apMaternoNovia', 'edadNovia', 'curpNovia', 'direccionNovia', 'coloniaNovia', 'cPostalNovia', 'estadoNovia', 'Padre_Novia', 'Domic_Pa_Novia', 'Madre_novia', 'Domic_Ma_Novia', 'numActaMatCivil', 'municipioMatCivil', 'diaMatCivil', 'mesMatCivil', 'anioMatCivil', 'Folio'], 'safe'],
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
        $query = Matrimonio::find();

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
            'idMatrimonio' => $this->idMatrimonio,
            'Fecha_Registro' => $this->Fecha_Registro,
            'solicitudes_idSolicitud' => $this->solicitudes_idSolicitud,
            'Congregante_idCongregante' => $this->Congregante_idCongregante,
        ]);

        $query->andFilterWhere(['like', 'dia', $this->dia])
            ->andFilterWhere(['like', 'mes', $this->mes])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'nombreNovio', $this->nombreNovio])
            ->andFilterWhere(['like', 'apPaternoNovio', $this->apPaternoNovio])
            ->andFilterWhere(['like', 'apMaternoNovio', $this->apMaternoNovio])
            ->andFilterWhere(['like', 'edadNovio', $this->edadNovio])
            ->andFilterWhere(['like', 'curpNovio', $this->curpNovio])
            ->andFilterWhere(['like', 'direccionNovio', $this->direccionNovio])
            ->andFilterWhere(['like', 'coloniaNovio', $this->coloniaNovio])
            ->andFilterWhere(['like', 'cPostalNovio', $this->cPostalNovio])
            ->andFilterWhere(['like', 'estadoNovio', $this->estadoNovio])
            ->andFilterWhere(['like', 'Padre_Novio', $this->Padre_Novio])
            ->andFilterWhere(['like', 'Domici_Padre', $this->Domici_Padre])
            ->andFilterWhere(['like', 'Madre_novio', $this->Madre_novio])
            ->andFilterWhere(['like', 'Domic_MadreNov', $this->Domic_MadreNov])
            ->andFilterWhere(['like', 'nombreNovia', $this->nombreNovia])
            ->andFilterWhere(['like', 'apPaternoNovia', $this->apPaternoNovia])
            ->andFilterWhere(['like', 'apMaternoNovia', $this->apMaternoNovia])
            ->andFilterWhere(['like', 'edadNovia', $this->edadNovia])
            ->andFilterWhere(['like', 'curpNovia', $this->curpNovia])
            ->andFilterWhere(['like', 'direccionNovia', $this->direccionNovia])
            ->andFilterWhere(['like', 'coloniaNovia', $this->coloniaNovia])
            ->andFilterWhere(['like', 'cPostalNovia', $this->cPostalNovia])
            ->andFilterWhere(['like', 'estadoNovia', $this->estadoNovia])
            ->andFilterWhere(['like', 'Padre_Novia', $this->Padre_Novia])
            ->andFilterWhere(['like', 'Domic_Pa_Novia', $this->Domic_Pa_Novia])
            ->andFilterWhere(['like', 'Madre_novia', $this->Madre_novia])
            ->andFilterWhere(['like', 'Domic_Ma_Novia', $this->Domic_Ma_Novia])
            ->andFilterWhere(['like', 'numActaMatCivil', $this->numActaMatCivil])
            ->andFilterWhere(['like', 'municipioMatCivil', $this->municipioMatCivil])
            ->andFilterWhere(['like', 'diaMatCivil', $this->diaMatCivil])
            ->andFilterWhere(['like', 'mesMatCivil', $this->mesMatCivil])
            ->andFilterWhere(['like', 'anioMatCivil', $this->anioMatCivil])
            ->andFilterWhere(['like', 'Folio', $this->Folio]);

             // Ejecutar la consulta y obtener los resultados
        $results = $dataProvider->getModels();
    
        // Contar los resultados obtenidos
        $totalResults = count($results);
    
        if ($this->nombreNovio && $this->apPaternoNovio && $this->mes && $this->year) {
            $message = "Se han encontrado un total de {$totalResults} registros con el nombre un apellido, mes y año buscados.";
            Yii::$app->session->setFlash('success', $message);
        
        // Búsqueda de mes, año y nombre completo
        }  elseif ( $this->nombreNovio&& $this->mes) {
            $message = "Se han encontrado un total de {$totalResults} registros para el nombre y mes buscado.";
            Yii::$app->session->setFlash('success', $message);
        
        // Búsqueda por año
        } elseif ( $this->nombreNovio&& $this->year) {
            $message = "Se han encontrado un total de {$totalResults} registros para el nombre y año buscado.";
            Yii::$app->session->setFlash('success', $message);
        
        // Búsqueda por año
        }   // Búsqueda de mes, año y nombre
      elseif ($this->mes && $this->nombreNovio && $this->apPaternoNovio && $this->apMaternoNovio) {
        $message = "Se han encontrado un total de {$totalResults} registros con el nombre completo y mes buscados.";
        Yii::$app->session->setFlash('success', $message);
    
    // Búsqueda por mes
    }elseif ($this->mes && $this->year && $this->nombreNovio) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre, mes y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de año, nombre completo y apellidos
} elseif ($this->year && $this->mes) {
    $message = "Se han encontrado un total de {$totalResults} registros para el mes y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por nombre completo
}elseif ($this->year && $this->nombreNovio && $this->apPaternoNovio && $this->apMaternoNovio) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre completo y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de año, nombre y un apellido
} elseif ($this->year && $this->nombreNovio && $this->apPaternoNovio) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre un apellido y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de mes, año, nombre y un apellido
} elseif ($this->mes && $this->year && $this->nombreNovio && $this->apPaternoNovio && $this->apMaternoNovio) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre completo, mes y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de mes y nombre completo
}  elseif ($this->mes) {
    $message = "Se han encontrado un total de {$totalResults} registros para el mes buscado.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por año
} elseif ($this->year) {
    $message = "Se han encontrado un total de {$totalResults} registros para el año buscado.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por mes y año
}  elseif ($this->nombreNovio && $this->apPaternoNovio && $this->apMaternoNovio) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre y apellidos buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por nombre
} elseif ($this->nombreNovio) {
    $message = "Se han encontrado un total de {$totalResults} registros para el nombre buscado.";
    Yii::$app->session->setFlash('success', $message);

// No se han especificado parámetros de búsqueda
} else {
    $message = "No se han especificado mes ni año para la búsqueda.";
    Yii::$app->session->setFlash('error', $message);
}

        return $dataProvider;
    }
}
