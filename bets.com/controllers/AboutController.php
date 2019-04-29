<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Matches;

class AboutController extends Controller
{

    public function actionIndex()
    {
        $current_date = date('Y-m-d H:i:s');
        $query = Matches::find();

        $livematches = $query
                    ->select(['matchname','matchtime'])
                    ->from('matches')
                    ->where(['and', 'idtypesport = 4',['in','matchtime',[$current_date]]])
                    ->all();

        $comingmatches = $query
                    ->select(['matchname','matchtime'])
                    ->from('matches')
                    ->where(['and', 'idtypesport = 4',['not in','matchtime',[$current_date]]])
                    ->all();

        return $this->render('voleyball', [
            'livematches' => $livematches,
            'comingmatches' => $comingmatches,
        ]);
    
}}