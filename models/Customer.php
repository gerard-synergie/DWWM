<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id_customer
 * @property string $firstname
 * @property string $lastname
 * @property string $mail
 * @property string $adress1
 * @property string $adress2
 * @property string $zipcode
 * @property string $town
 *
 * @property Invoice[] $invoices
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'mail', 'adress1', 'adress2', 'zipcode', 'town'], 'required'],
            [['mail'], 'string'],
            [['firstname', 'lastname', 'adress1', 'adress2', 'town'], 'string', 'max' => 64],
            [['zipcode'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => 'Id Customer',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'mail' => 'Mail',
            'adress1' => 'Adress 1',
            'adress2' => 'Adress 2',
            'zipcode' => 'Zipcode',
            'town' => 'Town',
        ];
    }

    /**
     * Gets query for [[Invoices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::class, ['fk_customer' => 'id_customer'])->inverseOf('customer');
    }
}
