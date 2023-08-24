<?php


namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Typeofsport
 * @property string $sportname
 * @package app\models
 */
class Typeofsport extends ActiveRecord
{

    public static function  getTitle($idtype)
    {
        $row = Typeofsport::find()
            ->select('sportname')
            ->where('idtype = :idtype',[':idtype'=>$idtype])
            ->one();
        return $row;
    }
}
