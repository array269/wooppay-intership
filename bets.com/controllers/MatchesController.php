<?php

namespace app\controllers;

use app\models\Typeofsport;
use yii\web\Controller;
use app\models\Matches;

class MatchesController extends Controller
{
    public function actionView($id)

    {
        $title = Typeofsport::getTitle($id);
        $comingmatches = Matches::getComingMatches($id);
        $livematches = Matches::getLiveMatches($id);

        return $this->render('view', [
           'title'=>$title,
           'livematches' => $livematches,
           'comingmatches' => $comingmatches,
        ]);
    }
}
