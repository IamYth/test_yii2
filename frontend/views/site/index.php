<?php
$this->title = 'Автодилер';
?>
<div class="site-index">
<h2>Выберите бренд</h2>
<div class="jumbotron">
    <div class="container">
        <div class="row">
              <?php foreach ($logoInView as $title): ?>
                <div class="col-sm-3 col-md-3">
                    <div>
                         <a href="index.php?r=site%2Fbrand&slug=<?= $title->slug ?>"><img src="<?= Yii::getAlias('@logoImgUrl').'/'.$title->logo;?>" width="150"> </a>
                    </div>
                </div>
              <?php endforeach ?>
    </div>
</div>
</div>
</div>