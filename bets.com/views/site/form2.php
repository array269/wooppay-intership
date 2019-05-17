<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $f = ActiveForm::begin(); ?>
    <?=$f->field($model,'matchName')?>
    <?=$f->field($model, 'matchResult')?>
    <?=$f->field($model, 'phoneNumber')?>
    <?=$f->field($model,'bet')?>
    <?=Html::submitButton('Сделать ставку');?>

<?php ActiveForm::end(); ?>