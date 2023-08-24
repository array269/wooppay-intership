


<?php



use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h3>Проверьте ваши данные</h3>


<?php

$form = ActiveForm::begin([
    'id' => 'form-confirm',
    'options' => ['class' => 'form-horizontal'],]);?>


<?= $form->field($model, 'matchresult')->label('Результат матча')?>
<?= $form->field($model, 'phonenumber')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '9-999-999-9999',]);?>
<?= $form->field($model, 'moneybet');?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Продолжить', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Отмена',['/bets'],['class' => 'btn btn-reset'])?>
        </div>
    </div>
<?php ActiveForm::end() ?>