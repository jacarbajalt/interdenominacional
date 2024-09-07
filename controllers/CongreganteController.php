<?php

namespace app\controllers;
use Yii;
use yii\db\Query;
use yii\db\Transaction;
use app\models\Congregante;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CongreganteController implements the CRUD actions for Congregante model.
 */
class CongreganteController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Congregante models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Congregante::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idCongregante' => SORT_DESC,
                ]
            ],
            */
        ]);
        
        // Obtener la cantidad de registros de Bautizo
        $countCongregante = Congregante::find()->count();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'countCongregante' => $countCongregante, // Pasar la cantidad de Bautizos a la vista
        ]);
    }

    /**
     * Displays a single Congregante model.
     * @param int $idCongregante Id Congregante
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idCongregante)
    {
        return $this->render('view', [
            'model' => $this->findModel($idCongregante),
        ]);
    }

    /**
     * Creates a new Congregante model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Congregante();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idCongregante' => $model->idCongregante]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Congregante model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idCongregante Id Congregante
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idCongregante)
    {
        $model = $this->findModel($idCongregante);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCongregante' => $model->idCongregante]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Congregante model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idCongregante Id Congregante
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idCongregante)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            // Eliminar el registro con el idBautizo proporcionado
            $registroEliminado = Congregante::findOne($idCongregante);
            $registroEliminado->delete();
    
            // Actualizar los IDs restantes comenzando desde el último ID existente más 1
            Yii::$app->db->createCommand('UPDATE Congregante SET idCongregante = idCongregante - 1 WHERE idCongregante > :idCongregante')
                ->bindValue(':idCongregante', $idCongregante)
                ->execute();
    
            // Obtener el máximo ID actualizado después de la eliminación
            $ultimoIdActualizado = (new \yii\db\Query())
                ->select('MAX(idCongregante)')
                ->from('Congregante')
                ->scalar();
    
            // Calcular el nuevo valor para el autoincremento
            $nuevoAutoincremento = $ultimoIdActualizado + 1;
    
            // Establecer el autoincremento a través de una nueva consulta SQL
            Yii::$app->db->createCommand("ALTER TABLE Congregante AUTO_INCREMENT = $nuevoAutoincremento")
                ->execute();
    
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollback();
            throw $e;
        }
    
        return $this->redirect(['index']);
    }

    /**
     * Finds the Congregante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idCongregante Id Congregante
     * @return Congregante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCongregante)
    {
        if (($model = Congregante::findOne(['idCongregante' => $idCongregante])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
