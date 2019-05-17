<?php

namespace app\models;

use yii\base\Model;


class BetsForm extends Model
{
    public $matchName;
    public $matchResult;
    public $phoneNumber;
    public $bet;

    public function rules()
    {
        return[
            [['matchName','matchResult','phoneNumber','bet'],'required', 'message' =>'Поле не может быть пустым']
        ] ;
    }
}
