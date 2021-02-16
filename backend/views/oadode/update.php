<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Oadode */

/**
   * File generated with the GII tool
 */

$this->title = Yii::t('app', 'Update Oadode: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Oadodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="oadode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'modelsDescriptionOfGoods' => $modelsDescriptionOfGoods
    ]) ?>

</div>
