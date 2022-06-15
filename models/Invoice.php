<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id_invoice
 * @property string $date
 * @property float $summary
 * @property int $fk_customer
 *
 * @property Customer $fkCustomer
 * @property InvoiceItems[] $invoiceItems
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_invoice', 'date', 'fk_customer'], 'required'],
            [['id_invoice', 'fk_customer'], 'integer'],
            [['date'], 'safe'],
            [['summary'], 'number'],
            [['id_invoice'], 'unique'],
            [['fk_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['fk_customer' => 'id_customer']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_invoice' => 'Id Invoice',
            'date' => 'Date',
            'summary' => 'Summary',
            'fk_customer' => 'Fk Customer',
        ];
    }

    /**
     * Gets query for [[FkCustomer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkCustomer()
    {
        return $this->hasOne(Customer::className(), ['id_customer' => 'fk_customer']);
    }

    /**
     * Gets query for [[InvoiceItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceItems()
    {
        return $this->hasMany(InvoiceItems::className(), ['fk_invoice' => 'id_invoice']);
    }
}
