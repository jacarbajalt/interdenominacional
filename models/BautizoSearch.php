<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bautizo;

/**
 * BautizoSearch represents the model behind the search form of `app\models\Bautizo`.
 */
class BautizoSearch extends Bautizo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idBautizo', 'year', 'solicitudes_idSolicitud', 'Congregante_idCongregante'], 'integer'],
            [['nombre', 'apPaterno', 'apMaterno', 'Domicilio', 'estadoCivil', 'casadoIgles', 'BautizadoIglesEva', 'Denominacion', 'asisteIgles', 'Nacionalidad', 'Ocupacion', 'edad', 'NomTestigo1', 'NomTestigo2', 'DomicilioTes1', 'DomicilioTes2', 'Fecha_registro', 'dia', 'mes', 'Folio'], 'safe'],
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
        $query = Bautizo::find();
        
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
            'idBautizo' => $this->idBautizo,
            'Fecha_registro' => $this->Fecha_registro,
            'year' => $this->year,
            'solicitudes_idSolicitud' => $this->solicitudes_idSolicitud,
            'Congregante_idCongregante' => $this->Congregante_idCongregante,
        ]);
    
        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apPaterno', $this->apPaterno])
            ->andFilterWhere(['like', 'apMaterno', $this->apMaterno])
            ->andFilterWhere(['like', 'Domicilio', $this->Domicilio])
            ->andFilterWhere(['like', 'estadoCivil', $this->estadoCivil])
            ->andFilterWhere(['like', 'casadoIgles', $this->casadoIgles])
            ->andFilterWhere(['like', 'BautizadoIglesEva', $this->BautizadoIglesEva])
            ->andFilterWhere(['like', 'Denominacion', $this->Denominacion])
            ->andFilterWhere(['like', 'asisteIgles', $this->asisteIgles])
            ->andFilterWhere(['like', 'Nacionalidad', $this->Nacionalidad])
            ->andFilterWhere(['like', 'Ocupacion', $this->Ocupacion])
            ->andFilterWhere(['like', 'edad', $this->edad])
            ->andFilterWhere(['like', 'NomTestigo1', $this->NomTestigo1])
            ->andFilterWhere(['like', 'NomTestigo2', $this->NomTestigo2])
            ->andFilterWhere(['like', 'DomicilioTes1', $this->DomicilioTes1])
            ->andFilterWhere(['like', 'DomicilioTes2', $this->DomicilioTes2])
            ->andFilterWhere(['like', 'dia', $this->dia])
            ->andFilterWhere(['like', 'mes', $this->mes])
            ->andFilterWhere(['like', 'Folio', $this->Folio]);
    
        // Ejecutar la consulta y obtener los resultados
        $results = $dataProvider->getModels();
    
        // Contar los resultados obtenidos
        $totalResults = count($results);
    // Búsqueda de mes, año y nombre
if ($this->mes && $this->year && $this->nombre) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre, mes y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de año, nombre completo y apellidos
} elseif ($this->year && $this->mes) {
    $message = "Se han encontrado un total de {$totalResults} registros para el mes y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por nombre completo
}elseif ($this->year && $this->nombre && $this->apPaterno && $this->apMaterno) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre completo y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de año, nombre y un apellido
} elseif ($this->year && $this->nombre && $this->apPaterno) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre y un apellido y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de mes, año, nombre y un apellido
} elseif ($this->nombre && $this->apPaterno && $this->mes && $this->year) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre un apellido, mes y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de mes, año y nombre completo
} elseif ($this->mes && $this->year && $this->nombre && $this->apPaterno && $this->apMaterno) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre completo, mes y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de mes y nombre completo
} elseif ($this->mes && $this->nombre && $this->apPaterno && $this->apMaterno) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre completo y mes buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por mes
} elseif ($this->mes && $this->nombre) {
    $message = "Se han encontrado un total de {$totalResults} registros para el mes y nombre buscado.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por año
}elseif ($this->year && $this->nombre) {
    $message = "Se han encontrado un total de {$totalResults} registros para el año y nombre buscado.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por año
}elseif ($this->mes) {
    $message = "Se han encontrado un total de {$totalResults} registros para el mes buscado.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por año
} elseif ($this->year) {
    $message = "Se han encontrado un total de {$totalResults} registros para el año buscado.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por mes y año
}  elseif ($this->nombre && $this->apPaterno && $this->apMaterno) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre y apellidos buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por nombre
} elseif ($this->nombre) {
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
