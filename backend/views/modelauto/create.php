<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Modelauto */

$this->title = 'Создать модель';
$this->params['breadcrumbs'][] = ['label' => 'Модели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modelauto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
