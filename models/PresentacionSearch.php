<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Presentacion;

/**
 * PresentacionSearch represents the model behind the search form of `app\models\Presentacion`.
 */
class PresentacionSearch extends Presentacion
{
    public static function tableName()
    {
        return '{{%presentacion}}'; // Ajusta esto al nombre correcto de tu tabla
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPresentacion', 'EDAD_Padre', 'EDAD_Madre', 'Congregante_idCongregante'], 'integer'],
            [['Nombre_presentado', 'Apelli_Pat', 'Apellido_Mat', 'Edad', 'Municipio', 'Estado', 'Calle', 'No_Acta', 'CurpPres', 'Fecha_Regis', 'dia', 'mes', 'year', 'nombrePadre', 'apPaternoPadre', 'apMaternoPadre', 'OrigenPadre', 'nombreMadre', 'apPaternoMadre', 'apMaternoMadre', 'OrigenMadre', 'Folio'], 'safe'],
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
        $query = Presentacion::find();

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
            'idPresentacion' => $this->idPresentacion,
            'Fecha_Regis' => $this->Fecha_Regis,
            'EDAD_Padre' => $this->EDAD_Padre,
            'EDAD_Madre' => $this->EDAD_Madre,
            'Congregante_idCongregante' => $this->Congregante_idCongregante,
        ]);

        $query->andFilterWhere(['like', 'Nombre_presentado', $this->Nombre_presentado])
            ->andFilterWhere(['like', 'Apelli_Pat', $this->Apelli_Pat])
            ->andFilterWhere(['like', 'Apellido_Mat', $this->Apellido_Mat])
            ->andFilterWhere(['like', 'Edad', $this->Edad])
            ->andFilterWhere(['like', 'Municipio', $this->Municipio])
            ->andFilterWhere(['like', 'Estado', $this->Estado])
            ->andFilterWhere(['like', 'Calle', $this->Calle])
            ->andFilterWhere(['like', 'No_Acta', $this->No_Acta])
            ->andFilterWhere(['like', 'CurpPres', $this->CurpPres])
            ->andFilterWhere(['like', 'dia', $this->dia])
            ->andFilterWhere(['like', 'mes', $this->mes])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'nombrePadre', $this->nombrePadre])
            ->andFilterWhere(['like', 'apPaternoPadre', $this->apPaternoPadre])
            ->andFilterWhere(['like', 'apMaternoPadre', $this->apMaternoPadre])
            ->andFilterWhere(['like', 'OrigenPadre', $this->OrigenPadre])
            ->andFilterWhere(['like', 'nombreMadre', $this->nombreMadre])
            ->andFilterWhere(['like', 'apPaternoMadre', $this->apPaternoMadre])
            ->andFilterWhere(['like', 'apMaternoMadre', $this->apMaternoMadre])
            ->andFilterWhere(['like', 'OrigenMadre', $this->OrigenMadre])
            ->andFilterWhere(['like', 'Folio', $this->Folio]);

                 // Ejecutar la consulta y obtener los resultados
                 $results = $dataProvider->getModels();
    
                 // Contar los resultados obtenidos
                 $totalResults = count($results);
               // Búsqueda de mes, año y nombre
if ($this->mes && $this->year && $this->Nombre_presentado) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre, mes y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de año, nombre completo y apellidos
} elseif ($this->year && $this->mes) {
    $message = "Se han encontrado un total de {$totalResults} registros para el mes y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por nombre completo
}elseif ($this->year && $this->Nombre_presentado && $this->Apelli_Pat && $this->Apellido_Mat) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre completo y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de año, nombre y un apellido
} elseif ($this->year && $this->Nombre_presentado && $this->Apelli_Pat) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre y un apellido y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de mes, año, nombre y un apellido
} elseif ($this->Nombre_presentado && $this->Apelli_Pat && $this->mes && $this->year) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre un apellido, mes y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de mes, año y nombre completo
} elseif ($this->mes && $this->year && $this->Nombre_presentado && $this->Apelli_Pat && $this->Apellido_Mat) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre completo, mes y año buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda de mes y nombre completo
} elseif ($this->mes && $this->Nombre_presentado && $this->Apelli_Pat && $this->Apellido_Mat) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre completo y mes buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por mes
} elseif ($this->year && $this->Nombre_presentado) {
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
}  elseif ( $this->Nombre_presentado && $this->Apelli_Pat && $this->Apellido_Mat) {
    $message = "Se han encontrado un total de {$totalResults} registros con el nombre y apellidos buscados.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por nombre
}elseif ($this->mes && $this->Nombre_presentado) {
    $message = "Se han encontrado un total de {$totalResults} registros para el mes y nombre buscado.";
    Yii::$app->session->setFlash('success', $message);

// Búsqueda por año
} elseif ($this->Nombre_presentado) {
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
