<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "modelauto".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property integer $type_id
 * @property string $description
 * @property integer $brand_id
 *
 * @property Bid[] $bs
 * @property Brand $brand
 * @property Type $type
 */
class Modelauto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modelauto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['slug', 'required'],
            ['image', 'required'],
            ['description', 'required'],
            [['type_id', 'brand_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'slug', 'image'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'slug' => 'Slug',
            'image' => 'Image',
            'type_id' => 'Type ID',
            'description' => 'Description',
            'brand_id' => 'Brand ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBs()
    {
        return $this->hasMany(Bid::className(), ['modelauto_id' => 'id']);
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
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }
}
