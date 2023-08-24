<?php
/* @var $title array */
/* @var $live_matches array */
/* @var $coming_matches array */


use yii\helpers\Html;

?>
<h1> <?= Html::encode("{$title->sportname}") ?></h1>
<ul>
    <h2>Live Matches</h2>

    <?php if ($live_matches) { ?>
        <?php foreach ($live_matches as $match): ?>

                <?= Html::a(Html::encode("{$match->matchname}"),['/bets'],['class' => 'btn btn-warning']);?>
                <?= 'Начало матча:'?>
                <?= $match->matchbegin ?>

        <?php endforeach;
    }
    else echo 'Сегодня нет матчей' ?>
</ul>
<ul>
    <h2>Coming Soon</h2>
    <?php foreach ($coming_matches as $match): ?>
        <li>
            <?= Html::encode("{$match->matchname}") ?>:
            <?= $match->matchbegin ?>
        </li>
    <?php endforeach; ?>
</ul>