<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\BidSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BidSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bid-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
             'label'=>'Имя',
             'attribute'=>'name',
            ],
            [
             'label'=>'Телефон',
             'attribute'=>'number',
            ],
            [
             'label'=>'Бренд',
             'attribute'=>'brand_id',
             'value' => function($bid) {
             return $bid->brand->name;
             }
           ],
             [
              'label'=>'Модель',
              'attribute'=>'modelauto_id',
             'value' => function($bid) {
             return $bid->modelauto->name;
             }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
