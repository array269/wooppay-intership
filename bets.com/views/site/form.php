<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h3>Укажите данные</h3>

<?php
$form = ActiveForm::begin([
    'id' => 'form',
    'options' => ['class' => 'form-horizontal'],
    ]);

    $results = [
    'Победа' => 'Победа',
    'Проигрыш' => 'Проигрыш',
    'Ничья'=>  'Ничья',
    ];

    $params = [
    'prompt' => 'Выберите результат матча'
    ];?>

<?= $form->field($model, 'matchresult')->dropDownList($results,$params) ?>
<?= $form->field($model, 'phonenumber')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '9-999-999-9999',]);?>
<?= $form->field($model, 'moneybet')->textInput();?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Продолжить', ['class' => 'btn btn-success']) ?>
            <?= Html::resetButton('Очистить', ['class' => 'btn btn-reset']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>




