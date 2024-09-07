<?php

namespace app\controllers;
use Yii;
use yii\db\Query;
use yii\db\Transaction;
use app\models\Defunsion;
use app\models\DefunsionSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use TCPDF; // O mpdf\Mpdf;

/**
 * DefunsionController implements the CRUD actions for Defunsion model.
 */
class DefunsionController extends Controller
{
    public function actionGeneratePdf($id)
    {
        $defunsion = Defunsion::findOne(['idDefunsion' => $id]);
    
        if ($defunsion !== null) {
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true);
    
            $pdf->AddFont('calibri', '', 'calibri.php');
            $pdf->AddFont('calibri', 'B', 'calibrib.php');
    
            $pdf->SetFont('calibri', 'B', 14);
            $pdf->Cell(0, 0, 'ACTA DE DEFUNCIÓN', 0, 1, 'C');
    
            $pdf->SetFont('calibri', '', 11);
            $pdf->Cell(0, 8, 'FOLIO: ' . $defunsion->Folio, 0, 1, 'C');
    
            $marcaDeAguaPath = Yii::getAlias('@app/web/images/ICIARA.png');
            $logoPath = Yii::getAlias('@app/web/images/GVO3.png');
    
            $pdf->SetCreator('Mi sistema Getsemaní');
            $pdf->SetAuthor('Getsemaní');
            $pdf->SetTitle('Defunsion');
    
            $pdf->AddPage();
    
            $pdf->SetLineWidth(0.5);
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
            $imageHeight = 165;
            $imageX = ($pageWidth - $imageWidth) / 2;
            $imageY = ($pageHeight - $imageHeight) / 2;
            $pdf->Image($marcaDeAguaPath, $imageX, $imageY, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0);
            $pdf->stopTransform();
    
            $pdf->Image($logoPath, 20, 10, 180, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    
            $pdf->SetY(50); // Puedes ajustar este valor según sea necesario
            $pdf->SetX(10);
            $pdf->SetFont('calibrib', 'B', 14);
            $pdf->Cell(0, 0, 'ACTA DE DEFUNCIÓN', 0, 1, 'C');
            $pdf->SetFont('calibri', '', 11);
            $pdf->Cell(0, 8, 'FOLIO: ' . $defunsion->Folio, 0, 1, 'C');
    
            $pdf->SetLineWidth(0.5);
            $pdf->SetDrawColor(255, 255, 0);
            $pdf->Rect(5, 5, $pdf->GetPageWidth() - 10, $pdf->GetPageHeight() - 10);
    
            $pdf->SetLineWidth(0.3);
            $pdf->Rect(6, 6, $pdf->GetPageWidth() - 12, $pdf->GetPageHeight() - 12);
    
            $html = $defunsion->generateTableHtml();
            $pdf->writeHTML($html);
    
            // Enviar el PDF directamente al navegador
            $pdf->Output('acta_defunsion_adulto.pdf', 'I');
        } else {
            throw new NotFoundHttpException('El acta de defunsión no fue encontrado.');
        }
    }
    
    public function actionViewPdf($id)
    {
        return $this->render('view-pdf', [
            'id' => $id,
        ]);
    }
    
    public function actionGeneratePdfNino($id)
    {
        $defunsion = Defunsion::findOne(['idDefunsion' => $id]);
    
        if ($defunsion !== null) {
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true);
    
            $pdf->AddFont('calibri', '', 'calibri.php');
            $pdf->AddFont('calibri', 'B', 'calibrib.php');
    
            $marcaDeAguaPath = Yii::getAlias('@app/web/images/ICIARA.png');
            $logoPath = Yii::getAlias('@app/web/images/GVO3.png');
    
            $pdf->SetCreator('Mi Sistema Getsemaní');
            $pdf->SetAuthor('Getsemaní');
            $pdf->SetTitle('Defunsion');
    
            $pdf->AddPage();
    
            $pdf->SetLineWidth(0.5);
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
            $imageHeight = 165;
            $imageX = ($pageWidth - $imageWidth) / 2;
            $imageY = ($pageHeight - $imageHeight) / 2;
            $pdf->Image($marcaDeAguaPath, $imageX, $imageY, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0);
            $pdf->stopTransform();
    
            $pdf->Image($logoPath, 20, 10, 180, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    
            $pdf->SetY(51);
            $pdf->SetX(10);
            $pdf->SetFont('calibrib', 'B', 14);
            $pdf->Cell(0, 0, 'ACTA DE DEFUNCIÓN', 0, 1, 'C');
            $pdf->SetFont('calibri', '', 11);
            $pdf->Cell(0, 8, 'FOLIO: ' . $defunsion->Folio, 0, 1, 'C');
    
            $pdf->SetLineWidth(0.5);
            $pdf->SetDrawColor(255, 255, 0);
            $pdf->Rect(5, 5, $pdf->GetPageWidth() - 10, $pdf->GetPageHeight() - 10);
    
            $pdf->SetLineWidth(0.3);
            $pdf->Rect(6, 6, $pdf->GetPageWidth() - 12, $pdf->GetPageHeight() - 12);
    
            $html = $defunsion->generateNinoTableHtml();
            $pdf->writeHTML($html);
    
            // Enviar el PDF directamente al navegador
        $pdf->Output('acta_defunsion_niño.pdf', 'I');
    } else {
        throw new NotFoundHttpException('El acta de defunsión no fue encontrado.');
    }
}

public function actionViewPdfNino($id)
{
    return $this->render('view-pdf-nino', [
        'id' => $id,
    ]);
}


