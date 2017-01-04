<?php

/* @var $this yii\web\View */
use yii\widgets\DetailView;
use yii\helpers\Html;

$this->title = 'Информация о заявке';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
             'value' => $model->brand->name,
           ],
             [
              'label'=>'Модель',
              'attribute'=>'modelauto_id',
              'value' => $model->modelauto->name,
            ],
             [
              'label'=>'Изображение',
              'attribute'=>'image',
              'value' => Yii::getAlias('@imageImgUrl').'/'.$model->modelauto->image,
              'format' => ['image',['width'=>'65%']],
            ],
        ],
    ]) ?>
</div>