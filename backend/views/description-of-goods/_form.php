<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
   * File generated with the GII tool
 */

/* @var $this yii\web\View */
/* @var $model app\models\DescriptionOfGoods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="description-of-goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'application_id')->textInput() ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'oadote_id')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ecl_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ecl_item')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
