<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;


class Matches extends ActiveRecord
{
	
	public static function getLiveMatches($id_typeSport){

		date_default_timezone_set('Etc/GMT-6');
		$id_typeSport = intval($id_typeSport);
		$dateBegin = date('Y-m-d H:i:s', strtotime("-120 minutes"));
		$dateEnd = date('Y-m-d H:i:s', strtotime("+ 120 minutes"));
		echo $dateBegin;
        echo $dateEnd;
        $query = Matches::find();


        $livematches = $query
                    ->select(['matchname','matchtime'])
                    ->from('matches')
                    ->where(['and', 'idtypesport = '.$id_typeSport,['between','matchtime',$dateBegin,$dateEnd]])
                    ->all();


         return $livematches;
	}

	public static function getComingMatches($id_typeSport){
		date_default_timezone_set('Etc/GMT-6');
		$id_typeSport = intval($id_typeSport);
        $dateBegin = date('Y-m-d H:i:s', strtotime("+ 121 minutes"));
		$dateEnd = date('Y-m-d H:i:s', strtotime("+ 60 day"));
        $query = Matches::find();

        $comingmatches = $query
                    ->select(['matchname','matchtime'])
                    ->from('matches')
                    ->where(['and', 'idtypesport = '.$id_typeSport,['between','matchtime',$dateBegin,$dateEnd]])
                    ->all();

         return $comingmatches;
}


}
