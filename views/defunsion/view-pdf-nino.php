
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $id int */

?>
<?= Html::a('Regresar', ['/defunsion/index'], ['class' => 'btn btn-primary']) ?><br><br>

<iframe id="pdfViewer" src="<?= Yii::getAlias('@web/pdfjs/web/viewer.html?file=' . Yii::$app->urlManager->createAbsoluteUrl(['defunsion/generate-pdf-nino', 'id' => $id])) ?>" width="100%" height="650px">
</iframe>