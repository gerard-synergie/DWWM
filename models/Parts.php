<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parts".
 *
 * @property int $id_part
 * @property string $name
 * @property string $code
 * @property float $price
 * @property int $stock
 *
 * @property InvoiceItems[] $invoiceItems
 */
class Parts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code', 'price', 'stock'], 'required'],
            [['price'], 'number'],
            [['stock'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['code'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_part' => 'Id Part',
            'name' => 'Name',
            'code' => 'Code',
            'price' => 'Price',
            'stock' => 'Stock',
        ];
    }

    /**
     * Gets query for [[InvoiceItems]].
     *
     * @return \yii\db\ActiveQuery|CustomerQuery
     */
    public function getInvoiceItems()
    {
        return $this->hasMany(InvoiceItems::className(), ['fk_part' => 'id_part']);
    }

    /**
     * {@inheritdoc}
     * @return PartsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartsQuery(get_called_class());
    }
}
