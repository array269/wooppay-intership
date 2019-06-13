<?php

namespace app\models;

use yii\db\ActiveRecord;



class Matches extends ActiveRecord
{


    public static function getLiveMatches($id_typeSport)
    {


        date_default_timezone_set('Etc/GMT-6');
        $id_typeSport = intval($id_typeSport);
        $livetime = date('Y-m-d H:i:s');

        $livematches= Matches::find()->where('idtypesport = :id',[':id'=>$id_typeSport])
                                     ->andWhere('matchbegin <= :livetime',[':livetime'=>$livetime])
                                     ->andWhere('matchend >= :livetime',[':livetime'=>$livetime])
                                     ->all();

        return $livematches;
    }


    public static function getComingMatches($id_typeSport)
    {


        date_default_timezone_set('Etc/GMT-6');
        $id_typeSport = intval($id_typeSport);
        $livetime = date('Y-m-d H:i:s');

        $comingmatches= Matches::find()
            ->where('idtypesport = :id',[':id'=>$id_typeSport])
            ->andWhere('matchbegin >= :livetime',[':livetime'=>$livetime])
            ->all();

        return $comingmatches;
    }


}
