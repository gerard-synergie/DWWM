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
            [['fk_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['fk_customer' => 'id_customer']],
        ];
    }

   
    /**
     * Gets query for [[FkCustomer]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id_customer' => 'fk_customer']);
    }

    /**
     * Gets query for [[InvoiceItems]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getInvoiceItems()
    {
        return $this->hasMany(InvoiceItems::class, ['fk_invoice' => 'id_invoice']);
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
           'customer.lastname'=> 'Name',
        ];
    }


    /**
     * {@inheritdoc}
     * @return InvoiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvoiceQuery(get_called_class());
    }
}
