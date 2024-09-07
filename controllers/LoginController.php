<?php

namespace app\controllers;
use Yii;
use yii\db\Query;
use yii\db\Transaction;
use app\models\Login;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LoginController implements the CRUD actions for Login model.
 */
class LoginController extends Controller
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
     * Lists all Login models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Login::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idLogin' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Login model.
     * @param int $idLogin Id Login
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idLogin)
    {
        return $this->render('view', [
            'model' => $this->findModel($idLogin),
        ]);
    }

    /**
     * Creates a new Login model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Login();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idLogin' => $model->idLogin]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Login model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idLogin Id Login
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idLogin)
    {
        $model = $this->findModel($idLogin);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idLogin' => $model->idLogin]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Login model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idLogin Id Login
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idLogin)
{
    $transaction = Yii::$app->db->beginTransaction();
    try {
        // Eliminar el registro con el idLogin proporcionado
        $registroEliminado = Login::findOne($idLogin);
        $registroEliminado->delete();

        // Actualizar los IDs restantes comenzando desde el último ID existente más 1
        Yii::$app->db->createCommand('UPDATE Login SET idLogin = idLogin - 1 WHERE idLogin > :idLogin')
            ->bindValue(':idLogin', $idLogin)
            ->execute();

        // Obtener el máximo ID actual
        $ultimoIdActualizado = (new \yii\db\Query())
            ->select('MAX(idLogin)')
            ->from('Login')
            ->scalar();

        // Calcular el nuevo valor para el autoincremento
        $nuevoAutoincremento = $ultimoIdActualizado + 1;

        // Establecer el autoincremento a través de una nueva consulta SQL
        Yii::$app->db->createCommand("ALTER TABLE Login AUTO_INCREMENT = $nuevoAutoincremento")
            ->execute();

        $transaction->commit();
    } catch (\Exception $e) {
        $transaction->rollback();
        throw $e;
    }

    return $this->redirect(['index']);
}

    /**
     * Finds the Login model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idLogin Id Login
     * @return Login the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idLogin)
    {
        if (($model = Login::findOne(['idLogin' => $idLogin])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
