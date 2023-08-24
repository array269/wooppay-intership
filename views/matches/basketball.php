<?php
use yii\helpers\Html;

?>
<h1>Basketball Matches</h1>
<ul>
<h2>Live Matches</h2>

<?php if ($livematches) { ?>
<?php foreach ($livematches as $match): ?>

    
          <?= Html::encode("{$match->matchname}") ?>
            <?= 'LIVE'?>
        <?= $match->matchtime ?>
    
<?php endforeach; 
}
 else echo 'Сегодня нет матчей' ?>
</ul>


<ul>
<h2>Coming Soon</h2>
<?php foreach ($comingmatches as $match): ?>
        <?= Html::encode("{$match->matchname}") ?>
        <?= $match->matchtime ?>
    
<?php endforeach; ?>
</ul>
