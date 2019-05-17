<?php


namespace app\models;

use yii\db\ActiveRecord;


class Typeofsport extends ActiveRecord
{
    public static function  getTitle($idtype)
    {
        $title=Typeofsport::find()->where('idtype = :idtype',[':idtype'=>$idtype])->one();
        return $title;
    }
}
