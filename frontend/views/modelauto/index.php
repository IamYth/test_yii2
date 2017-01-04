<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ModelautoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Modelautos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modelauto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Modelauto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'slug',
            'image',
            'type_id',
            // 'description:ntext',
            // 'brand_id',

            ['class' => 'yii\grid\ActionColumn',
             'header'=>'Действия',
             'headerOptions' => ['width' => '80'],
             'template' => '{view} {update} {delete} {link}',
          ],
        ],
    ]); ?>
</div>
