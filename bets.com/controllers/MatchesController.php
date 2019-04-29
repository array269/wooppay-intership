<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Matches;

class MatchesController extends Controller
{
    public function actionVoleyball()

    {
        $idtypesport = 4;
        $comingmatches = Matches::getComingMatches($idtypesport);
        $livematches = Matches::getLiveMatches($idtypesport);

        return $this->render('voleyball', [
           'livematches' => $livematches,
           'comingmatches' => $comingmatches,
        ]);
    }

     public function actionFootball()
    {

        $idtypesport = 1;
        $comingmatches = Matches::getComingMatches($idtypesport);
        $livematches = Matches::getLiveMatches($idtypesport);

        return $this->render('football', [
            'livematches' => $livematches,
            'comingmatches' => $comingmatches,
       ]);
    }

    public function actionBasketball()
    {

        $idtypesport = 2;
        $comingmatches = Matches::getComingMatches($idtypesport);
        $livematches = Matches::getLiveMatches($idtypesport);

        return $this->render('basketball', [
            'livematches' => $livematches,
            'comingmatches' => $comingmatches,
        ]);
    }

    public function actionHokkey()
    {
        $idtypesport = 3;
        $comingmatches = Matches::getComingMatches($idtypesport);
        $livematches = Matches::getLiveMatches($idtypesport);
       
        return $this->render('hokkey', [
            'livematches' => $livematches,
            'comingmatches' => $comingmatches,
       ]);
    }



}
