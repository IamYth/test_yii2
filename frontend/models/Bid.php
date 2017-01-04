<?php

namespace frontend\models;

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
            [['number', 'brand_id', 'modelauto_id'], 'integer'],
            [['name'], 'string', 'max' => 255],

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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
}
