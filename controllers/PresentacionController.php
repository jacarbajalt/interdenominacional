<?php

namespace app\controllers;

use app\models\Presentacion;
use app\models\PresentacionSearch;
use Yii;
use yii\db\Query;
use yii\db\Transaction;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use TCPDF; // O mpdf\Mpdf;

/**
 * PresentacionController implements the CRUD actions for Presentacion model.
 */
class PresentacionController extends Controller
{
    /**
     * @inheritDoc
     */
      public function actionGeneratePdf($id)
    
        {
            // Encuentra el matrimonio por su ID
            $presentacion = Presentacion::findOne(['idPresentacion' => $id]);
        
            if ($presentacion !== null) {
                // Crear una instancia de TCPDF con tamaño de página carta
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true);
                     
                // Carga las fuentes Calibri
                $pdf->AddFont('calibri', '', 'calibri.php');
                $pdf->AddFont('calibri', 'B', 'calibrib.php');
        
         
                // Ruta de la imagen para la marca de agua
                $marcaDeAguaPath = Yii::getAlias('@app/web/images/ICIARA.png');
        
                // Ruta de la imagen del logo
                $logoPath = Yii::getAlias('@app/web/images/GVO3.png');
        
                // Configuración del documento
                $pdf->SetCreator('Mi Sistema Getsemaní');
                $pdf->SetAuthor('Getsemaní');
                $pdf->SetTitle('Presentacion');
                
        
                // Agregar una página
                $pdf->AddPage();
                  // Establecer el grosor de la línea en 0.5 puntos
                  $pdf->SetLineWidth(0.5);
        
                  // Establecer el color AMARILLO EN EL PDF LINEA 
                  $pdf->SetDrawColor(255, 255, 0);
        
                  // Dibujar una línea en la posición actual
                  $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + $pdf->getPageWidth() - $pdf->getMargins()['left'] - $pdf->getMargins()['right'], $pdf->GetY());
                // Guardar la posición actual
                $pdf->startTransform();
        
                // Establecer la opacidad del color de fondo
                $pdf->SetAlpha(0.7);
        
                // Establecer el color de relleno azul cielo
                $pdf->SetFillColor(231, 248, 255); // Azul cielo en RGB
        
                // Dibujar un rectángulo como fondo con el color de relleno
                $pdf->Rect(0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'F');
        
                // Restaurar la posición guardada
                $pdf->stopTransform();
        
                // Guardar la configuración actual del objeto PDF
                $pdf->startTransform();
        
                // Establecer la opacidad de la marca de agua
                $pdf->SetAlpha(0.2);
        
                // Obtener el ancho y alto de la página
                $pageWidth = $pdf->GetPageWidth();
                $pageHeight = $pdf->GetPageHeight();
        
                // Calcular las coordenadas para centrar la marca de agua
                $imageWidth = 130; // Ancho de la imagen de la marca de agua
                $imageHeight = 160; // Alto de la imagen de la marca de agua
                $imageX = ($pageWidth - $imageWidth) / 2; // Coordenada X para centrar horizontalmente
                $imageY = ($pageHeight - $imageHeight) / 2; // Coordenada Y para centrar verticalmente
        
                // Establecer la posición de la marca de agua
                $pdf->Image($marcaDeAguaPath, $imageX, $imageY, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0);
        
                // Restaurar la configuración guardada del objeto PDF
                $pdf->stopTransform();
        
