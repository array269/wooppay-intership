<?php

namespace app\controllers;

use app\models\Typeofsport;
use yii\web\Controller;
use app\models\Matches;

class MatchesController extends Controller
{
    public function actionView($id)
    {
        $title = Typeofsport::findOne($id);
// $title = Typeofsport::getTitle($id);
        $coming_matches = Matches::getComingMatches($id);
        $live_matches = Matches::getLiveMatches($id);

        return $this->render('view', [
           'title'=>$title,
           'live_matches' => $live_matches,
           'coming_matches' => $coming_matches,
        ]);
    }
}
