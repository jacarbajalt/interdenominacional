<?php

namespace app\controllers;
use Yii;
use yii\db\Query;
use yii\db\Transaction;
use app\models\Solicitudes;
use app\models\Usuario;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SolicitudesController implements the CRUD actions for Solicitudes model.
 */
class SolicitudesController extends Controller
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
     * Lists all Solicitudes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Solicitudes::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idSolicitud' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Solicitudes model.
     * @param int $idSolicitud Id Solicitud
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idSolicitud)
    {
        return $this->render('view', [
            'model' => $this->findModel($idSolicitud),
        ]);
    }

    /**
     * Creates a new Solicitudes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        
        $model = new Solicitudes();
       
        if ($this->request->isPost) {

            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idSolicitud' => $model->idSolicitud]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Solicitudes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idSolicitud Id Solicitud
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idSolicitud)
    {
        $model = $this->findModel($idSolicitud);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idSolicitud' => $model->idSolicitud]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Solicitudes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idSolicitud Id Solicitud
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idSolicitudes)
{
    $transaction = Yii::$app->db->beginTransaction();
    try {
        // Eliminar el registro con el idSolicitudes proporcionado
        $registroEliminado = Solicitudes::findOne($idSolicitudes);
        $registroEliminado->delete();

        // Actualizar los IDs restantes comenzando desde el último ID existente más 1
        Yii::$app->db->createCommand('UPDATE Solicitudes SET idSolicitudes = idSolicitudes - 1 WHERE idSolicitudes > :idSolicitudes')
            ->bindValue(':idSolicitudes', $idSolicitudes)
            ->execute();

        // Obtener el máximo ID actual
        $ultimoIdActualizado = (new \yii\db\Query())
            ->select('MAX(idSolicitudes)')
            ->from('Solicitudes')
            ->scalar();

        // Calcular el nuevo valor para el autoincremento
        $nuevoAutoincremento = $ultimoIdActualizado + 1;

        // Establecer el autoincremento a través de una nueva consulta SQL
        Yii::$app->db->createCommand("ALTER TABLE Solicitudes AUTO_INCREMENT = $nuevoAutoincremento")
            ->execute();

        $transaction->commit();
    } catch (\Exception $e) {
        $transaction->rollback();
        throw $e;
    }

    return $this->redirect(['index']);
}

    /**
     * Finds the Solicitudes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idSolicitud Id Solicitud
     * @return Solicitudes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idSolicitud)
    {
        if (($model = Solicitudes::findOne(['idSolicitud' => $idSolicitud])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
