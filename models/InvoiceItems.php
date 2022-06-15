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
            [['fk_invoice'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::class, 'targetAttribute' => ['fk_invoice' => 'id_invoice']],
            [['fk_part'], 'exist', 'skipOnError' => true, 'targetClass' => Parts::class, 'targetAttribute' => ['fk_part' => 'id_part']],
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
     * @return \yii\db\ActiveQuery
     */
    public function getFkInvoice()
    {
        return $this->hasOne(Invoice::class, ['id_invoice' => 'fk_invoice']);
    }

    /**
     * Gets query for [[FkPart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkPart()
    {
        return $this->hasOne(Parts::class, ['id_part' => 'fk_part']);
    }
}