                // Insertar la imagen del logo al principio del documento y ajustar su posición
                $pdf->Image($logoPath, 20, 10, 180, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
               
        
                // Movemos el cursor hacia abajo para dejar espacio para el título
                $pdf->SetY(55); // Puedes ajustar este valor según sea necesario
        
                // Centramos el contenido
                $pdf->SetX(10);
                // Establecemos el tamaño de letra para el título
                $pdf->SetFont('calibrib', 'B', 14);
                // Agregamos el contenido centrado
                $pdf->Cell(0, 0, 'ACTA DE PRESENTACIÓN', 0, 1, 'C');
                // Establecemos el tamaño de letra para el folio
                $pdf->SetFont('calibri', '', 11);
                $pdf->Cell(0, 8, 'FOLIO: ' . $presentacion->Folio, 0, 1, 'C');
                  
                // Dibujar el contorno
                $pdf->SetLineWidth(0.5);
                $pdf->SetDrawColor(255, 255, 0);
                $pdf->Rect(5, 5, $pdf->GetPageWidth() - 10, $pdf->GetPageHeight() - 10);
        
                // Dibujar el segundo contorno interior
                $pdf->SetLineWidth(0.3);
                $pdf->Rect(6, 6, $pdf->GetPageWidth() - 12, $pdf->GetPageHeight() - 12);
        
                 // Generamos la tabla HTML vertical
                 $html = '<div align="center" style="text-align: center;">';
                 $html .= '<table class="table table-striped" align="center">';
                 $html .= '<hr style="height: 2px; color: #FFFF00;">';
                 $html .= '<tr><td style="text-align:center; ">------------- CURP: ' . $presentacion->CurpPres . '-------------</td></tr>';
                 $html .= '<hr style="height: 2px; color: #FFFF00">';
         
                 $html .= '</table>';
                 $html .= '</div>';
        
                // Insertamos la tabla HTML en el PDF
                $pdf->writeHTML($html);
                // Generamos la tabla HTML
                $html = $presentacion->generateTableHtml();
                // Insertamos la tabla HTML en el PDF
                $pdf->writeHTML($html);
                // Establecer el nombre del archivo con el folio
                $fileName = 'presentado_folio_' . $presentacion->Folio . '.pdf';
                
                // Mostramos el PDF en el navegador
                $pdf->Output($fileName, 'I');

            } else {
                throw new NotFoundHttpException('El bautizo no fue encontrado.');
            }
        }

        public function actionViewPdf($id)
        {
            return $this->render('view-pdf', [
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
         * Lists all Presentacion models.
         *
         * @return string
         */
        public function actionIndex()
        {
            $searchModel = new PresentacionSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
    
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        public function actionIndex2()
     {
         $searchModel = new PresentacionSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
           // Si se ha buscado por mes, mostrar el mensaje de total de registros encontrados
        if ($searchModel->mes) {
            $message = "Se han encontrado un total de {$dataProvider->getTotalCount()} registros para el mes buscado.";
            Yii::$app->session->setFlash('success', $message);
        }
    
        // Obtener la cantidad de registros de Bautizo
        $countPresentacion = Presentacion::find()->count();
    
     
         return $this->render('index2', [
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
             'countPresentacion' => $countPresentacion, // Pasar la cantidad de Bautizos a la vista
         ]);
     }
    
        /**
         * Displays a single Presentacion model.
         * @param int $idPresentacion Id Presentacion
         * @return string
         * @throws NotFoundHttpException if the model cannot be found
         */
        public function actionView($idPresentacion)
        {
            return $this->render('view', [
                'model' => $this->findModel($idPresentacion),
            ]);
        }
    
        /**
         * Creates a new Presentacion model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return string|\yii\web\Response
         */
        public function actionCreate()
        {
            $model = new Presentacion();
    
            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'idPresentacion' => $model->idPresentacion]);
                }
            } else {
                $model->loadDefaultValues();
            }
    
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    
        /**
         * Updates an existing Presentacion model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param int $idPresentacion Id Presentacion
         * @return string|\yii\web\Response
         * @throws NotFoundHttpException if the model cannot be found
         */
        public function actionUpdate($idPresentacion)
        {
            $model = $this->findModel($idPresentacion);
    
            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idPresentacion' => $model->idPresentacion]);
            }
    
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    
        /**
         * Deletes an existing Presentacion model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param int $idPresentacion Id Presentacion
         * @return \yii\web\Response
         * @throws NotFoundHttpException if the model cannot be found
         */
        public function actionDelete($idPresentacion)
        {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                // Eliminar el registro con el idDefunsion proporcionado
                $registroEliminado = Presentacion::findOne($idPresentacion);
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
            $registros = Presentacion::find()->orderBy('idPresentacion')->all();
        
            // Inicializar el contador para los nuevos IDs
            $nuevoId = 1;
        
            // Reasignar los IDs y los folios
            foreach ($registros as $registro) {
                $registro->idPresentacion = $nuevoId;
                $registro->Folio = Presentacion::generarNuevoFolio($nuevoId);
                $registro->save(false);
                $nuevoId++;
            }
        
            // Calcular el nuevo valor para el autoincremento
            $nuevoAutoincremento = $nuevoId;
        
            // Establecer el autoincremento a través de una nueva consulta SQL
            Yii::$app->db->createCommand("ALTER TABLE Presentacion AUTO_INCREMENT = $nuevoAutoincremento")
                ->execute();
        }
        
        protected function generarNuevoFolio($idPresentacion)
        {
            $fecha = date('Ymd'); // Obtener la fecha actual en el formato YYYYMMDD
            return 'FGP' . $fecha . str_pad($idPresentacion, 7, '0', STR_PAD_LEFT);
        }
        
    
        /**
         * Finds the Presentacion model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param int $idPresentacion Id Presentacion
         * @return Presentacion the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($idPresentacion)
        {
            if (($model = Presentacion::findOne(['idPresentacion' => $idPresentacion])) !== null) {
                return $model;
            }
    
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
 
