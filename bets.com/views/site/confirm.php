<?php

/**
 * @var array $conf
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h4>Введите код отправленный на номер <?= $_SESSION['model'][0]['phone_number'];?></h4>

<?php
$form = ActiveForm::begin([]);
?>

<?= $form->field($conf, 'code');?>

<?= Html::submitButton('Сделать ставку',['class' => 'btn btn-success']);?>


<?php
ActiveForm::end();
?>