<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "description_of_goods".
 *
 * @property int $id
 * @property int|null $application_id
 * @property int|null $customer_id
 * @property int|null $user_id
 * @property int|null $oadote_id
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
            [['application_id', 'customer_id', 'user_id', 'oadote_id'], 'integer'],
            [['description', 'ecl_group', 'ecl_item'], 'string', 'max' => 255],
            [['oadote_id'], 'exist', 'skipOnError' => true, 'targetClass' => Oadode::className(), 'targetAttribute' => ['oadote_id' => 'id']],
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
            'oadote_id' => Yii::t('app', 'Oadote ID'),
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
    public function getOadote()
    {
        return $this->hasOne(Oadode::className(), ['id' => 'oadote_id']);
    }
}
