<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bid".
 *
 * @property integer $id
 * @property string $name
 * @property integer $number
 * @property integer $brand_id
 * @property integer $modelauto_id
 *
 * @property Brand $brand
 * @property Modelauto $modelauto
 */
class Bid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['number', 'required'],
            ['name', 'required'],
            [['number', 'brand_id', 'modelauto_id'], 'integer', 'min' => 6],
            [['name'], 'string', 'max' => 255, 'min' => 2],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['modelauto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Modelauto::className(), 'targetAttribute' => ['modelauto_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'number' => 'Number',
            'brand_id' => 'Brand ID',
            'modelauto_id' => 'Modelauto ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelauto()
    {
        return $this->hasOne(Modelauto::className(), ['id' => 'modelauto_id']);
    }
}
