<?php
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;

use yii\helpers\Html;
use yii\web\View;

use yii\widgets\DetailView;

use common\models\Bid;
use common\models\Modelauto;
/* @var $this yii\web\View */

$this->title = 'Автодилер';
?>
<div class="">

    <div class="jumbotron">
      <div class="container">
      <pre>
        <h1>Автодилер</h1>
      </pre>
        

    </div>
  </div>
    <div class="body-content">

        <div class="row">
        
        <div class="col-sm-6 col-md-6">
        <img src="<?= Yii::getAlias('@imageImgUrl').'/'.$bids->image;?>" width="550">
        </div>

        <div class="col-sm-6 col-md-6">
         <h3><?= $bids->name ?></h3> 
          <?= $bids->description ?>
        </div>
        </div>
        <div>
        </div>

    </div>
</div>
