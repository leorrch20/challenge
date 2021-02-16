<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/**
   * File generated with the GII tool
 */

/* @var $this yii\web\View */
/* @var $model app\models\Oadode */
/* @var $modelDOGer app\models\Other */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oadode-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'legal_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'Business Name (If different from legal name)')) ?>

    <?= $form->field($model, 'business_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_mailing_address')->textInput(['maxlength' => true])->label(Yii::t('app', 'Mailing Address (If different from civic address)')) ?>

    <div class=row>
        <div class="col-lg-6">
            <?= $form->field($model, 'business_phone')->textInput(['maxlength' => true])->label(Yii::t('app', 'Telephone Number (Include extension no. if applicable)')) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'business_fax')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'business_email')->textInput(['maxlength' => true]) ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><?= Yii::t('app', 'Description of the controlled goods the applicant be required to examine, possess or transfer (Refer to the Export Control List (ECL))'); ?></h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsDescriptionOfGoods[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'description',
                    'ecl_group',
                    'ecl_item'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($modelsDescriptionOfGoods as $i => $modelDOG): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <div class="pull-right">
                                <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                                // necessary for update action.
                                if (! $modelDOG->isNewRecord) {
                                    echo Html::activeHiddenInput($modelDOG, "[{$i}]id");
                                }
                            ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelDOG, "[{$i}]description")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($modelDOG, "[{$i}]ecl_group")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($modelDOG, "[{$i}]ecl_item")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <?= $form->field($model, 'application_type')->radioList( [0=>'New', 1 => 'Re-Assesment'], [
        'item' => function($index, $label, $name, $checked, $value) {

            $return = '<label class="custom-radio-button">';
            $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3">';
            $return .= '<span class="helping-el"></span>';
            $return .= '<span class="label-text">' . ucwords($label) . '</span>';
            $return .= '</label>';

            return $return;
        }
    ]); ?>

    <div class="form-group field-oadode-business_title required">
        <label class="control-label">Business title</label>
        <div class="row">
            <?= Html::checkboxList('business_title', [14, 67], [
                'owner' => 'Owner',
                'authorized_individual' => 'Authorized individual',
                'designated_official' => 'Designated Official',
                'officer' => 'Officer',
                'director' => 'Director',
                'employee' => 'Employee'
            ], [
                'item' => function ($index, $label, $name, $checked, $value){
                    
                    $return = '<div class="col-sm-3">';
                    $return .= '<label class="custom-checkbox">';
                    $return .= '<input id="field-oadode-business_title_' . $value . '" type="checkbox" name="' . $name . '" value="' . $value . '" tabindex="3">';
                    $return .= '<span class="helping-el"></span>';
                    $return .= '<span class="label-text">' . ucwords($label) . '</span>';
                    $return .= '</label>';
                    $return .= '</div>';

                    return $return;
                }
            ]); ?>
        </div>
    </div>

    <?= $form->field($model, 'lang')->radioList( [0 =>'English', 1 => 'French'], [
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<label class="custom-radio-button">';
                                    $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3">';
                                    $return .= '<span class="helping-el"></span>';
                                    $return .= '<span class="label-text">' . ucwords($label) . '</span>';
                                    $return .= '</label>';

                                    return $return;
                                }
                            ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>




<?php
    $this->registerJs("
        jQuery('#field-oadode-business_title_officer').change(function(){
            if(this.checked == true){
                console.log($('#field-oadode-business_title_director').is(':checked'));
                $('#field-oadode-business_title_director').prop('checked', false);
            }
        });
        
        jQuery('#field-oadode-business_title_director').change(function(){
            if(this.checked == true){
                console.log($('#field-oadode-business_title_officer'));
                console.log($('#field-oadode-business_title_employee'));
                $('#field-oadode-business_title_officer').prop('checked', false);
                $('#field-oadode-business_title_employee').prop('checked', false);
            }
        });

        jQuery('#field-oadode-business_title_employee').change(function(){
            if(this.checked == true){
                console.log($('#field-oadode-business_title_director'));
                $('#field-oadode-business_title_director').prop('checked', false);
            }
        });"
    );
?>
