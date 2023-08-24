<?php
use yii\helpers\Html;

?>
<h1>Football</h1>
<ul>
<h2>Live Matches</h2>

<?php if ($livematches) { ?>
<?php foreach ($livematches as $match): ?>
    <li>
        <?= Html::encode("{$match->matchname}") ?>
        <?= 'LIVE'?>
        <?= $match->matchtime ?>
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
        <?= $match->matchtime ?>
    </li>
<?php endforeach; ?>
</ul>
