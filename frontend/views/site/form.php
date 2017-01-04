<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Заявка';
?>

<div class="">
    <div class="container-form">
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <img src="<?= Yii::getAlias('@imageImgUrl').'/'.$brand->image;?>" width="100%">
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="brand-name"><h3><?= $brand->name ?></h3></div>
          <br><?= $brand->description ?>
        </div>
      </div>
    </div>
        <div class="form">
          <?php $form = ActiveForm::begin(); ?>
          <?= $form->field($model, 'name')->textInput(['maxlength' => true], ['promt' => 'Введите имя']) ?>
          <?= $form->field($model, 'number')->textInput() ?>
          <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-block']) ?>
          <?php ActiveForm::end(); ?>
      </div>
</div>