<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bid */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bid-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
             'value' => $model->brand->name,
           ],
             [
              'label'=>'Модель',
              'attribute'=>'modelauto_id',
              'value' => $model->modelauto->name,
            ],
        ],
    ]) ?>

</div>
