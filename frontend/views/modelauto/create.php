<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Modelauto */

$this->title = 'Create Modelauto';
$this->params['breadcrumbs'][] = ['label' => 'Modelautos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modelauto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
