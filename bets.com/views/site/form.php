<?php

use app\models\Matches;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;use yii\widgets\ActiveForm;

$form = ActiveForm::begin();
// получаем все live матчи "Футбол"
    $matches = Matches::getLiveMatches(1);
// формируем массив, с ключем равным полю 'idmatch' и значением равным полю 'matchname'
    $itemsMatch = ArrayHelper::map($matches,'idmatch','matchname');
    $params = [
        'prompt' => 'Выберите матч'
    ];
    echo $form->field($model, 'matchName')->dropDownList($itemsMatch,$params);

    //формируем массив результатов матчей
    $results = [
    '0' => 'Победа',
    '1' => 'Проигрыш',
    '2'=>  'Ничья'
    ];
    $params = [
    'prompt' => 'Выберите результат матча'
    ];
    echo $form->field($model, 'matchResult')->dropDownList($results,$params);
   // echo $form->field($model, 'phoneNumber');
    echo   $form->field($model, 'phoneNumber')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '9-999-999-9999',
]);
    echo   $form->field($model, 'bet')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '9999999999999',
]);

    echo Html::submitButton('Сделать ставку');

ActiveForm::end();

