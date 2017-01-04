<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Bid */
/* @var $form ActiveForm */
?>
<div class="bid-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'number') ?>
        <?= $form->field($model, 'brand_id') ?>
        <?= $form->field($model, 'modelauto_id') ?>
        <?= $form->field($model, 'name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- bid-index -->
