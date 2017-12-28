<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $product_id
 * @property string $product_name
 * @property string $product_desc
 * @property integer $product_price
 *
 * @property Purhcase[] $purhcases
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'product_desc', 'product_price'], 'required'],
            [['product_price'], 'integer'],
            [['product_name'], 'string', 'max' => 20],
            [['product_desc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'product_name' => Yii::t('app', 'Product Name'),
            'product_desc' => Yii::t('app', 'Product Desc'),
            'product_price' => Yii::t('app', 'Product Price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurhcases()
    {
        return $this->hasMany(Purhcase::className(), ['product_id' => 'product_id']);
    }
}
