
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $bautizo app\models\Bautizo */


?>
<?= Html::a('Regresar', ['/presentacion/index'], ['class' => 'btn btn-primary']) ?><br><br>



<iframe id="pdfViewer" src="<?= Yii::getAlias('@web/pdfjs/web/viewer.html?file=' . Yii::$app->urlManager->createAbsoluteUrl(['presentacion/generate-pdf', 'id' => $id])) ?>" width="100%" height="650px">
</iframe>