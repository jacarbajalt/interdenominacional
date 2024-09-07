<?php

namespace app\controllers;
use Yii;
use yii\db\Query;
use yii\db\Transaction;
use app\models\Usuario;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
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
     * Lists all Usuario models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Usuario::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idUsuario' => SORT_DESC,
                    'Login_idLogin' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
     * @param int $idUsuario Id Usuario
     * @param string $Login_idLogin Login Id Login
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idUsuario, $Login_idLogin)
    {
        return $this->render('view', [
            'model' => $this->findModel($idUsuario, $Login_idLogin),
        ]);
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Usuario();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idUsuario' => $model->idUsuario, 'Login_idLogin' => $model->Login_idLogin]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idUsuario Id Usuario
     * @param string $Login_idLogin Login Id Login
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idUsuario, $Login_idLogin)
    {
        $model = $this->findModel($idUsuario, $Login_idLogin);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idUsuario' => $model->idUsuario, 'Login_idLogin' => $model->Login_idLogin]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idUsuario Id Usuario
     * @param string $Login_idLogin Login Id Login
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idUsuario)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            // Eliminar el registro con el idUsuario proporcionado
            $registroEliminado = Usuario::findOne($idUsuario);
            $registroEliminado->delete();
    
            // Actualizar los IDs restantes comenzando desde el último ID existente más 1
            Yii::$app->db->createCommand('UPDATE Usuario SET idUsuario = idUsuario - 1 WHERE idUsuario > :idUsuario')
                ->bindValue(':idUsuario', $idUsuario)
                ->execute();
    
            // Obtener el máximo ID actual
            $ultimoIdActualizado = (new \yii\db\Query())
                ->select('MAX(idUsuario)')
                ->from('Usuario')
                ->scalar();
    
            // Calcular el nuevo valor para el autoincremento
            $nuevoAutoincremento = $ultimoIdActualizado + 1;
    
            // Establecer el autoincremento a través de una nueva consulta SQL
            Yii::$app->db->createCommand("ALTER TABLE Usuario AUTO_INCREMENT = $nuevoAutoincremento")
                ->execute();
    
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollback();
            throw $e;
        }
    
        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idUsuario Id Usuario
     * @param string $Login_idLogin Login Id Login
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idUsuario, $Login_idLogin)
    {
        if (($model = Usuario::findOne(['idUsuario' => $idUsuario, 'Login_idLogin' => $Login_idLogin])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
