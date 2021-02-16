<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Oadode */

/**
   * File generated with the GII tool
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Oadodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="oadode-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'application_id',
            'customer_id',
            'user_id',
            'legal_name',
            'business_name',
            'business_address',
            'business_mailing_address',
            'business_phone',
            'business_fax',
            'business_email:email',
            'business_title',
            'lang',
            [
                'label'  => Yii::t('app', 'Aplication Type'),
                'value'  => $model->application_type == 1 ? 'Re-Assesment' : 'New',
            ],
            'business_title',
            'lang',
            [
                'label'  => Yii::t('app', 'Language'),
                'value'  => $model->lang == 1 ? 'English' : 'French',
            ],
        ],
    ]) ?>

    
</div>

<script language="javascript">
    function printContent(el)
    {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
