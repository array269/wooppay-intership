<?php
use yii\helpers\Html;

?>
<h1> <?= Html::encode("{$title->sportname}") ?></h1>
<ul>
    <h2>Live Matches</h2>

    <?php if ($livematches) { ?>
        <?php foreach ($livematches as $match): ?>
            <li>
                <?= Html::encode("{$match->matchname}") ?>
                <?= 'LIVE'?>
                <?= $match->matchbegin ?>
            </li>
        <?php endforeach;
    }
    else echo 'Сегодня нет матчей' ?>
</ul>
<ul>
    <h2>Coming Soon</h2>
    <?php foreach ($comingmatches as $match): ?>
        <li>
            <?= Html::encode("{$match->matchname}") ?>:
            <?= $match->matchbegin ?>
        </li>
    <?php endforeach; ?>
</ul>