<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $product_code
 * @property string $product_name
 * @property string $supplier
 * @property string $description
 * @property string $price
 * @property string $category
 * @property string $created_date
 * @property string $updated_date
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
            [['product_code', 'product_name', 'supplier', 'description', 'price', 'category', 'updated_date'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['created_date', 'updated_date'], 'safe'],
            [['product_code', 'supplier', 'category'], 'string', 'max' => 100],
            [['product_name'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_code' => Yii::t('app', 'Product Code'),
            'product_name' => Yii::t('app', 'Product Name'),
            'supplier' => Yii::t('app', 'Supplier'),
            'description' => Yii::t('app', 'Description'),
            'price' => Yii::t('app', 'Price'),
            'category' => Yii::t('app', 'Category'),
            'created_date' => Yii::t('app', 'Created Date'),
            'updated_date' => Yii::t('app', 'Updated Date'),
        ];
    }
}
