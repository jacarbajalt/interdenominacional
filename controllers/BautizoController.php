<?php

namespace app\controllers;

use app\models\Bautizo;
use app\models\BautizoSearch;
use app\models\Solicitudes;
use yii\db\Query;
use yii\db\Transaction;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use TCPDF; // O mpdf\Mpdf;
/**
 * BautizoController implements the CRUD actions for Bautizo model.
 */
class BautizoController extends Controller
{
    /**
     * @inheritDoc
     */
    
     public function actionViewPdf($id)
{
    return $this->render('view-pdf', [
        'id' => $id,
    ]);
}
public function actionGeneratePdf($id)
{
    $bautizo = Bautizo::findOne(['idBautizo' => $id]);

    if ($bautizo !== null) {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true);

        $pdf->AddFont('calibri', '', 'calibri.php');
        $pdf->AddFont('calibri', 'B', 'calibrib.php');

        $pdf->SetFont('calibri', 'B', 14);
        $pdf->Cell(0, 0, 'ACTA DE BAUTIZO', 0, 1, 'C');

        $pdf->SetFont('calibri', '', 11);
        $pdf->Cell(0, 8, 'FOLIO: ' . $bautizo->Folio, 0, 1, 'C');

        $marcaDeAguaPath = Yii::getAlias('@app/web/images/ICIARA.png');
        $logoPath = Yii::getAlias('@app/web/images/GVO3.png');

        $pdf->SetCreator('Mi Sistema Getsemaní');
        $pdf->SetAuthor('Getsemaní');
        $pdf->SetTitle('Bautizo');

        $pdf->AddPage();
        //LINEA AMARRILLA EN COMIENZO DEL PDF
        $pdf->SetLineWidth(0.6);
        $pdf->SetDrawColor(255, 255, 0);
        $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + $pdf->getPageWidth() - $pdf->getMargins()['left'] - $pdf->getMargins()['right'], $pdf->GetY());

        $pdf->startTransform();
        $pdf->SetAlpha(0.7);
        $pdf->SetFillColor(231, 248, 255);
        $pdf->Rect(0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'F');
        $pdf->stopTransform();

        $pdf->startTransform();
        $pdf->SetAlpha(0.2);

        $pageWidth = $pdf->GetPageWidth();
        $pageHeight = $pdf->GetPageHeight();
        $imageWidth = 150;
        $imageHeight = 160;
        $imageX = ($pageWidth - $imageWidth) / 2;
        $imageY = ($pageHeight - $imageHeight) / 2;
        $pdf->Image($marcaDeAguaPath, $imageX, $imageY, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0);
        $pdf->stopTransform();

        $pdf->Image($logoPath, 20, 10, 180, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $pdf->SetY(55);
        $pdf->SetX(10);

        $pdf->SetFont('calibri', 'B', 14);
        $pdf->Cell(0, 0, 'ACTA DE BAUTIZO', 0, 1, 'C');

        $pdf->SetFont('calibri', '', 11);
        $pdf->Cell(0, 8, 'FOLIO: ' . $bautizo->Folio, 0, 1, 'C');

        $pdf->SetLineWidth(0.5);
        $pdf->SetDrawColor(255, 255, 0);
        $pdf->Rect(5, 5, $pdf->GetPageWidth() - 10, $pdf->GetPageHeight() - 10);
        $pdf->SetLineWidth(0.3);
        $pdf->Rect(6, 6, $pdf->GetPageWidth() - 12, $pdf->GetPageHeight() - 12);

        $html = $bautizo->generateTableHtml();
        $pdf->writeHTML($html);

         // Establecer el nombre del archivo con el folio
         $fileName = 'bautizo_folio_' . $bautizo->Folio . '.pdf';
        
         // Mostramos el PDF en el navegador
         $pdf->Output($fileName, 'I');
    } else {
        throw new NotFoundHttpException('El bautizo no fue encontrado.');
    }
}



 

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
     * Lists all Bautizo models.
     *
     * @return string
     */

    public function actionIndex()
    {
        $searchModel = new BautizoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        // Si se ha buscado por mes, mostrar el mensaje de total de registros encontrados
        if ($searchModel->mes) {
            $message = "Se han encontrado un total de {$dataProvider->getTotalCount()} registros para el mes buscado.";
            Yii::$app->session->setFlash('success', $message);
        }
    
        // Obtener la cantidad de registros de Bautizo
        $countBautizos = Bautizo::find()->count();
    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'countBautizos' => $countBautizos, // Pasar la cantidad de Bautizos a la vista
        ]);
    }
    

    public function actionIndex2()
    {
        $searchModel = new BautizoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Bautizo model.
     * @param int $idBautizo Id Bautizo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idBautizo)
    {
        return $this->render('view', [
            'model' => $this->findModel($idBautizo),
        ]);
    }

    /**
     * Creates a new Bautizo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bautizo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idBautizo' => $model->idBautizo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bautizo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idBautizo Id Bautizo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idBautizo)
    {
        $model = $this->findModel($idBautizo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idBautizo' => $model->idBautizo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bautizo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idBautizo Id Bautizo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
   

     public function actionDelete($idBautizo)
     {
         $transaction = Yii::$app->db->beginTransaction();
         try {
             // Eliminar el registro con el idBautizo proporcionado
             $registroEliminado = Bautizo::findOne($idBautizo);
             if ($registroEliminado !== null) {
                 $registroEliminado->delete();
             }
     
             // Actualizar los IDs restantes y reasignar los folios
             $this->reasignarIdsYFolios();
     
             $transaction->commit();
         } catch (\Exception $e) {
             $transaction->rollback();
             throw $e;
         }
     
         return $this->redirect(['index']);
     }
     
     protected function reasignarIdsYFolios()
     {
         // Obtener todos los registros restantes en orden ascendente de idBautizo
         $registros = Bautizo::find()->orderBy('idBautizo')->all();
     
         // Inicializar el contador para los nuevos IDs
         $nuevoId = 1;
     
         // Reasignar los IDs y los folios
         foreach ($registros as $registro) {
             $registro->idBautizo = $nuevoId;
             $registro->Folio = Bautizo::generarNuevoFolio($nuevoId);
             $registro->save(false);
             $nuevoId++;
         }
     
         // Calcular el nuevo valor para el autoincremento
         $nuevoAutoincremento = $nuevoId;
     
         // Establecer el autoincremento a través de una nueva consulta SQL
         Yii::$app->db->createCommand("ALTER TABLE Bautizo AUTO_INCREMENT = $nuevoAutoincremento")
             ->execute();
     }

     

    /**
     * Finds the Bautizo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idBautizo Id Bautizo
     * @return Bautizo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idBautizo)
    {
        if (($model = Bautizo::findOne(['idBautizo' => $idBautizo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
