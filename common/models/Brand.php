<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "brand".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $logo
 *
 * @property Bid[] $bs
 * @property Modelauto[] $modelautos
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
  public static function tableName()
    {
        return 'brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['logo', 'required'],
            ['slug', 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['logo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'slug' => 'Slug',
            'logo' => 'Картинка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBs()
    {
        return $this->hasMany(Bid::className(), ['brand_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelautos()
    {

        return $this->hasMany(Modelauto::className(), ['brand_id' => 'id']);
    }

    public function getLogo()
    {
      $data = self::find()->all();
      return $data;
    }




    // public function upload()
    // {
    //   if ($this->validate()) {
    //       $image = $this->logo;
    //       //$imgName = 'logo_' . '.' . $image->getExtension();
    //       //print_r($image);
    //       //$image->saveAs(Yii::getAlias('@logoImgPath') . '/' . $imgName);
    //       return true;
    //   }else{
    //       return false;
    //   }
    // }

}
