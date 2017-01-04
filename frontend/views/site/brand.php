<?php
$this->title = 'Бренд';
?>

<div class="site-index">
<h2>Выберите модель</h2>
    <div class="jumbotron">
      <div class="container">
    </div>
  </div>
    <div class="buttoms-modelname">
      <?php foreach ($models as $modelname): ?>
      <a href="index.php?r=site%2Fform&slug=<?=$modelname->slug?>" class="btn btn-default btn-block "><?=$modelname->name?></a>
        <?php endforeach ?>
    </div>
  </div>
</div>
