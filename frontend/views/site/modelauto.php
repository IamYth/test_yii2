<?php
$this->title = 'Автодилер';
?>
<div class="site-index">

    <div class="jumbotron">
      <div class="container">
      <pre>
        <h1>Автодилер</h1>
      </pre>
        

    </div>
  </div>
    <div class="body-content">

                <?php foreach ($models as $modelname): ?>
                  <br> <a href="index.php?r=site%2Fform&slug=<?=$modelname->slug?>"><?= $modelname->name ?></a>
                  <?php endforeach ?>
        </div>
    </div>
</div>
 