<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Modelauto[] $modelautos
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelautos()
    {
        return $this->hasMany(Modelauto::className(), ['type_id' => 'id']);
    }
}