    public function actionGeneratePdfJoven($id)
    {
        $defunsion = Defunsion::findOne(['idDefunsion' => $id]);
    
        if ($defunsion !== null) {
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true);
    
            $pdf->AddFont('calibri', '', 'calibri.php');
            $pdf->AddFont('calibri', 'B', 'calibrib.php');
    
            $marcaDeAguaPath = Yii::getAlias('@app/web/images/ICIARA.png');
            $logoPath = Yii::getAlias('@app/web/images/GVO3.png');
    
            $pdf->SetCreator('Mi Sistema Getsemaní');
            $pdf->SetAuthor('Getsemaní');
            $pdf->SetTitle('Defunsion');
    
            $pdf->AddPage();
    
            $pdf->SetLineWidth(0.5);
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
            $imageHeight = 165;
            $imageX = ($pageWidth - $imageWidth) / 2;
            $imageY = ($pageHeight - $imageHeight) / 2;
            $pdf->Image($marcaDeAguaPath, $imageX, $imageY, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0);
            $pdf->stopTransform();
    
            $pdf->Image($logoPath, 20, 10, 180, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    
            $pdf->SetY(48);
            $pdf->SetX(10);
            $pdf->SetFont('calibrib', 'B', 14);
            $pdf->Cell(0, 0, 'ACTA DE DEFUNCIÓN', 0, 1, 'C');
            $pdf->SetFont('calibri', '', 10);
            $pdf->Cell(0, 8, 'FOLIO: ' . $defunsion->Folio, 0, 1, 'C');
    
            $pdf->SetLineWidth(0.5);
            $pdf->SetDrawColor(255, 255, 0);
            $pdf->Rect(5, 5, $pdf->GetPageWidth() - 10, $pdf->GetPageHeight() - 10);
    
            $pdf->SetLineWidth(0.3);
            $pdf->Rect(6, 6, $pdf->GetPageWidth() - 12, $pdf->GetPageHeight() - 12);
    
            $html = $defunsion->generateJovenTableHtml();
            $pdf->writeHTML($html);
    
         
             // Enviar el PDF directamente al navegador
        $pdf->Output('acta_defunsion_embarazada.pdf', 'I');

    } else {
        throw new NotFoundHttpException('El acta de defunsión no fue encontrado.');
    }
}

public function actionViewPdfJoven($id)
{
    return $this->render('view-pdf-joven', [
        'id' => $id,
    ]);
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
     * Lists all Defunsion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DefunsionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        
          // Si se ha buscado por mes, mostrar el mensaje de total de registros encontrados
          if ($searchModel->mes) {
            $message = "Se han encontrado un total de {$dataProvider->getTotalCount()} registros para el mes buscado.";
            Yii::$app->session->setFlash('success', $message);
        }
    
        // Obtener la cantidad de registros de Bautizo
        $countDefunsion = Defunsion::find()->count();
    

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'countDefunsion' => $countDefunsion, // Pasar la cantidad de Bautizos a la vista
        ]);
    }
    public function actionIndex2()
 {
     $searchModel = new DefunsionSearch();
     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
     return $this->render('index2', [
         'searchModel' => $searchModel,
         'dataProvider' => $dataProvider,
     ]);
 }

    /**
     * Displays a single Defunsion model.
     * @param int $idDefunsion Id Defunsion
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idDefunsion)
    {
        return $this->render('view', [
            'model' => $this->findModel($idDefunsion),
        ]);
    }

    /**
     * Creates a new Defunsion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Defunsion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idDefunsion' => $model->idDefunsion]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Defunsion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idDefunsion Id Defunsion
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idDefunsion)
    {
        $model = $this->findModel($idDefunsion);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idDefunsion' => $model->idDefunsion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    

    /**
     * Deletes an existing Defunsion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idDefunsion Id Defunsion
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idDefunsion)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            // Eliminar el registro con el idDefunsion proporcionado
            $registroEliminado = Defunsion::findOne($idDefunsion);
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
        // Obtener todos los registros restantes en orden ascendente de idDefunsion
        $registros = Defunsion::find()->orderBy('idDefunsion')->all();

        // Inicializar el contador para los nuevos IDs
        $nuevoId = 1;

        // Reasignar los IDs y los folios
        foreach ($registros as $registro) {
            $registro->idDefunsion = $nuevoId;
            $registro->Folio = Defunsion::generarNuevoFolio($nuevoId);
            $registro->save(false);
            $nuevoId++;
        }

        // Calcular el nuevo valor para el autoincremento
        $nuevoAutoincremento = $nuevoId;

        // Establecer el autoincremento a través de una nueva consulta SQL
        Yii::$app->db->createCommand("ALTER TABLE Defunsion AUTO_INCREMENT = $nuevoAutoincremento")
            ->execute();
    }

    protected function generarNuevoFolio($idDefunsion)
    {
        $fecha = date('Ymd'); // Obtener la fecha actual en el formato YYYYMMDD
        return 'FGD' . $fecha . str_pad($idDefunsion, 7, '0', STR_PAD_LEFT);
    }
    /**
     * Finds the Defunsion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idDefunsion Id Defunsion
     * @return Defunsion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idDefunsion)
    {
        if (($model = Defunsion::findOne(['idDefunsion' => $idDefunsion])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
