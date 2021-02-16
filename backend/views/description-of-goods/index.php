<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
   * File generated with the GII tool
 */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Description Of Goods');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="description-of-goods-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Description Of Goods'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'application_id',
            'customer_id',
            'user_id',
            'oadote_id',
            //'description',
            //'ecl_group',
            //'ecl_item',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
