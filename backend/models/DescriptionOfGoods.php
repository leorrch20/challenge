<?php

namespace backend\models;

use Yii;

/**
   * File generated with the GII tool
 */

/**
 * This is the model class for table "description_of_goods".
 *
 * @property int $id
 * @property int|null $application_id
 * @property int|null $customer_id
 * @property int|null $user_id
 * @property int|null $oadode_id
 * @property string|null $description
 * @property string|null $ecl_group
 * @property string|null $ecl_item
 *
 * @property Oadode $oadote
 */
class DescriptionOfGoods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'description_of_goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_id', 'customer_id', 'user_id', 'oadode_id'], 'integer'],
            [['description', 'ecl_group', 'ecl_item'], 'required'],
            [['description', 'ecl_group', 'ecl_item'], 'string', 'max' => 255],
            [['description'],'match', 'pattern' => '/^[a-zA-Z]+$/', 'message' => 'Only Alphabet'],
            [['ecl_group', 'ecl_item'],'match', 'pattern' => '/^[1-9]+$/', 'message' => 'Only numbers 1-9'],
            [['oadode_id'], 'exist', 'skipOnError' => true, 'targetClass' => Oadode::className(), 'targetAttribute' => ['oadode_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'application_id' => Yii::t('app', 'Application ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'oadode_id' => Yii::t('app', 'Oadode ID'),
            'description' => Yii::t('app', 'Description'),
            'ecl_group' => Yii::t('app', 'Ecl Group'),
            'ecl_item' => Yii::t('app', 'Ecl Item'),
        ];
    }

    /**
     * Gets query for [[Oadote]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOadode()
    {
        return $this->hasOne(Oadode::className(), ['id' => 'oadode_id']);
    }
}
