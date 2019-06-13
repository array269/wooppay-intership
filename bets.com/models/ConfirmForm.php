<?php

namespace app\models;

use yii\db\ActiveRecord;


class ConfirmForm extends ActiveRecord
{

    public static function tableName()
    {
        return 'code'; // TODO: Change the autogenerated stub
    }
    //public $matchResult;
    //public $phoneNumber;
    //public $bet;

    public function attributeLabels()
    {
        return [
            'code' => 'Код из смс',
        ]; // TODO: Change the autogenerated stub
    }

    public function rules()
    {
        return[
            [['code'],'required', 'message' =>'Поле не может быть пустым'],

        ] ;
    }

    public static function checkCode($data)
    {

        $code = $data['ConfirmForm']['code'];
        $result = ConfirmForm::find()->where('code = :code',[':code'=>$code])->all();
        if(!empty($result)){
            header("Location: http://bets.com/congratulate");
        } else  header("Location: http://bets.com/code_error");

    }




}
