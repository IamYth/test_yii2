<?php

use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Modelauto;
use common\models\Brand;
use common\models\Type;

/* @var $this yii\web\View */
/* @var $model backend\models\Modelauto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modelauto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brand_id')->dropDownList(ArrayHelper::map(Brand::find()->all(), 'id', 'name'), ['promt' => 'Выберите бренд']); ?>

    <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map(Type::find()->all(), 'id', 'name'), ['promt' => 'Выберите тип кузова']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>



    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
