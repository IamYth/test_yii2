<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ModelautoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Модели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modelauto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать модель', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
             'label'=>'Бренд',
             'attribute'=>'brand_id',
             'value' => function($modelauto) {
             return $modelauto->brand->name;
             }
           ],
           [
            'label'=>'Тип',
            'attribute'=>'type_id',
            'value' => function($modelauto) {
            return $modelauto->type->name;
            }
          ],
           [
            'label'=>'Имя',
            'attribute'=>'name',
            ],
            'slug',
            [
            'label' => 'Изображение',
            'attribute'=>'image',
        ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
