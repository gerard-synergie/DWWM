<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice_items".
 *
 * @property int $id_item
 * @property int $fk_part
 * @property int $fk_invoice
 * @property int $qty
 * @property float $price_row
 *
 * @property Invoice $fkInvoice
 * @property Parts $fkPart
 */
class InvoiceItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_item', 'fk_part', 'fk_invoice', 'qty'], 'required'],
            [['id_item', 'fk_part', 'fk_invoice', 'qty'], 'integer'],
            [['price_row'], 'number'],
            [['id_item'], 'unique'],
            [['fk_invoice'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['fk_invoice' => 'id_invoice']],
            [['fk_part'], 'exist', 'skipOnError' => true, 'targetClass' => Parts::className(), 'targetAttribute' => ['fk_part' => 'id_part']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_item' => 'Id Item',
            'fk_part' => 'Fk Part',
            'fk_invoice' => 'Fk Invoice',
            'qty' => 'Qty',
            'price_row' => 'Price Row',
        ];
    }

    /**
     * Gets query for [[FkInvoice]].
     *
     * @return \yii\db\ActiveQuery|InvoiceQuery
     */
    public function getFkInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id_invoice' => 'fk_invoice']);
    }

    /**
     * Gets query for [[FkPart]].
     *
     * @return \yii\db\ActiveQuery|PartsQuery
     */
    public function getFkPart()
    {
        return $this->hasOne(Parts::className(), ['id_part' => 'fk_part']);
    }

    /**
     * {@inheritdoc}
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }
}
